<?php

namespace Modules\Calendar\Http\Controllers;

use Modules\Calendar\Entities\Event;
use Illuminate\Http\Request;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Image;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        
        $events = Event::get();
       
    	$event_list = [];
    	foreach ($events as $key => $event) {
            $start = new Carbon($event->start_date);
            $end = new Carbon($event->end_date);
            $id = $event->id;
            $categorie = $event->categorie;
    		
               if($categorie == "coding"){
                $event_list[] = Calendar::event( $event->title,
                   false,
                   $start,
                   $end,
                   $id, [
                    'color' => '#000',
                    'url' => 'calendar/'.$id,
                    'textColor' => '#fff'
                   ]);
                //    echo 'coding'; 
               }  
               elseif($categorie == "hackathon"){
                $event_list[] = Calendar::event( $event->title,
                   false,
                   $start,
                   $end,
                   $id, [
                    'color' => '#AEEE00',
                    'url' => 'calendar/'.$id,
                    'textColor' => '#fff'
                   ]);
                //    echo 'hackahton'; 
               }
               elseif($categorie == "workshop"){
                $event_list[] = Calendar::event( $event->title,
                   false,
                   $start,
                   $end,
                   $id, [
                    'color' => '#C03000',
                    'url' => 'calendar/'.$id,
                    'textColor' => '#fff'
                   ]);
                //    echo 'workshop'; 
               }
               else{
                   return redirect('calendar::index',compact('event'));
               }  
           
               
            
        }
        
    	$calendar = Calendar::addEvents($event_list); 
        
        // dd(Event::all());
        return view('calendar::index', compact('calendar'));
    }
    
    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
   
        return view('calendar::index');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
       //dd($request);
        // $validatedData = $request->validate([
        //     'title' => 'required|unique:events|max:255',
        //     'start_date' => 'required|after:tomorrow',
        //     'end_date'=> 'required|after:start_date',
        //     'categorie'=> 'required',
        // ]);
    
            
        // $event = new Event; 
        // $event->title = $request['title'];
        // $event->start_date = $request['start_date'];
        // $event->end_date = $request['end_date'];
        // $event->categorie=$request['categorie'];
        // $event->description=$request['description'];
        // $event->salle=$request['salle'];
        // $event->etage=$request['etage'];


        // if($request->hasFile('image')){
        //     $image = $request->file('image');
        //     $filename = time().'.'.$image->getClientOriginalExtension();
        //     $location =  public_path('image/calendar/'.$filename);
        //     Image::make($image)->resize(800, 400)->save($location);
        //     $event->image = $filename;
        //     // dd($image);
        // }
        // if($event->start_date < $event->end_date){
        //     $event->save();
        // }
        // // dd($event);
        // // $event->save();
 
        // \Session::flash('success','Event added successfully.');
        request()->validate([
            'title' => ['required'],
        ]);
        
        $event = new Event;
        $event->title = $request->title;
        $event->user_id = Auth::id();
        $event->start_date ="2018-05-14 00:00:00";
        $event->end_date = "2019-05-14 00:00:00";
        $event->categorie="coding";
        $event->description="sddsd";
        // dd($request);
        $event->save();
        // Event::create(
        //     [   
        //         'categorie' => "test",
        //         'description' => "blabla",
        //         "image" => "googe",
        //         "user_id" => "1",
        //         "start_date" => "",
        //         "end_date" => "",
        //         'title'=> request('title'),
        //         // dd($request)
        //     ]
        //     );
            // dd(Event);
    //         flash("nice")->success();
    //    return redirect('calendar/admin/calendar');
    // return "votre commentaire et oké";
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show($id)
    {
        {
            // $event = Event::find($id);
            // $id = $event->id ;
            $calendar_events=Event::where('id', '=', $id)->get();
            // dd($calendar_event);
            return view('calendar::show', compact('calendar_events'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        $event = Event::find($id);
        return view('calendar::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request, $id)
    {
        // dd($id);
        $event = Event::find($id);
        $event->title = $request->title;
        $event->start_date = $request->start_date;
        $event->end_date = $request->end_date;
        $event->categorie=$request->categorie;
        $event->description=$request->description;
        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $location =  public_path('image/calendar/'.$filename);
            Image::make($image)->resize(800, 400)->save($location);
            $event->image = $filename;
        }
        if($event->start_date < $event->end_date){
            //dd($event);
            $event->save();
        }
        return redirect()->route('events.index', ['events' => $event->id]);
    }
  

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
    }
}
