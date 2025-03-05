<!-- resources/views/emprunts/index.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Liste des Emprunts</h1>

    <!-- Search Form -->
    <form method="GET" action="{{ route('emprunts.index') }}">
        <label for="start_date">Date de début</label>
        <input type="date" name="start_date" id="start_date" value="{{ request('start_date') }}">

        <label for="end_date">Date de fin</label>
        <input type="date" name="end_date" id="end_date" value="{{ request('end_date') }}">

        <button type="submit">Filtrer</button>
    </form>

    <a href="{{ route('emprunts.create') }}">Ajouter un emprunt</a>

    <table>
        <thead>
            <tr>
                <th>Livre</th>
                <th>Auteur</th>
                <th>Date d'emprunt</th>
                <th>Date de retour</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($emprunts as $emprunt)
                <tr>
                    <td>{{ $emprunt->livre ? $emprunt->livre->titre : 'Livre non trouvé' }}</td>
                    <td>{{ $emprunt->livre ? $emprunt->livre->auteur : 'Auteur non trouvé' }}</td>
                    <td>{{ $emprunt->date_emprunt }}</td>
                    <td>{{ $emprunt->date_retour ? $emprunt->date_retour : 'Non retourné' }}</td>
                    <td>
                        <a href="{{ route('emprunts.edit', $emprunt->id) }}">Modifier</a>
                        <form action="{{ route('emprunts.destroy', $emprunt->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
