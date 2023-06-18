<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Household;
use App\Models\People;

class HouseholdController extends Controller
{
    public function getAllHousehold(Request $request){
        $search = $request->input('search') ?? "";
        if($search != ""){
            $household = Household::with('owner')
                        ->whereHas('owner', function ($query) use ($search) {
                            $query->where('fullname', 'LIKE', "%$search%")
                            ->orWhere('household_id', '=', $search)
                            ->orWhere('address', 'LIKE', "%$search%");
                        })
                        ->orderBy('created_at','ASC')
                        ->get();
        }else{
            $household = Household::with('owner')->get();
        }
        return view('pages/house_hold_list',['household'=>$household,'search'=>$search]);
    }

    public function getHouseholdDetail($household_id){
        $household_detail = Household::with('owner')->find($household_id);
        $member_list = People::where('household_id',$household_id)->selectRaw('fullname')->get();
        return view('pages/house_hold_detail',['household_detail'=>$household_detail,'member_list'=>$member_list]); 
    }

    // search by name of owner
    public function search(Request $request){   
        $search_name = $request -> search_name;
        $household = Household::with(['owner' => function ($query) use ($search_name) {
                    $query->where('fullname', 'LIKE', '%' . $search_name . '%');
                    }])->get();
        return view('pages.household_list',['household'=>$household]);
    }

    // tao moi 1 ho khau 
    public function createHousehold(Request $request){
        if($request){
            // tao moi 1 ho khau tu 1 owner moi
            $household = new Household();
            $owner = new People();
            $owner-> household_id = $household->id;    
            $owner->fullname = $request->input('fullname');
            $owner->identify_number = $request->input('identify_number');
            $owner->sex = $request->input('sex');
            $owner->birthday = $request->input('birthday');
            $owner->place_of_birth = $request->input('place_of_birth');
            $owner->ethnic = $request->input('ethnic');
            $owner->job = $request->input('job');
            $owner->office = $request->input('office');
            $owner->received_IDCard_place = $request->input('received_IDCard_place');
            $owner->received_IDCard_time = $request->input('received_IDCard_time');
            $owner->phone_number = $request-> input('phone_number');
            $owner->domicile = $request->input('domicile');   // nguyen quan 
            $owner->address_before = $request->input('address_before');
            $owner->household_owner_relationship = $request->input('household_owner_relationship');
            $owner->state = 0; // khi tao ho khau thi mac dinh la 0
            $owner->note = $request->input('note');
            if($owner->save()){
                $household->owner_id = $owner->id;
                $household->owner = $owner;
                $household->save();
                return $household;
            }
        }
    }

}
