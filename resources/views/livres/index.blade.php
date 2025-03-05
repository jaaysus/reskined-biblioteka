<!-- resources/views/livres/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Liste des livres</h1>
        <a href="{{ route('livres.create') }}" class="btn btn-primary mb-3">Ajouter un nouveau livre</a>

        <table class="table">
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Année de publication</th>
                    <th>Nombre de pages</th>
                    <th>Auteur</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($livres as $livre)
                    <tr>
                        <td>{{ $livre->titre }}</td>
                        <td>{{ $livre->annee_publication }}</td>
                        <td>{{ $livre->nombre_pages }}</td>
                        <td>{{ $livre->auteur->name }}</td>
                        <td>
                            <a href="{{ route('livres.edit', $livre) }}" class="btn btn-warning btn-sm">Modifier</a>

                            <!-- Delete Form -->
                            <form action="{{ route('livres.destroy', $livre) }}" method="POST" class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>


        {{ $livres->links() }}
    </div>
@endsection
