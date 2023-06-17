<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TemporaryResidenceForm;
use App\Models\People;
use Illuminate\Auth\Events\Validated;

class TemporaryResidenceFormController extends Controller
{
    public function getTemporaryResidenceForm(){
        $trd = TemporaryResidenceForm::with('people')->get();
        return view('pages/staying_list',['data'=>$trd]);
    }

    public function getInfoDetails($id){
        $info = TemporaryResidenceForm::with('people')->find($id);
        return view('pages/staying_detail', ['infoDetail' => $info]);
    }


    // khi tạo tạm trú: 
    // có cần tạo thêm hộ khẩu hay ko ??
    public function store(Request $request) {
        $validatedData = $request->validate([
            'fullname' => 'required',
            'sex' => 'required',
            'birthday' => 'required',
            'place_of_birth' => 'required',
            'ethnic' => 'required',
            'job' => 'required',
            'office' => 'required',
            'identify_number' => 'required',
            'received_IDCard_place' => 'required',
            'received_IDCard_time' => 'required',
            'domicile' => 'required',
            'address_before' => 'required',
        ]);
    
        $people = new People();
        $people->household_id = 0;
        $people->fullname = $validatedData['fullname'];
        $people->sex = $validatedData['sex'];
        $people->birthday = $validatedData['birthday'];
        $people->place_of_birth = $validatedData['place_of_birth'];
        $people->ethnic = $validatedData['ethnic'];
        $people->job = $validatedData['job'];
        $people->office = $validatedData['office'];
        $people->identify_number = $validatedData['identify_number'];
        $people->received_IDCard_place = $validatedData['received_IDCard_place'];
        $people->received_IDCard_time = $validatedData['received_IDCard_time'];
        $people->phone_number = $validatedData['domicile'];
        $people->address_before = $validatedData['address_before'];
        $people->state = 2;
        $people->save();
    
        $trf = new TemporaryResidenceForm();
        $trf->people_id = $people->id;
        $trf->reason = $request->input('reason');
        $trf->address = $request->input('address');
        $trf->note = $request->input('note');
        $trf->save();
    
        return redirect('pages/staying_create_form')->with('message','saved successfully');
    }

    public function create(){
        return view('pages/staying_create_form');
    }

    public function update(Request $request, $id){
        $trf = TemporaryResidenceForm::find($id);
        if(!$trf && $request){
            $trf->address = $request->input('address');
            $trf->reason = $request->input('reason');
            $trf->note = $request->input('note');
            $trf->save();
            return redirect('pages/staying_detail')->with('message','updated successfully');
        }


    }
}
