@extends('layouts.app')

@section('content')
    <style>
        /* General Styles */
        body {
            font-family: 'Georgia', serif;
            background-color: #f0f4f8; /* Light bluish background */
            color: #3e2723; /* Dark brown for text */
            line-height: 1.6;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff; /* Clean white background */
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

        h1 {
            text-align: center;
            color: #1e3a8a; /* Bluish color for title */
            margin-bottom: 30px;
            font-size: 2.5rem;
            font-weight: 600;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
        }

        /* Reset box-sizing to ensure inputs are properly aligned */
        * {
            box-sizing: border-box;
        }

        /* Form Styles */
        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #1e3a8a; /* Bluish color for label text */
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 14px;
            background-color: #fff; /* White background for input */
            color: #3e2723; /* Dark brown for text */
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        .form-group input:focus,
        .form-group select:focus {
            border-color: #1e3a8a; /* Bluish color for focus */
            outline: none;
            box-shadow: 0 0 8px rgba(30, 58, 138, 0.3);
            background-color: #fff; /* White background on focus */
        }

        .form-group input::placeholder,
        .form-group select::placeholder {
            color: #a1887f; /* Muted brown for placeholder text */
            opacity: 0.7;
        }

        .form-group .invalid-feedback {
            color: #e74c3c; /* Red for error messages */
            font-size: 12px;
            margin-top: 5px;
        }

        .form-group .is-invalid {
            border-color: #e74c3c; /* Red for invalid inputs */
        }

        /* Button Styles */
        .btn {
            padding: 12px 30px;
            border: 1px solid #1e3a8a; /* Bluish color */
            border-radius: 8px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.3s ease;
            background-color: transparent;
            color: #1e3a8a; /* Bluish color */
        }

        .btn:hover {
            background-color: #1e3a8a; /* Bluish color */
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                padding: 15px;
            }

            h1 {
                font-size: 2rem;
            }
        }
    </style>

    <div class="container">
        <h1>Ajouter un nouveau livre</h1>

        <form action="{{ route('livres.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="titre">Titre</label>
                <input type="text" name="titre" id="titre" class="form-control @error('titre') is-invalid @enderror" value="{{ old('titre') }}" required>
                @error('titre')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="annee_publication">Année de publication</label>
                <input type="number" name="annee_publication" id="annee_publication" class="form-control @error('annee_publication') is-invalid @enderror" value="{{ old('annee_publication') }}" required>
                @error('annee_publication')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="nombre_pages">Nombre de pages</label>
                <input type="number" name="nombre_pages" id="nombre_pages" class="form-control @error('nombre_pages') is-invalid @enderror" value="{{ old('nombre_pages') }}" required>
                @error('nombre_pages')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="auteur_id">Auteur</label>
                <select name="auteur_id" id="auteur_id" class="form-control @error('auteur_id') is-invalid @enderror" required>
                    @foreach ($auteurs as $auteur)
                        <option value="{{ $auteur->id }}" {{ old('auteur_id') == $auteur->id ? 'selected' : '' }}>{{ $auteur->nom }}</option>
                    @endforeach
                </select>
                @error('auteur_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn">Ajouter le livre</button>
        </form>
    </div>
@endsection
