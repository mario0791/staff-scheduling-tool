<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\ZoomMeeting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Traits\ZoomMeetingTrait;

class ZoomMeetingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use ZoomMeetingTrait;
    const MEETING_TYPE_INSTANT = 1;
    const MEETING_TYPE_SCHEDULE = 2;
    const MEETING_TYPE_RECURRING = 3;
    const MEETING_TYPE_FIXED_RECURRING_FIXED = 8;
    const MEETING_URL = "https://api.zoom.us/v2/";

    public function index()
    {
        $created_by = Auth::user()->get_created_by();
        $ZoomMeetings = ZoomMeeting::where('created_by', $created_by)->get();
        $this->statusUpdate();
        return view('zoom.index', compact('ZoomMeetings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $created_by = Auth::user()->get_created_by();
        $employee_option = Employee::where('is_delete', '0')->where('created_by', $created_by)->Where('type', 'employee')->pluck('first_name', 'id');
        return view('zoom.create', compact('employee_option'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $created_by = Auth::user()->get_created_by();
        $validator = \Validator::make(
            $request->all(),
            [
                'title' => 'required',
                'user_id' => 'required',
                'password' => 'required',
                'start_date' => 'required',
                'start_time' => 'required',
                'duration' => 'required',
            ]
        );

        if ($validator->fails()) {
            $messages = $validator->getMessageBag();
            return redirect()->back()->with('error', $messages->first());
        }

        $request->start_date = $request->start_date . ' ' . $request->start_time . ':00';

        $data['topic'] = $request->title;
        $data['start_time'] = date('y:m:d H:i:s', strtotime($request->start_date));
        $data['duration'] = (int)$request->duration;
        $data['password'] = $request->password;
        $data['host_video'] = 0;
        $data['participant_video'] = 0;
        $meeting_create = $this->createmitting($data);
        \Log::info('Meeting');
        \Log::info((array)$meeting_create);
        if (isset($meeting_create['success']) &&  $meeting_create['success'] == true) {
            $meeting_id = isset($meeting_create['data']['id']) ? $meeting_create['data']['id'] : 0;
            $start_url = isset($meeting_create['data']['start_url']) ? $meeting_create['data']['start_url'] : '';
            $join_url = isset($meeting_create['data']['join_url']) ? $meeting_create['data']['join_url'] : '';
            $status = isset($meeting_create['data']['status']) ? $meeting_create['data']['status'] : '';

            $zoomeeting              = new ZoomMeeting();
            $zoomeeting->title        = $request->title;
            $zoomeeting->meeting_id       = $meeting_id;
            $zoomeeting->password = $request->password;
            $zoomeeting->start_date    = date('y:m:d H:i:s', strtotime($request->start_date));
            $zoomeeting->user_id    = implode(',', $request->user_id);
            $zoomeeting->duration    = (int)$request->duration;
            $zoomeeting->start_url = $start_url;
            $zoomeeting->join_url = $join_url;
            $zoomeeting->status = $status;
            $zoomeeting->created_by  = $created_by;
            // dd($zoomeeting);
            $zoomeeting->save();

            return redirect()->back()->with('success', __('ZoomMeeting Successfully create..'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ZoomMeeting  $zoomMeeting
     * @return \Illuminate\Http\Response
     */
    public function show(ZoomMeeting $zoomMeeting)
    {
        if ($zoomMeeting->created_by == Auth::user()->get_created_by()) {
            $zoomMeeting->user_name =  Employee::where('is_delete', '0')->where('created_by', Auth::user()->get_created_by())->Where('type', 'employee')->Where('id', $zoomMeeting->user_id)->pluck('first_name')->first();
            return view('zoom.view', compact('zoomMeeting'));
        } else {
            return redirect()->back()->with('error', 'permission Denied');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ZoomMeeting  $zoomMeeting
     * @return \Illuminate\Http\Response
     */
    public function edit(ZoomMeeting $zoomMeeting)
    {
        $created_by = Auth::user()->get_created_by();
        $employee_option = Employee::where('is_delete', '0')->where('created_by', $created_by)->Where('type', 'employee')->pluck('first_name', 'id');
        return view('zoom.edit', compact('employee_option', 'zoomMeeting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ZoomMeeting  $zoomMeeting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ZoomMeeting $zoomMeeting)
    {
        $created_by = Auth::user()->get_created_by();
        $validator = \Validator::make(
            $request->all(),
            [
                'title' => 'required',
                'user_id' => 'required',
                'password' => 'required',
                'start_date' => 'required',
                'duration' => 'required',
            ]
        );

        if ($validator->fails()) {
            $messages = $validator->getMessageBag();
            return redirect()->back()->with('error', $messages->first());
        }

        $zoomMeeting->title = $request->title;
        $zoommeeting->meeting_id       = $request->meeting_id;
        $zoomMeeting->user_id = $request->user_id;
        $zoomMeeting->password = $request->password;
        $zoomMeeting->start_date = $request->start_date;
        $zoomMeeting->duration = $request->duration;
        $zoomMeeting->save();
        return redirect()->back()->with('success', __('Zoom Meeting Update Successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ZoomMeeting  $zoomMeeting
     * @return \Illuminate\Http\Response
     */
    public function destroy(ZoomMeeting $zoomMeeting)
    {
        $zoomMeeting->delete();
        return redirect()->back()->with('success', __('Zoom Meeting Delete Succsefully'));
    }
    public function calender()
    {
        $user = \Auth::user();
        $created_by = Auth::user()->get_created_by();
        $zoommeetings = ZoomMeeting::where('created_by', $created_by)->get();
        $current_month_zoommeetings = ZoomMeeting::whereMonth('start_date', date('m'))->where('created_by', $created_by)->get();

        $arrMeeting = [];
        foreach ($zoommeetings as $zoommeeting) {
            $arr['id']        = $zoommeeting['id'];
            $arr['title']     = $zoommeeting['title'];
            $arr['start']     = $zoommeeting['start_date'];
            $arr['className'] = 'event-primary';
            $arr['url']       = route('zoom-meeting.show', $zoommeeting['id']);
            $arrMeeting[]        = $arr;
        }

        $calandar = array_merge($arrMeeting);
        $calandar = str_replace('"[', '[', str_replace(']"', ']', json_encode($calandar)));
        return view('zoom.calendar', compact('calandar', 'current_month_zoommeetings'));
    }
    public function statusUpdate()
    {
        $meetings = ZoomMeeting::where('status', 'waiting')->where('created_by', \Auth::user()->id)->pluck('meeting_id');
        foreach ($meetings as $meeting) {
            $data = $this->get($meeting);
            if (isset($data['data']) && !empty($data['data'])) {
                $meeting = ZoomMeeting::where('meeting_id', $meeting)->update(['status' => $data['data']['status']]);
            }
        }
    }
}
