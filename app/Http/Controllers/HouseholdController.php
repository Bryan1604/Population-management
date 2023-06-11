<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Household;
use App\Models\People;

class HouseholdController extends Controller
{
    public function getAllHousehold(){
        
        $household = Household::with('owner')->get();
        // $households = Household::with('owner')
        // ->addSelect(['count_number' => People::selectRaw('count(*)')
        //     ->whereColumn('household_id', 'household.id')
        //     ->getQuery()
        // ])
        // ->get();
        return view('pages/house_hold_list',['household'=>$household]);
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

}
