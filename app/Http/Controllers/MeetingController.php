<?php

namespace App\Http\Controllers;

use App\Models\Meeting;
use App\Models\ParticipateMeetingForm;
use App\Models\People;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class MeetingController extends Controller
{
    public function getAllMeeting(Request $request){
        // $meetings = Meeting::latest()
        //     ->orderBy('id', '')
        //     ->paginate(5);
        $meetings = Meeting::where([
            ['title','!=',Null],
            [function ($query) use ($request){
                if(($term = $request->term)){
                    $query->orWhere('title','LIKE','%' . $term . '%')->get();
                }
            } ]
        ])
            ->orderBy("id","asc")
            ->paginate(5);

        return view('pages/meeting_list',compact('meetings'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function index(Request $request){
        // $meetings = Meeting::latest()
        //     ->orderBy('id', '')
        //     ->paginate(5);
        $meetings = Meeting::where([
            ['title','!=',Null],
            [function ($query) use ($request){
                if(($term = $request->term)){
                    $query->orWhere('title','LIKE','%' . $term . '%')->get();
                }
            } ]
        ])
            ->orderBy("id","asc");
           // ->paginate(5);

        return view('pages/meeting_list',compact('meetings'))->with('i', (request()->input('page', 1) - 1) * 5);
        // echo "ello";
    }

    public function getMeetingDetail($id) {
        $meeting_detail = Meeting::find($id);
        $participations = ParticipateMeetingForm::where('meeting_id', $id)->get();
        $people_ids = $participations->pluck('people_id');
        $people = People::whereIn('id', $people_ids)->get();
        return view('pages.meeting_detail', ['meeting_detail' => $meeting_detail, 'people' => $people]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'time' => 'required',
            'place' => 'required',
            'number_of_paticipants' => 'required',
            'status' => 'required',


        ]);
  
        Meeting::create($request->all());
        session()->put('message','Create complete');
        return redirect('meeting/list')->with('success','Post created successfully.');
    }

   

    public function edit($id)
    {
        $meeting = Meeting::find($id);
        return view('pages.meeting_edit', compact('meeting'));    
    }
    
    public function update(Request $request, $id)
    {
        $meeting = Meeting::find($id);
        $meeting->time = $request->input('time');
        $meeting->place = $request->input('place');
        $meeting->title = $request->input('title');
        $meeting->number_of_paticipants = $request->input('number_of_paticipants');
        $meeting->status = $request->input('status');
        $meeting->update();
        session()->put('message1','Update complete');
        return redirect('meeting/list')->with('success','Post created successfully.');
    }

    public function destroy($id)
    {
        $meeting =  Meeting::find($id);
        $deletedId = $meeting->id;
        $meeting->delete();
        session()->put('message2','Delete complete');
        //Meeting::where('id', '>', $deletedId)->decrement('id');

        return redirect()->route('meetings.index')
                        ->with('success','Xoá nhân khẩu thành công');
    }
    

}
