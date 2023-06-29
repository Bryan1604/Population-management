<?php

namespace App\Http\Controllers;

use App\Models\Household;
use App\Models\People;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Contracts\Session\Session;

class PeopleController extends Controller
{
    public function getAllPeople(){
        $people = People::with('household')->with('temporaryAbsenceForm')->orderByDesc('household_id')->get();
        return view('pages.people_list',['data'=>$people]);
    }

    public function getPeopleDetail($id){
        $people_detail = People::find($id);
        return view('pages.people_detail',['people_detail'=>$people_detail]);
    }

    public function calculateChart(){
        // data of pie chart
        $people1 = People::where('state',0)->count(); // co ho khau
        $people2 = People::where('state',1)->count(); // tam vang 
        $people3 = People::where('state',2)->count(); // tam tru 
        $data = [$people1,$people2,$people3];

        // data of bar chart 
        $month = [];
        for($i=0;$i<12;$i++){
            $men = People::whereMonth('updated_at',$i+1)->where('state','!=','2')->where('sex',0)->count();
            $women = People::whereMonth('updated_at',$i+1)->where('state','!=','2')->where('sex',1)->count();
            $monthData = ['men' => $men, 'women' => $women];
            array_push($month,$monthData);
        }

        // data of line chart
        $lineChartData = [];
        for($i =0;$i<12;$i++){
            $lineData = People::whereMonth('updated_at',$i+1)->where('state','!=',1)->count();
            array_push($lineChartData,$lineData);
        }
        return view('pages.dashboard',['data'=>$data,'genderData'=>$month,'lineChartData'=>$lineChartData]);
    }

    public function create(){
        
    }

    // them 1 nhan khau 
    public function store(Request $request){
        $validatedData = $request->validate([
            'fullname' => 'required',
            'sex' => 'required',
            'birthday' => 'required',
            'identify_number' => 'required',
            'place_of_birth' => 'required',
            'received_IDCard_place' => 'required',
            'received_IDCard_time' => 'required',
            'address_before' => 'required',
            'phone_number'=>'required',
            'ethnic'=>'required',
            'domicile'=>'required',
            'household_owner_relationship'=>'required',
            'note'=>'required',
        ]);
    
        $people = new People();
        $people->household_id = 0;
        $people->fullname = $validatedData['fullname'];
        if($validatedData['sex'] == 'male'){
            $people->sex = 0;
        }else{
            $people->sex = 1;
        }
        $people->birthday = $validatedData['birthday'];
        $people->place_of_birth = $validatedData['place_of_birth'];
        $people->identify_number = $validatedData['identify_number'];
        $people->received_IDCard_place = $validatedData['received_IDCard_place'];
        $people->received_IDCard_time = $validatedData['received_IDCard_time'];
        $people->address_before = $validatedData['address_before'];
        $people->phone_number = $validatedData['phone_number'];
        $people->state = 0;
        $people->ethnic = $validatedData['ethnic'];
        $people->domicile =  $validatedData['domicile'];
        $people->household_owner_relationship = $validatedData['household_owner_relationship'];
        $people->save();
        return redirect('people/list')->with('message','saved successfully');
    }

    
    // them 1 nhan khau vao ho khau da co
    public function addNewPerson($household_id){
        $household = Household::find($household_id);
        $owner = $household->owner;
        $people = People::where('household_id','=',$household_id)->get();
        session()->put('household',$household);
        session()->put('owner',$owner);
        session()->put('people',$people);
        session()->put('household_id',$household_id);
        return view('pages.house_hold_create')
            ->with('household',$household)
            ->with('household_id',$household_id)
            ->with('people',$people)
            ->with('owner',$owner)
        ;
    }
    public function storeNewPerson(Request $request, $household_id){
        $validatedData = $request->validate([
            'fullname' => 'required',
            'sex' => 'required',
            'birthday' => 'required',
            'identify_number' => 'required',
            'place_of_birth' => 'required',
            'received_IDCard_place' => 'required',
            'received_IDCard_time' => 'required',
            'address_before' => 'required',
            'phone_number'=>'required',
            'ethnic'=>'required',
            'domicile'=>'required',
            'household_owner_relationship'=>'required',
            'note'=>'required',
        ]);
    
        $household_id = session()->get('household_id');
        $newPerson = new People();
        $newPerson->household_id = $household_id;
        $newPerson->fullname = $validatedData['fullname'];
        if($validatedData['sex'] == 'male'){
            $newPerson->sex = 0;
        }else{
            $newPerson->sex = 1;
        }
        $newPerson->birthday = $validatedData['birthday'];
        $newPerson->place_of_birth = $validatedData['place_of_birth'];
        $newPerson->identify_number = $validatedData['identify_number'];
        $newPerson->received_IDCard_place = $validatedData['received_IDCard_place'];
        $newPerson->received_IDCard_time = $validatedData['received_IDCard_time'];
        $newPerson->address_before = $validatedData['address_before'];
        $newPerson->phone_number = $validatedData['phone_number'];
        $newPerson->state = 0;
        $newPerson->ethnic = $validatedData['ethnic'];
        $newPerson->domicile =  $validatedData['domicile'];
        $newPerson->household_owner_relationship = $validatedData['household_owner_relationship'];
        $newPerson->save();

        $household = Household::with('owner')->find($household_id)->first();
        $people = People::where('household_id','=',$household_id);
        $owner = People::find($household->owner_id) ;
        return view('pages.house_hold_create')
            ->with('message', 'thêm nhân khẩu thành công')
            ->with('people',$people)
            ->with('household',$household)
            ->with('owner',$owner)
            ->with('household_id',$household_id);
    }

  
}
