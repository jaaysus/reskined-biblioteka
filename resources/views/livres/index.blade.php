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
            border: 1px solid #8b7355; /* Warm, earthy brown */
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.3s ease;
            background-color: transparent;
            color: #8b7355; /* Warm, earthy brown */
        }

        .btn:hover {
            background-color: #8b7355; /* Warm, earthy brown */
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .btn-primary {
            border-color: #8b7355; /* Warm, earthy brown */
        }

        .btn-warning {
            border-color: #f39c12; /* Orange */
            color: #f39c12; /* Orange */
        }

        .btn-warning:hover {
            background-color: #f39c12; /* Orange */
            color: white;
        }

        .btn-danger {
            border-color: #e74c3c; /* Red */
            color: #e74c3c; /* Red */
        }

        .btn-danger:hover {
            background-color: #e74c3c; /* Red */
            color: white;
        }

        /* List Styles */
        .livres-list {
            list-style: none;
            padding: 0;
        }

        .livres-list li {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px;
            border-bottom: 1px solid #ddd;
            transition: background-color 0.3s ease;
        }

        .livres-list li:hover {
            background-color: #f1f1f1;
        }

        .livres-list li:last-child {
            border-bottom: none;
        }

        .livres-list .details {
            flex: 1;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        /* Equal width for all spans */
        .livres-list .details span {
            flex: 1; /* Equal width for all spans */
            margin-right: 20px;
            text-align: left; /* Align text to the left */
        }

        .livres-list .actions {
            display: flex;
            gap: 10px;
        }
    </style>

    <div class="container">
        <h1 class="title">Liste des Livres</h1>

        <a href="{{ route('livres.create') }}" class="btn btn-primary">Ajouter un Livre</a>

        <ul class="livres-list">
            <!-- Header Row -->
            <li>
                <div class="details">
                    <span><strong>Titre</strong></span>
                    <span><strong>Année de publication</strong></span>
                    <span><strong>Nombre de pages</strong></span>
                    <span><strong>Auteur</strong></span>
                    <span><strong>Actions</strong></span>
                </div>
            </li>

            <!-- Book Rows -->
            @foreach ($livres as $livre)
                <li>
                    <div class="details">
                        <span>{{ $livre->titre }}</span>
                        <span>{{ $livre->annee_publication }}</span>
                        <span>{{ $livre->nombre_pages }}</span>
                        <span>{{ $livre->auteur ? $livre->auteur->nom : 'Auteur non défini' }}</span>
                    </div>
                    <div class="actions">
                        <a href="{{ route('livres.edit', $livre) }}" class="btn btn-warning">Modifier</a>
                        <form action="{{ route('livres.destroy', $livre) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>

        {{ $livres->links() }}
    </div>
@endsection