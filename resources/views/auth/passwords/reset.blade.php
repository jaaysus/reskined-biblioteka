@extends('layouts.app')

@section('content')
    <style>
        body {
            font-family: 'Verdana', sans-serif;
            background-color: #f4f8fd; /* Light gray background */
            color: #333;
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
            max-width: 450px;
            padding: 35px;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
            animation: fadeIn 0.6s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.95);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        .card-header {
            font-size: 1.5rem;
            font-weight: bold;
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
            padding: 14px;
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

        .invalid-feedback {
            font-size: 0.9rem;
            color: #e74c3c;
        }

    </style>

    <div class="container">
        <div class="card">
            <div class="card-header">
                {{ __('Reset Password') }}
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf

                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="form-group">
                        <label for="email">{{ __('Email Address') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                               name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password">{{ __('Password') }}</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" 
                               name="password" required autocomplete="new-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password-confirm">{{ __('Confirm Password') }}</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Reset Password') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
