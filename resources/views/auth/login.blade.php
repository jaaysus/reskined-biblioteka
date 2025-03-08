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
            margin-bottom: 8px;
            display: block;
        }

        .form-control {
            border-radius: 8px;
            border: 1px solid #ddd;
            padding: 12px;
            font-size: 1rem;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
            background-color: #fff8e1; /* Soft cream for input background */
            color: #3e2723; /* Dark brown for text */
            width: 100%;
        }

        .form-control:focus {
            border-color: #8b7355; /* Warm, earthy brown */
            outline: none;
            box-shadow: 0 0 8px rgba(139, 115, 85, 0.3);
            background-color: #fffaf0; /* Light cream for focus */
        }

        .form-control::placeholder {
            color: #a1887f; /* Muted brown for placeholder text */
            opacity: 0.7;
        }

        .invalid-feedback {
            color: #e74c3c; /* Red for error messages */
            font-size: 0.9rem;
            margin-top: 4px;
        }

        /* Checkbox Styles */
        .form-check-input {
            border: 1px solid #8b7355; /* Warm, earthy brown */
            width: 18px;
            height: 18px;
            margin-top: 0.3rem;
            cursor: pointer;
            transition: background-color 0.3s ease, border-color 0.3s ease;
        }

        .form-check-input:checked {
            background-color: #8b7355; /* Warm, earthy brown */
            border-color: #8b7355;
        }

        .form-check-label {
            font-weight: 500;
            color: #8b7355; /* Warm, earthy brown */
            margin-left: 8px;
            cursor: pointer;
        }

        /* Button Styles */
        .btn-primary {
            background-color: #8b7355; /* Warm, earthy brown */
            border: none;
            border-radius: 8px;
            padding: 12px 30px;
            font-size: 1rem;
            font-weight: 500;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            color: #fff8e1; /* Soft cream for text */
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

        /* Input Group Animation */
        .form-group {
            position: relative;
            margin-bottom: 20px;
        }

        .form-group input {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .form-group input:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
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
                            <div class="form-group">
                                <label for="email">{{ __('Email Address') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter your email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Password Input -->
                            <div class="form-group">
                                <label for="password">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Enter your password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Remember Me Checkbox -->
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>

                            <!-- Submit Button and Forgot Password Link -->
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Se connecter') }}
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
        </div>
    </div>
@endsection