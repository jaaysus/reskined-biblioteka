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
    </style>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <!-- Name Input -->
                            <div class="row mb-4">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Email Input -->
                            <div class="row mb-4">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
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
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Confirm Password Input -->
                            <div class="row mb-4">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>
                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection