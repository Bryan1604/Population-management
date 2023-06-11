<?php

namespace App\Http\Controllers;

use App\Models\People;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PeopleController extends Controller
{
    public function getAllPeople(){
        $people = People::all();
        return view('pages.people_list',['people'=>$people]);
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
}
