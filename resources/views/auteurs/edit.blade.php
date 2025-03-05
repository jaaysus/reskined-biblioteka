@extends('layouts.app')

@section('content')
    <h1>Modifier l'Auteur</h1>
    <form action="{{ route('auteurs.update', $auteur) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom" class="form-control" value="{{ $auteur->nom }}" required>
        </div>
        <div class="form-group">
            <label for="prenom">Prénom</label>
            <input type="text" name="prenom" id="prenom" class="form-control" value="{{ $auteur->prenom }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
@endsection
