<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TemporaryResidenceForm;
use App\Models\People;
use Illuminate\Auth\Events\Validated;
use Carbon\Carbon;

class TemporaryResidenceFormController extends Controller
{
    public function getTemporaryResidenceForm(Request $request){
        $search = $request->input('search') ?? "";
            if($search != ""){
                $trf = TemporaryResidenceForm::with('people')
                        ->whereHas('people', function ($query) use ($search) {
                            $query->where('fullname', 'LIKE', "%$search%")
                            ->orWhere('identify_number', 'LIKE', "%$search%")
                            ->orWhere('address_before', 'LIKE', "%$search%");
                         })
                        ->get();
            }else{
                $trf = TemporaryResidenceForm::all();
            }
        return view('pages/staying_list',['data'=>$trf,'search'=>$search]);
    }

    public function getInfoDetails($id){
        $info = TemporaryResidenceForm::with('people')->find($id);
        return view('pages/staying_detail', ['data' => $info]);
    }


    // khi tạo tạm trú: 
    // có cần tạo thêm hộ khẩu hay ko ??
    public function store(Request $request) {
        $validatedData = $request->validate([
            'fullname' => 'required',
            'sex' => 'required',
            'birthday' => 'required',
            'identify_number' => 'required',
            'place_of_birth' => 'required',
            'received_IDCard_place' => 'required',
            'received_IDCard_time' => 'required',
            'address_before' => 'required',
            'temporary_address'=>'required',
            'phone_number'=>'required',
            'temporary_reason'=>'required',
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
        $people->state = 2;
        $people->ethnic = 'Kinh';
        $people->domicile =  $validatedData['address_before'];
        $people->save();
    
        $trf = new TemporaryResidenceForm();
        $trf->people_id = $people->id;
        $trf->reason = $validatedData['temporary_reason'];
        $trf->address = $validatedData['temporary_address'];
        $trf->note = $validatedData['note'];
        $trf->save();
    
        return redirect('staying/list')->with('message','saved successfully');
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

    // public function search(Request $request){
    //         $search = $request->input('search') ?? "";
    //         if($search != ""){
    //             $trf = TemporaryResidenceForm::with('people')->where('people.fullname',"LIKE","%$search%")
    //                     ->orWhere('people.identify_number',"LIKE","%$search%")
    //                     ->orWhere('people.address_before',"LIKE","%$search%")
    //                     ->get();
    //         }else{
    //             $trf = TemporaryResidenceForm::all();
    //         }
    //         return view('pages/staying_list',['data'=>$trf,'search'=>$search]);
    // }

    public function destroy($id){
        TemporaryResidenceForm::destroy($id);
        return redirect('staying/list')->with('flash_message','delete successful!');
    }
}
