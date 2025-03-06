@extends('layouts.app')

@section('content')
    <style>
        /* General Styles */
        body {
            font-family: 'Georgia', serif;
            background-color: #f5f5dc; /* Parchment-like background */
            color: #3e2723; /* Dark brown for text */
            line-height: 1.6;
            background-image: url('https://www.transparenttextures.com/patterns/paper.png'); /* Subtle paper texture */
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .card {
            border: none;
            border-radius: 15px;
            overflow: hidden;
            background-color: #fffaf0; /* Light, creamy background */
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
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

        .card-body {
            padding: 30px;
        }

        /* Form Styles */
        .form-group label {
            font-weight: 500;
            color: #8b7355; /* Warm, earthy brown */
        }

        .form-control {
            border-radius: 8px;
            border: 1px solid #ddd;
            padding: 10px;
            font-size: 1rem;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        .form-control:focus {
            border-color: #8b7355; /* Warm, earthy brown */
            outline: none;
            box-shadow: 0 0 8px rgba(139, 115, 85, 0.3);
        }

        .invalid-feedback {
            color: #e74c3c; /* Red for error messages */
            font-size: 0.9rem;
        }

        /* Checkbox Styles */
        .form-check-input {
            border: 1px solid #ddd;
            width: 18px;
            height: 18px;
            margin-top: 0.3rem;
        }

        .form-check-label {
            font-weight: 500;
            color: #8b7355; /* Warm, earthy brown */
        }

        /* Button Styles */
        .btn-primary {
            background-color: #8b7355; /* Warm, earthy brown */
            border: none;
            border-radius: 8px;
            padding: 10px 30px;
            font-size: 1rem;
            font-weight: 500;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #6d4c41; /* Darker brown */
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }

        /* Forgot Password Link */
        .btn-link {
            color: #8b7355; /* Warm, earthy brown */
            text-decoration: none;
            font-weight: 500;
            margin-left: 15px;
            transition: color 0.3s ease;
        }

        .btn-link:hover {
            color: #6d4c41; /* Darker brown */
            text-decoration: underline;
        }
    </style>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <!-- Email Input -->
                            <div class="row mb-4">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Password Input -->
                            <div class="row mb-4">
                                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Remember Me Checkbox -->
                            <div class="row mb-4">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- Submit Button and Forgot Password Link -->
                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Se connecter') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection