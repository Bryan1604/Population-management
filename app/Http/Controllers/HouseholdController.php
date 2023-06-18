<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Household;
use App\Models\People;
use Illuminate\Support\Facades\DB;
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

    public function addPersonForm($isOwner)
    {
        $maxId = DB::table('household')->max('id');

        if ($maxId === null) {
            return view('temporary_add_household/addowner', ['highestID' => 0, "isOwner" => $isOwner]);
        }

        return view('temporary_add_household/addowner', ['highestID' => $maxId, "isOwner" => $isOwner]);

    }

    
    public function submitPerson(Request $request)
{
    $save_data = $request->session()->get('save_data', []); // Lấy giá trị của 'save_data' từ session, mặc định là một mảng rỗng

    $new_data = $request->input(); // Lấy giá trị của request mới

    array_push($save_data, $new_data); // Thêm giá trị của request mới vào mảng 'save_data'

    $request->session()->put('save_data', $save_data); // Lưu trữ mảng 'save_data' vào session

    return redirect('/create_household');
// Redirect trở lại trang trước đó hoặc trang gốc
}


public function save(Request $request)
{
    
    $saveData = $request->session()->get('save_data'); // Lấy giá trị của 'save_data' từ session
    $owners = [];
    $persons = [];
    $quantity = 0;
    if (!empty($saveData)) {
        echo count($saveData);
        foreach ($saveData as $data) {
            if ($data['isOwner'] == 1)
            {
                array_push($owners, $data); 
            }
            else 
            {
                array_push($persons, $data);
            }
            $quantity = $quantity + 1;
           // echo $data['full_name'];
           // echo "<br>";
        }
    } else {
        echo "No data found in session.";
    }
    $maxPeopleId = DB::table('people')->max('id');
    $maxHouseholdId = DB::table('household')->max('id');
    $householdId = 0;
    if(!empty($owners))
    {
        $household = new Household;
        if ($maxHouseholdId === null)
        {
            $household->id = 1;
            $householdId = 1;
        }
        else {
            $household->id = $maxHouseholdId + 1;
            $householdId = $maxHouseholdId + 1;
        }
        if ($maxPeopleId === null)
        {
            $household->owner_id = 1;
        }
        else {
            $household->owner_id = $maxPeopleId + 1;
        }
        $household->address = "unknown";
        $household->quantity = $quantity;
        $household->save();

        $people = new People;
        foreach ($owners as $owner) {
         
            $people->household_id = $householdId;
            
            $people->fullname = $owner['full_name'];
            $people->sex = $owner['sex'];
            $people->birthday = $owner['birthday'];
            $people->place_of_birth = $owner['place_of_birth'];
            $people->ethnic = $owner['ethnic'];
            $people->job = $owner['job'];
            $people->office = $owner['office'];

            $people->identify_number = $owner['identify_number'];
            $people->received_IDCard_place = $owner['received_IDCard_place'];
            $people->recieved_IDCard_time = $owner['received_IDCard_time'];
            $people->phone_number = $owner['phone_number'];

            $people->domicile = $owner['domicile'];
            $people->address_before = $owner['address_before'];
            $people->household_owner_relationship = $owner['household_owner_relationship'];
            $people->state = $owner['state'];
            $people->note = $owner['note'];

            $people->save();
        }

        foreach ($persons as $owner) {
            $people = new People;
            $people->household_id = $householdId;
            
            $people->fullname = $owner['full_name'];
            $people->sex = $owner['sex'];
            $people->birthday = $owner['birthday'];
            $people->place_of_birth = $owner['place_of_birth'];
            $people->ethnic = $owner['ethnic'];
            $people->job = $owner['job'];
            $people->office = $owner['office'];

            $people->identify_number = $owner['identify_number'];
            $people->received_IDCard_place = $owner['received_IDCard_place'];
            $people->recieved_IDCard_time = $owner['received_IDCard_time'];
            $people->phone_number = $owner['phone_number'];

            $people->domicile = $owner['domicile'];
            $people->address_before = $owner['address_before'];
            $people->household_owner_relationship = $owner['household_owner_relationship'];
            $people->state = $owner['state'];
            $people->note = $owner['note'];

            $people->save();
        }
    }

    

    
    $request->session()->forget('save_data'); // Xoá dữ liệu trong session

    // Trả về một phản hồi JSON để xử lý trong JavaScript
    return response()->json([
        'success' => true,
        'message' => 'Data saved successfully.',
    ]);
}




}
