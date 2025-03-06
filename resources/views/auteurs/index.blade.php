@extends('layouts.app')

@section('content')
    <style>
        /* General Styles */
        body {
            font-family: 'Georgia', serif;
            background-color: #f5f5dc; /* Parchment-like background */
            color: #3e2723; /* Dark brown for text */
            line-height: 1.6;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fffaf0; /* Light, creamy background */
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .title {
            text-align: center;
            color: #8b7355; /* Warm, earthy brown */
            margin-bottom: 30px;
            font-size: 2.5rem;
            font-weight: 600;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
        }

        /* Button Styles */
        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background-color: #8b7355; /* Warm, earthy brown */
            color: white;
        }

        .btn-primary:hover {
            background-color: #6d4c41; /* Darker brown */
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .btn-warning {
            background-color: #f39c12; /* Orange */
            color: white;
        }

        .btn-warning:hover {
            background-color: #e67e22; /* Darker orange */
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .btn-danger {
            background-color: #e74c3c; /* Red */
            color: white;
        }

        .btn-danger:hover {
            background-color: #c0392b; /* Darker red */
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
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
            padding: 15px;
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