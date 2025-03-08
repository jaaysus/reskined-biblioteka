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
        max-width: 800px;
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

    h1 {
        text-align: center;
        color: #8b7355; /* Warm, earthy brown */
        margin-bottom: 30px;
        font-size: 2.5rem;
        font-weight: 600;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
    }

    /* Form Styles */
    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: 500;
        color: #8b7355; /* Warm, earthy brown */
    }

    .form-group input,
    .form-group select {
        width: 100%;
        padding: 12px;
        border: 1px solid #ddd;
        border-radius: 8px;
        font-size: 14px;
        background-color: #fff8e1; /* Soft cream for input background */
        color: #3e2723; /* Dark brown for text */
        transition: border-color 0.3s ease, box-shadow 0.3s ease;
    }

    .form-group input:focus,
    .form-group select:focus {
        border-color: #8b7355; /* Warm, earthy brown */
        outline: none;
        box-shadow: 0 0 8px rgba(139, 115, 85, 0.3);
        background-color: #fffaf0; /* Light cream for focus */
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
        border: 1px solid #8b7355; /* Warm, earthy brown */
        border-radius: 8px;
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

    .btn-warning {
        border-color: #f39c12; /* Orange */
        color: #f39c12; /* Orange */
    }

    .btn-warning:hover {
        background-color: #f39c12; /* Orange */
        color: white;
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
        <h1 class="title">Modifier l'Auteur</h1>

        <form action="{{ route('auteurs.update', $auteur) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" name="nom" id="nom" class="form-control" value="{{ $auteur->nom }}" required>
            </div>

            <div class="form-group">
                <label for="prenom">Prénom</label>
                <input type="text" name="prenom" id="prenom" class="form-control" value="{{ $auteur->prenom }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Mettre à jour</button>
        </form>
    </div>
@endsection