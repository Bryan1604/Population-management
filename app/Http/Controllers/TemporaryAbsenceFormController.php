<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TemporaryAbsenceForm;
use App\Models\People;
//use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Session;

class TemporaryAbsenceFormController extends Controller
{
    
    public function getAll(Request $request){
        $search = $request->input('search') ?? "";
        if($search != ""){
            $absents = TemporaryAbsenceForm::with('people')
                        ->whereHas('people', function ($query) use ($search) {
                            $query->where('fullname', 'LIKE', "%$search%");
                            // ->orWhere('household_id', '=', $search)
                            // ->orWhere('address', 'LIKE', "%$search%");
                        })
                        ->orderBy('created_at','ASC')
                        ->get();
        }else{
            $absents = TemporaryAbsenceForm::with('people')->get();
        }
        return view('pages.temporarily_absent_list',['data'=>$absents,'search'=>$search]);
    }

    public function absentInfoDetail($id){
        $absent = TemporaryAbsenceForm::with('people')->find($id);
        return view('pages.temporarily_absent_detail',['data'=>$absent]);
    }

    // lay ra danh sach nhan khau sau khi search 
    public function create(Request $request)
    {
        $search = $request->input('search') ?? "";
        if($search != ""){
            $people = People::with('household')
                        ->whereHas('household', function ($query) use ($search) {
                            $query->where('fullname', 'LIKE', "%$search%")
                            ->orWhere('identify_number', '=', "$search");
                        })
                        ->where('state','=',0)
                        ->get();
        }else{
            $people = null;
        }
        return view('pages.temporarily_absent_create_form',['people'=>$people,'search'=>$search]);
    }

    // get one person to create absent form
    function getOnePerson($id){
        $person = People::find($id);
        Session::put('people_id',$id);
        return response()->json(['person' => $person]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'move_time' => 'required',
            'move_place' => 'required',
            'reason' => 'required',
            'note'=>'required',
        ]);

        $people_id = Session::get('people_id');
        $people = People::find($people_id);
        $people->state = 1;
        $people->save();

        $absent = new TemporaryAbsenceForm();
        $absent->move_time = $validatedData['move_time'];
        $absent->move_place = $validatedData['move_place'];
        $absent->reason = $validatedData['reason'];
        $absent->note = $validatedData['note'];
        $absent->people_id = $people_id;
        $absent->save();

        return redirect('absent/list')->with('message','Created absent form successfully');
    }

    public function destroy($id){
        $taf = TemporaryAbsenceForm::with('people')->find($id);
        if (!$taf) {
            return view('pages.absent_list', ['flash_message' => 'Form not found!']);
        }
        $people = $taf->people()->first();
        $people_id = $people->id;
        $person= People::find($people_id);
        $person->state = 0;
        $person->save();
        $taf->delete();
        return redirect('absent/list') ->with('flash_message', 'Delete successful!');
    }
}
