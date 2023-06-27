<?php

namespace App\Http\Controllers;

use App\Models\Meeting;
use Illuminate\Http\Request;
use Session;

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
            ->orderBy("id","asc")
            ->paginate(5);

        return view('pages/meeting_list',compact('meetings'))->with('i', (request()->input('page', 1) - 1) * 5);
        // echo "ello";
    }

    public function getMeetingDetail($id){
        $meeting_detail = Meeting::find($id);
        return view('pages.meeting_detail',['meeting_detail'=>$meeting_detail]);
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
        Session::put('message','Create complete');
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
        Session::put('message1','Update complete');
        return redirect('meeting/list')->with('success','Post created successfully.');
    }

    public function destroy($id)
    {
        // $meeting->delete();
 
        // return redirect('meeting/list')->with('success', 'Product has successfully deleted.');
        $meeting =  Meeting::find($id);
        $deletedId = $meeting->id;
        $meeting->delete();
        Session::put('message2','Delete complete');
        Meeting::where('id', '>', $deletedId)->decrement('id');

        
        return redirect()->route('meetings.index')
                        ->with('success','Xoá nhân khẩu thành công');
    }
    

}
