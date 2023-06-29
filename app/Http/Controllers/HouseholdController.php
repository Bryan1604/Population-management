<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Household;
use App\Models\People;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Client\ResponseSequence;
use Illuminate\Support\Facades\Session;
use Monolog\Handler\FirePHPHandler;

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
        $member_list = People::where('household_id',$household_id)->selectRaw('fullname')->selectRaw('id')->get();
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
    public function createHousehold(){
        return view('pages.people_create_form', ['owner' => null, 'household' => null]);
    }

    public function storeHousehold(Request $request){

        $validatedData = $request->validate([
            'fullname' => 'required',
            'sex' => 'required',
            'birthday' => 'required',
            'identify_number' => 'required',
            'place_of_birth' => 'required',
            'religion' => 'required',
            'ethnic'=>'required',
            'domicile'=>'required',
            'received_IDCard_place' => 'required',
            'received_IDCard_time' => 'required',
            'address_before' => 'required',
            'phone_number'=>'required',
            'household_owner_relationship'=>'required',
            'note'=>'required',
            'address'=>'required',
        ]);

        $household = new Household();
        $household->quantity = 1;

            $owner = new People();
            $owner->fullname = $validatedData['fullname'];
            $owner->identify_number = $validatedData['identify_number'];
            if ($validatedData['sex'] == 'male'){
                $owner->sex = 0;
            }else{
                $owner->sex = 1;
            }
           
            $owner->birthday = $validatedData['birthday'];
            $owner->place_of_birth = $validatedData['place_of_birth'];
            $owner->ethnic = $validatedData['ethnic'];
            //$owner->job = $request->input('job');
            //$owner->office = $request->input('office');
            $owner->received_IDCard_place = $validatedData['received_IDCard_place'];
            $owner->received_IDCard_time = $validatedData['received_IDCard_time'];
            $owner->phone_number = $validatedData['phone_number'];
            $owner->domicile = $validatedData['domicile'];   // nguyen quan 
            $owner->address_before = $validatedData['address_before'];
            $owner->household_owner_relationship = $validatedData['household_owner_relationship'];
            $owner->state = 0; // khi tao ho khau thi mac dinh la 0
            $owner->note = $request->input('note');
            
            $household->address = $validatedData['address'];
            $household->owner_id = 0;
            $household->save();
            
            $owner-> household_id = $household->id;  
            $owner->save();
            $household->owner_id = $owner->id;
            $household->save();

            $people = People::with('household')->where('household_id','=',$household->id)->get();

            Session::put('household_id',$household->id);
            //Session::put('owner',$owner);
        return redirect('household/add')->with([
            'message' => 'Add owner success',
            'household'=>$household,
            'owner' => $owner,
            'people'=>$people,
        ]);
    }

    public function addNewPeopleToHousehold(){
        return view('pages.people_create_form');
    }

    public function storeNewPeopleToHousehold(Request $request){
        $validatedData = $request->validate([
            'fullname' => 'required',
            'sex' => 'required',
            'birthday' => 'required',
            'identify_number' => 'required',
            'place_of_birth' => 'required',
            'religion' => 'required',
            'ethnic'=>'required',
            'domicile'=>'required',
            'received_IDCard_place' => 'required',
            'received_IDCard_time' => 'required',
            'address_before' => 'required',
            'phone_number'=>'required',
            'household_owner_relationship'=>'required',
            'note'=>'required',
        ]);

        $household_id = Session::get('household_id');

        $newPerson = new People();
        $newPerson->fullname = $validatedData['fullname'];
        $newPerson->identify_number = $validatedData['identify_number'];
        if ($validatedData['sex'] == 'male'){
            $newPerson->sex = 0;
        }else{
            $newPerson->sex = 1;
        }
        $newPerson->birthday = $validatedData['birthday'];
        $newPerson->place_of_birth = $validatedData['place_of_birth'];
        $newPerson->ethnic = $validatedData['ethnic'];
        //$owner->job = $request->input('job');
        //$owner->office = $request->input('office');
        $newPerson->received_IDCard_place = $validatedData['received_IDCard_place'];
        $newPerson->received_IDCard_time = $validatedData['received_IDCard_time'];
        $newPerson->phone_number = $validatedData['phone_number'];
        $newPerson->domicile = $validatedData['domicile'];   // nguyen quan 
        $newPerson->address_before = $validatedData['address_before'];
        $newPerson->household_owner_relationship = $validatedData['household_owner_relationship'];
        $newPerson->state = 0; // khi tao ho khau thi mac dinh la 0
        $newPerson->note = $validatedData['note'] ;
        $newPerson-> household_id = $household_id;  
        $newPerson->save();

        $people = People::where('household_id','=',$household_id)->get();
        $household = Household::find($household_id);
        $owner = People::find($household->owner_id);
        
        // return redirect('household/add')->with([
        //     'message' => 'Add person success',
        //     'people'=>$people,
        //     'owner'=>$owner,
        //     'household'=>$household
        // ]);
        return view('pages.house_hold_create')
            ->with('message', 'Add person success')
            ->with('people',$people)
            ->with('household',$household)
            ->with('owner',$owner)
            ->with('household_id',$household_id);
    }

    public function sendInfo(){
        return redirect('household/list')->with('message','Tạo hộ khẩu thành công');
    }

}
