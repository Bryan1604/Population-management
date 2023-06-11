<?php

namespace App\Http\Controllers;

use App\Models\Meeting;
use Illuminate\Http\Request;

class MeetingController extends Controller
{
    public function getAllMeeting(){
        $meetings = Meeting::all();
        return view('pages/meeting_list',['meetings'=> $meetings]);
    }
}
