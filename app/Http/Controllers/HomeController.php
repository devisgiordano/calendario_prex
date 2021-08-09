<?php

namespace App\Http\Controllers;
use App\Models\Event;
use DB;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('calendar');
    }

    public function showAddEventForm(){
        return view('add_event_form');
    }

    public function insertEvent(Request $request){
        $input = $request->all();

        Validator::make($input, [
            'organizer' => 'required|min:2|max:255',
            'title' => 'required|min:2|max:255',
            'date_start' => 'required',
            'date_end' => 'required'
        ])->validate();
        $dateStart = Carbon::parse($request->input('date_start'));
        $dateEnd = Carbon::parse($request->input('date_end'));

        if($dateStart >= $dateEnd)
            return redirect()->route('showform')
                ->with('error','La data di inizio evento deve essere precedente alla data di fine evento');

        $objEvent = new Event();
        $objEvent->organizer = $request->input('organizer');
        $objEvent->title = $request->input('title');
        $objEvent->date_from = $request->input('date_start');
        $objEvent->date_to = $request->input('date_end');
        $objEvent->attendees = $request->input('attendees');

        $objEvent->save();

        return redirect()->route('calendar')
            ->with('success','Evento inserito correttamente!');
    }
}
