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

        /* Search Form Styles */
        .search-form {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
            gap: 10px;
            background-color: #fff8e1; /* Soft, creamy white */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            flex: 1;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
            background-color: #fff;
            transition: border-color 0.3s ease;
        }

        .form-control:focus {
            border-color: #8b7355; /* Warm, earthy brown */
            outline: none;
        }

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

        /* Add Button Styles */
        .add-button {
            margin-bottom: 20px;
            background-color: #6d4c41; /* Muted brown */
            color: white;
        }

        .add-button:hover {
            background-color: #8b7355; /* Lighter brown */
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        /* Table Styles */
        .emprunts-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        .emprunts-table th, .emprunts-table td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }

        .emprunts-table th {
            background-color: #8b7355; /* Warm, earthy brown */
            color: white;
            font-weight: 600;
        }

        .emprunts-table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .emprunts-table tr:hover {
            background-color: #f1f1f1;
            transition: background-color 0.3s ease;
        }

        /* Action Buttons Styles */
        .actions {
            display: flex;
            gap: 10px;
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

        /* Responsive Design */
        @media (max-width: 768px) {
            .search-form {
                flex-direction: column;
            gap: 10px;
            padding: 15px;
            background-color: #fff8e1; /* Soft, creamy white */
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .form-group {
            width: 100%;
        }

        .btn {
            width: 100%;
            margin-top: 10px;
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
            <button type="submit" class="btn btn-primary">Filtrer</button>
        </form>

        <a href="{{ route('emprunts.create') }}" class="btn btn-success add-button">Ajouter un emprunt</a>

        <table class="emprunts-table">
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
                        <td>{{ $emprunt->livre && $emprunt->livre->auteur ? $emprunt->livre->auteur->nom . ' ' . $emprunt->livre->auteur->prenom : 'Auteur non trouvé' }}</td>
                        <td>{{ $emprunt->date_emprunt }}</td>
                        <td>{{ $emprunt->date_retour ? $emprunt->date_retour : 'Non retourné' }}</td>
                        <td class="actions">
                            <a href="{{ route('emprunts.edit', $emprunt->id) }}" class="btn btn-warning">Modifier</a>
                            <form action="{{ route('emprunts.destroy', $emprunt->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection