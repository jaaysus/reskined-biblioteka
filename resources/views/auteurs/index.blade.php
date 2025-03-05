@extends('layouts.app')

@section('content')
    <style>
        /* General Styles */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f9f9f9;
            color: #333;
            line-height: 1.6;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 4px;
        }

        .title {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 30px;
            font-size: 2rem;
            font-weight: 600;
        }

        /* Button Styles */
        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 500;
            transition: background-color 0.3s ease;
        }

        .btn-primary {
            background-color: #3498db;
            color: white;
        }

        .btn-primary:hover {
            background-color: #2980b9;
        }

        .btn-warning {
            background-color: #f39c12;
            color: white;
        }

        .btn-warning:hover {
            background-color: #e67e22;
        }

        .btn-danger {
            background-color: #e74c3c;
            color: white;
        }

        .btn-danger:hover {
            background-color: #c0392b;
        }

        /* List Styles */
        .auteurs-list {
            list-style: none;
            padding: 0;
        }

        .auteurs-list li {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            border-bottom: 1px solid #ddd;
            transition: background-color 0.3s ease;
        }

        .auteurs-list li:hover {
            background-color: #f1f1f1;
        }

        .auteurs-list li:last-child {
            border-bottom: none;
        }

        .auteurs-list .actions {
            display: flex;
            gap: 10px;
        }
    </style>

    <div class="container">
        <h1 class="title">Liste des Auteurs</h1>

        <a href="{{ route('auteurs.create') }}" class="btn btn-primary">Ajouter un Auteur</a>

        <ul class="auteurs-list">
            @foreach ($auteurs as $auteur)
                <li>
                    <span>{{ $auteur->nom }} {{ $auteur->prenom }}</span>
                    <div class="actions">
                        <a href="{{ route('auteurs.edit', $auteur) }}" class="btn btn-warning">Modifier</a>
                        <form action="{{ route('auteurs.destroy', $auteur) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@endsection