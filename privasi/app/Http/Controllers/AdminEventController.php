<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use Illuminate\Support\Facades\View;
use App\subcategory;
use DateTime;
use App\User;

class AdminEventController extends Controller
{
    public function lihatCalendar()
    {
        return view('admin/adminevent/index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'events'     => Event::orderBy('start_time')->paginate(15)
        ];
        
        return view('admin/adminevent/list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/adminevent/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $time = explode(" - ", $request->input('time'));
          
         $event = new Event;
         $event->user_id = $request->input('userid');
         $event->title = $request->input('title');
         $event->komunitas = $request->input('komunitas');
         $event->start_time = $time[0];
         $event->end_time = $time[1];
         $event->save();
          
         \Session::flash('flash_message', 'Event sudah Terbuat..!!');

         return redirect()->action('AdminEventController@lihatCalendar');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::findOrFail($id);
        $userid = $event->user_id;
        $CariUsername = User::findOrFail($userid);
        
        $first_date = new DateTime($event->start_time);
        $second_date = new DateTime($event->end_time);
        $difference = $first_date->diff($second_date);

        $data = [
            'page_title'    => $event->title,
            'event'         => $event,
            'CariUsername'  => $CariUsername,
            'duration'      => $this->format_interval($difference)
        ];

        return view('admin/adminevent/view', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::findOrFail($id);
        $event->start_time =  $event->start_time;
        $event->end_time =  $event->end_time;
        $userid = $event->user_id;
        $CariUsername = User::findOrFail($userid);
        
        $data = [
            'page_title'    => 'Edit '.$event->title,
            'CariUsername'  => $CariUsername,
            'event'         => $event,
        ];
        
        return view('admin/adminevent/edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $time = explode(" - ", $request->input('time'));
          
         $event = Event::findOrFail($id);
         $event->komunitas = $request->input('komunitas');
         $event->title = $request->input('title');
         $event->updated_by = $request->input('updated_by');
         $event->start_time = $time[0];
         $event->end_time = $time[1];
         $event->save();
          
         return redirect('admin/adminevent');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::find($id);
         $event->delete();
         
         \Session::flash('flash_message', 'Agenda sudah terhapuss..!!');
         return redirect('admin/adminevent');
    }

    public function change_date_format($date)
    {
        $time = DateTime::createFromFormat('d/m/Y H:i:s', $date);
        return $time->format('Y-m-d H:i:s');
    }
    
    public function change_date_format_fullcalendar($date)
    {
        $time = DateTime::createFromFormat('Y-m-d H:i:s', $date);
        return $time->format('d/m/Y H:i:s');
    }

    public function format_interval(\DateInterval $interval)
    {
        $result = "";
        if ($interval->y) { $result .= $interval->format("%y year(s) "); }
        if ($interval->m) { $result .= $interval->format("%m month(s) "); }
        if ($interval->d) { $result .= $interval->format("%d day(s) "); }
        if ($interval->h) { $result .= $interval->format("%h hour(s) "); }
        if ($interval->i) { $result .= $interval->format("%i minute(s) "); }
        if ($interval->s) { $result .= $interval->format("%s second(s) "); }
        
        return $result;
    }
}
