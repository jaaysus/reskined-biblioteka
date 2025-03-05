<!-- resources/views/emprunts/create.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Ajouter un Emprunt</h1>
    <form action="{{ route('emprunts.store') }}" method="POST">
        @csrf
        <label for="livre_id">Livre</label>
        <select name="livre_id" id="livre_id">
            @foreach($livres as $livre)
                <option value="{{ $livre->id }}">{{ $livre->titre }}</option>
            @endforeach
        </select>

        <label for="date_emprunt">Date d'emprunt</label>
        <input type="date" name="date_emprunt" id="date_emprunt" value="{{ now()->toDateString() }}">

        <label for="date_retour">Date de retour</label>
        <input type="date" name="date_retour" id="date_retour">

        <button type="submit">Enregistrer</button>
    </form>
@endsection
