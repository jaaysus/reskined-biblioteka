@extends('layouts.app')

@section('content')
    <h1>Liste des Auteurs</h1>
    <a href="{{ route('auteurs.create') }}" class="btn btn-primary">Ajouter un Auteur</a>
    <ul>
        @foreach ($auteurs as $auteur)
            <li>
                {{ $auteur->nom }} {{ $auteur->prenom }}
                <a href="{{ route('auteurs.edit', $auteur) }}" class="btn btn-warning">Modifier</a>
                <form action="{{ route('auteurs.destroy', $auteur) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
