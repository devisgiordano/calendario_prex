<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Acaronlex\LaravelCalendar\Calendar;
use DB;
use \App\Models\Event;

class CalendarController extends Controller
{
    public function showCalendar(){


        $events = [];
        $objEvents = Event::all();
        foreach($objEvents as $event){
            /*
            $events[] = \Calendar::event(
                'Event One', //event title
                false, //full day event?
                '2021-08-11T0800', //start time (you can also use Carbon instead of DateTime)
                '2021-08-12T0800', //end time (you can also use Carbon instead of DateTime)
                0 //optionally, you can specify an event ID
            );
            */
            $events[] = \Calendar::event(
                $event->title,
                false,
                $event->date_from,
                $event->date_to
            );
        }


        $calendar = new Calendar();
        $calendar->addEvents($events)
            ->setOptions([
                'locale' => 'it',
                'firstDay' => 1,
                'displayEventTime' => true,
                'selectable' => true,
                'initialView' => 'dayGridMonth',
                'headerToolbar' => [
                    'end' => 'today prev,next dayGridMonth timeGridWeek timeGridDay'
                ],
                'buttonText' => [
                    'today' => 'oggi',
                    'month' => 'mese',
                    'week'  => 'settimana',
                    'day'   => 'giorno'
                ],
            ]);
        $calendar->setId('1');
        $calendar->setCallbacks([
            'select' => 'function(selectionInfo){}',
            'eventClick' => 'function(event){}'
        ]);

        return view('calendar', compact('calendar'));


    }
}
