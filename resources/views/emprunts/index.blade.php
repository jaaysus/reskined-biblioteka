@extends('layouts.app')

@section('content')
    <style>
        /* General Styles (Same as inspiration page) */
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

        /* Button Styles (Same as inspiration page) */
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

        /* List Styles (Same as inspiration page) */
        .emprunts-list {
            list-style: none;
            padding: 0;
        }

        .emprunts-list li {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px;
            border-bottom: 1px solid #ddd;
            transition: background-color 0.3s ease;
        }

        .emprunts-list li:hover {
            background-color: #f1f1f1;
        }

        .emprunts-list li:last-child {
            border-bottom: none;
        }

        .emprunts-list .details {
            flex: 1;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        /* Equal width for all spans */
        .emprunts-list .details span {
            flex: 1; /* Equal width for all spans */
            margin-right: 20px;
            text-align: left; /* Align text to the left */
        }

        .emprunts-list .actions {
            display: flex;
            gap: 10px;
        }

    /* Search Form Styles */
    .search-form {
        display: flex;
        justify-content: space-between;
        margin-bottom: 20px;
        gap: 15px;
        background-color: #fffaf0; /* Light, creamy background to match the container */
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); /* Softer shadow to match the theme */
        border: 1px solid #e0d6c1; /* Subtle border for definition */
    }

    .form-group {
        flex: 1;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        color: #8b7355; /* Warm, earthy brown for labels */
        font-weight: 500;
        font-size: 14px;
    }

    .form-control {
        width: 100%;
        padding: 10px;
        border: 1px solid #e0d6c1; /* Subtle border */
        border-radius: 4px;
        font-size: 14px;
        background-color: #fff; /* White background for inputs */
        color: #3e2723; /* Dark brown for text */
        transition: all 0.3s ease;
    }

    .form-control:focus {
        border-color: #8b7355; /* Warm, earthy brown for focus */
        outline: none;
        box-shadow: 0 0 8px rgba(139, 115, 85, 0.2); /* Soft glow effect */
    }

    /* Button inside the search form */
    .search-form .btn {
        align-self: flex-end; /* Align button to the bottom */
        padding: 10px 20px;
        border: 1px solid #8b7355; /* Warm, earthy brown */
        border-radius: 4px;
        background-color: transparent;
        color: #8b7355; /* Warm, earthy brown */
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .search-form .btn:hover {
        background-color: #8b7355; /* Warm, earthy brown */
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .search-form {
            flex-direction: column;
            gap: 10px;
        }

        .search-form .btn {
            width: 100%;
            margin-top: 10px;
        }
    }


    </style>

    <div class="container">
        <h1 class="title">Liste des Emprunts</h1>

       <!-- Search Form -->
    <form method="GET" action="{{ route('emprunts.index') }}" class="search-form">
        <div class="form-group">
            <label for="start_date">Date de début</label>
            <input type="date" name="start_date" id="start_date" value="{{ request('start_date') }}" class="form-control">
        </div>
        <div class="form-group">
            <label for="end_date">Date de fin</label>
            <input type="date" name="end_date" id="end_date" value="{{ request('end_date') }}" class="form-control">
        </div>
        <button type="submit" class="btn">Filtrer</button>
    </form>

        <!-- Add Button -->
        <div class="add-button-container">
            <a href="{{ route('emprunts.create') }}" class="btn add-button">Ajouter un emprunt</a>
        </div>

        <!-- List of Emprunts -->
        <ul class="emprunts-list">
            <!-- Header Row -->
            <li>
                <div class="details">
                    <span><strong>Livre</strong></span>
                    <span><strong>Auteur</strong></span>
                    <span><strong>Date d'emprunt</strong></span>
                    <span><strong>Date de retour</strong></span>
                    <span><strong>Actions</strong></span>
                </div>
            </li>

            <!-- Emprunt Rows -->
            @foreach($emprunts as $emprunt)
                <li>
                    <div class="details">
                        <span>{{ $emprunt->livre ? $emprunt->livre->titre : 'Livre non trouvé' }}</span>
                        <span>{{ $emprunt->livre && $emprunt->livre->auteur ? $emprunt->livre->auteur->nom . ' ' . $emprunt->livre->auteur->prenom : 'Auteur non trouvé' }}</span>
                        <span>{{ $emprunt->date_emprunt }}</span>
                        <span>{{ $emprunt->date_retour ? $emprunt->date_retour : 'Non retourné' }}</span>
                    </div>
                    <div class="actions">
                        <a href="{{ route('emprunts.edit', $emprunt->id) }}" class="btn btn-warning">Modifier</a>
                        <form action="{{ route('emprunts.destroy', $emprunt->id) }}" method="POST" style="display:inline;">
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