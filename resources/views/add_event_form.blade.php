@extends('layouts.app')

@section('content')
    <div class="addeventform-content">
        <div class="row">
            <div class="col-md-6">

                <form method="POST" action="{{ route('insert') }}">
                    @csrf
                    <div class="form-group">
                        <label for="organizer">Organizzatore evento</label>
                        <input type="text" class="form-control" id="organizer" name="organizer">
                    </div>
                    <div class="form-group">
                        <label for="organizer">Titolo evento</label>
                        <input type="text" class="form-control" id="organizer" name="title">
                    </div>

                    <div class="form-group">
                        <label for="date_start">Data inizio</label>
                        <input type="datetime-local" class="form-control" id="date_start" name="date_start">
                    </div>

                    <div class="form-group">
                        <label for="date_end">Data fine</label>
                        <input type="datetime-local" class="form-control" id="date_end" name="date_end">
                    </div>
                    <div class="form-group">
                        <label for="organizer">Partecipanti</label>
                        <input type="text" class="form-control" id="attendees" name="attendees">
                        <small id="attendeesHelp" class="form-text text-muted">Inserisci gli indirizzi email dei partecipanti separati dalla virgola</small>
                    </div>
                    <button type="submit" class="btn btn-primary">Crea evento</button>
                    <a href="/calendar" class="btn btn-secondary">Indietro</a>
                </form>


            </div>
        </div>
    </div>
@endsection
