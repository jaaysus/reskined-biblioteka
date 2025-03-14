@extends('layouts.app')

@section('content')
    <style>
        /* General Styles */
        body {
            font-family: 'Georgia', serif;
            background-color: #e3f2fd; /* Light blue background */
            color: #1e3a8a; /* Dark blue for text */
            line-height: 1.6;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff; /* White background for content */
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            animation: fadeIn 1s ease-in-out;
            position: relative;
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
            color: #1e3a8a; /* Dark blue for title */
            margin-bottom: 30px;
            font-size: 2.5rem;
            font-weight: 600;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
        }

        /* Button Styles */
        .btn {
            padding: 10px 20px;
            border: 1px solid #1e3a8a; /* Dark blue */
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.3s ease;
            background-color: transparent;
            color: #1e3a8a; /* Dark blue */
        }

        .btn:hover {
            background-color: #1e3a8a; /* Dark blue */
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .btn-primary {
            border-color: #1e3a8a; /* Dark blue */
        }

        .btn-warning {
            border-color: #ff9800; /* Orange */
            color: #ff9800; /* Orange */
        }

        .btn-warning:hover {
            background-color: #ff9800; /* Orange */
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

        /* Book Cards Styles */
        .row {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: space-between;
        }

        .book-card {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            width: calc(26.666% - 20px); /* 20% smaller than the original 33.333% */
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .book-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .book-card img {
            width: 100%;
            height: auto;
            border-bottom: 1px solid #ddd;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }

        .book-card-body {
            padding: 20px;
        }

        .book-card-body .title {
            font-size: 1.5rem;
            font-weight: bold;
            color: #1e3a8a; /* Dark blue */
            margin-bottom: 10px;
        }

        .book-card-body .details {
            font-size: 1rem;
            color: #333;
            margin-bottom: 10px;
        }

        .book-card-body .actions {
            display: flex;
            gap: 10px;
        }

        /* Responsiveness */
        @media (max-width: 992px) {
            .book-card {
                width: calc(50% - 20px); /* On medium screens (e.g., tablets), cards take 50% width */
            }
        }

        @media (max-width: 576px) {
            .book-card {
                width: 100%; /* On small screens (e.g., mobile), cards take full width */
            }
        }

        /* Floating "+" Button */
        /* Sticky "+" Button */
.add-button {
    text-decoration: none; /* Remove underline/dash */
    color: white;
    position: fixed; /* Fix the button to the screen */
    bottom: 30px; /* Distance from the bottom of the screen */
    left: 50%;
    transform: translateX(-50%); /* Center the button horizontally */
    background-color: #1e3a8a; /* Dark blue */
    color: white;
    font-size: 2rem;
    border-radius: 50%;
    width: 60px;
    height: 60px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    transition: background-color 0.3s ease, transform 0.3s ease;
    z-index: 1000; /* Make sure it's on top of other content */
}

.add-button:hover {
    background-color: #ff9800; /* Change color on hover */
}


        .add-button-container:hover .add-button {
            opacity: 1;
        }
    </style>

    <div class="container add-button-container">
        <h1 class="title">Liste des Livres</h1>

        <!-- Hover effect to show the "+" button below the title -->
        <div class="add-button">
            <a href="{{ route('livres.create') }}" style="color: white;">+</a>
        </div>

        <div class="row">
            <!-- Book Cards -->
            @foreach ($livres as $livre)
                <div class="book-card">
                    <img src="{{ asset('images/' . $livre->titre . '.jpg') }}" alt="{{ $livre->titre }}">
                    <div class="book-card-body">
                        <p class="title">{{ $livre->titre }}</p>
                        <p class="details"><strong>Année de publication:</strong> {{ $livre->annee_publication }}</p>
                        <p class="details"><strong>Nombre de pages:</strong> {{ $livre->nombre_pages }}</p>
                        <p class="details"><strong>Auteur:</strong> {{ $livre->auteur ? $livre->auteur->nom : 'Auteur non défini' }}</p>
                        <div class="actions">
                            <a href="{{ route('livres.edit', $livre) }}" class="btn btn-warning">Modifier</a>
                            <form action="{{ route('livres.destroy', $livre) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{ $livres->links() }}
    </div>
@endsection
