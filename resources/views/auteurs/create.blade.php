@extends('layouts.app')

@section('content')
    <h1>Ajouter un Auteur</h1>
    <form action="{{ route('auteurs.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="prenom">Prénom</label>
            <input type="text" name="prenom" id="prenom" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
@endsection
