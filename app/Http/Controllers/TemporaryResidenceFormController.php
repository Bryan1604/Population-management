<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TemporaryAbsenceForm;
use App\Models\TemporaryResidenceForm;
use App\Models\People;

class TemporaryResidenceFormController extends Controller
{
    public function getTemporaryResidenceForm(){
        $trd = TemporaryResidenceForm::all();
        $people = [];
        foreach($trd as $item){
            $p = People::find($item->people_id);
            $item->people = $p; 
            $people[] = $p;
        }

        // $data = [
        //     'trd' => $trd,
        //     'people' => $people,
        // ];
    
        $jsonData = json_encode($trd);

        return view('demo',['data'=>$jsonData]);
    }

    public function getInfoDetails(Request $request, $id){
        if($request){
            $info = TemporaryResidenceForm::find($id);

            if ($info) {
                $infoDetail = People::find($info->people_id);
                return view('demo', ['infoDetail' => $infoDetail]);
            } else {
                return view('demo', ['infoDetail' => "no data"]);
            }
        }else{
            return view('demo', ['infoDetail' => "no request"]);
        }
      
    }
}
