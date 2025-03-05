<!-- resources/views/emprunts/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Modifier un Emprunt</h1>
    <form action="{{ route('emprunts.update', $emprunt->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="livre_id">Livre</label>
        <select name="livre_id" id="livre_id">
            @foreach($livres as $livre)
                <option value="{{ $livre->id }}" {{ $livre->id == $emprunt->livre_id ? 'selected' : '' }}>{{ $livre->titre }}</option>
            @endforeach
        </select>

        <label for="date_emprunt">Date d'emprunt</label>
        <input type="date" name="date_emprunt" id="date_emprunt" value="{{ $emprunt->date_emprunt }}">

        <label for="date_retour">Date de retour</label>
        <input type="date" name="date_retour" id="date_retour" value="{{ $emprunt->date_retour }}">

        <button type="submit">Mettre à jour</button>
    </form>
@endsection
