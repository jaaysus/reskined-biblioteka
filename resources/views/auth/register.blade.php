@extends('layouts.app')

@section('content')
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #e7f0f8; /* Light blue for background */
            color: #333; /* Dark text color */
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .card {
            width: 100%;
            max-width: 400px;
            padding: 40px;
            background-color: #ffffff;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            animation: slideIn 0.6s ease-out;
        }

        @keyframes slideIn {
            from {
                transform: translateY(50px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .card-header {
            font-size: 1.5rem;
            font-weight: 700;
            text-align: center;
            margin-bottom: 20px;
            color: #2C3E50;
        }

        .form-group label {
            font-weight: 600;
            color: #34495E;
            margin-bottom: 8px;
            display: block;
        }

        .form-control {
            padding: 15px;
            font-size: 1rem;
            border-radius: 10px;
            border: 1px solid #d1d8e3;
            width: 100%;
            margin-bottom: 20px;
            background-color: #f4f7fb;
            color: #2C3E50;
        }

        .form-control:focus {
            border-color: #2980B9;
            outline: none;
            box-shadow: 0 0 8px rgba(41, 128, 185, 0.3);
        }

        .form-check-label {
            font-weight: 500;
            color: #34495E;
            cursor: pointer;
        }

        .form-check-input {
            margin-top: 2px;
        }

        .btn-primary {
            background-color: #2980B9;
            color: white;
            padding: 14px 28px;
            font-size: 1rem;
            font-weight: bold;
            border-radius: 25px;
            border: none;
            width: 100%;
            transition: 0.3s;
        }

        .btn-primary:hover {
            background-color: #3498db;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(41, 128, 185, 0.2);
        }

        .btn-link {
            color: #2980B9;
            font-weight: 500;
            margin-left: 0;
            text-decoration: none;
            text-align: center;
            display: block;
            margin-top: 15px;
            transition: 0.3s;
        }

        .btn-link:hover {
            color: #3498db;
            text-decoration: underline;
        }
    </style>

    <div class="container">
        <div class="card">
            <div class="card-header">
                {{ __('S\'inscrire') }}
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="form-group">
                        <label for="name">{{ __('Nom') }}</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" 
                               name="name" value="{{ old('name') }}" required autocomplete="name" autofocus 
                               placeholder="Entrez votre nom">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">{{ __('Adresse e-mail') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                               name="email" value="{{ old('email') }}" required autocomplete="email" 
                               placeholder="Entrez votre e-mail">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password">{{ __('Mot de passe') }}</label>
                        <input id="password" type="password" 
                               class="form-control @error('password') is-invalid @enderror" name="password" 
                               required autocomplete="new-password" placeholder="Entrez votre mot de passe">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password-confirm">{{ __('Confirmer le mot de passe') }}</label>
                        <input id="password-confirm" type="password" class="form-control" 
                               name="password_confirmation" required autocomplete="new-password" 
                               placeholder="Confirmer votre mot de passe">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            {{ __('S\'inscrire') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
