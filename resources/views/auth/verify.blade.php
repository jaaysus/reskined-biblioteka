@extends('layouts.app')

@section('content')
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #eef2f7; /* Light background color */
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

        .card-body {
            font-size: 1rem;
            color: #34495E;
            line-height: 1.6;
        }

        .alert-success {
            background-color: #28a745;
            color: white;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
            font-weight: 600;
        }

        .btn-link {
            color: #2980B9;
            font-weight: 500;
            text-decoration: none;
            transition: 0.3s;
        }

        .btn-link:hover {
            color: #3498db;
            text-decoration: underline;
        }

        .form-group {
            margin-top: 15px;
        }
    </style>

    <div class="container">
        <div class="card">
            <div class="card-header">
                {{ __('Verify Your Email Address') }}
            </div>

            <div class="card-body">
                @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        {{ __('A fresh verification link has been sent to your email address.') }}
                    </div>
                @endif

                <p>{{ __('Before proceeding, please check your email for a verification link.') }}</p>
                <p>{{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
                </p>
            </div>
        </div>
    </div>
@endsection
