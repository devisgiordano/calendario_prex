@extends('layouts.app')

@section('content')
    <div class="cal-content">
        <div class="row">
            <div class="col-md-6">
                {!! $calendar->calendar() !!}
                {!! $calendar->script() !!}
            </div>
            <div class="col-md-6">
            <a href="/addevent" class="btn btn-primary">Aggiungi evento</a>
            </div>
        </div>
    </div>
@endsection
