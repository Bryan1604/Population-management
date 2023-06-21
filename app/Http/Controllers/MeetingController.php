<?php

namespace App\Http\Controllers;

use App\Models\Meeting;
use Illuminate\Http\Request;

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
   
        return redirect('meeting/list')->with('success','Post created successfully.');
    }

    public function edit(Meeting $meeting)
    {
        return view('pages/meeting_edit', compact('meeting'));
    }
    


    public function update(Request $request, Meeting $meeting)
    {
        $request->validate([
            'title' => 'required',
            'time' => 'required',
            'place' => 'required',
            'number_of_paticipants' => 'required',
            'status' => 'required',
        ]);
 
        $meeting->update($request->all());
 
        return redirect()->route('meetings.getAllMeeting')->with('success', 'Product has successfully updated.');
    }

    public function destroy(Meeting $meeting)
    {
        $meeting->delete();
 
        return redirect('meeting/list')->with('success', 'Product has successfully deleted.');
    }
    

}
