@extends('layouts.app')

@section('content')
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f4f8; /* Soft gray-blue */
            color: #444;
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
            padding: 40px;
            background-color: #ffffff;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            animation: fadeIn 0.5s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.9);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        .card-header {
            font-size: 1.75rem;
            font-weight: 600;
            text-align: center;
            color: #2980B9;
            margin-bottom: 30px;
        }

        .form-group label {
            font-weight: 500;
            color: #2C3E50;
            margin-bottom: 8px;
            display: block;
        }

        .form-control {
            padding: 14px;
            font-size: 1rem;
            border-radius: 10px;
            border: 1px solid #d1d8e3;
            width: 100%;
            margin-bottom: 18px;
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

        .btn-link {
            color: #2980B9;
            font-weight: 500;
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
                {{ __('Confirm Password') }}
            </div>
            <div class="card-body">
                {{ __('Please confirm your password before continuing.') }}

                <form method="POST" action="{{ route('password.confirm') }}">
                    @csrf

                    <div class="form-group">
                        <label for="password">{{ __('Password') }}</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Enter your password">
                        
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Confirm Password') }}
                        </button>

                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
