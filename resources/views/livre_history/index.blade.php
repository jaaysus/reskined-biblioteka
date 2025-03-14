@extends('layouts.app')

@section('content')
    <style>
        /* General Styles */
        body {
            font-family: 'Georgia', serif;
            background-color: #e3f2fd; /* Light blue background */
            color: #0d47a1; /* Dark blue for text */
            line-height: 1.6;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff; /* White background for the content */
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
            color: #1e88e5; /* Bright blue for header */
            margin-bottom: 30px;
            font-size: 2.5rem;
            font-weight: 600;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
        }

        /* Timeline Styles */
        .timeline {
            list-style: none;
            padding: 0;
            position: relative;
            margin-left: 20px;
        }

        .timeline::before {
            content: '';
            position: absolute;
            left: 20px;
            top: 0;
            bottom: 0;
            width: 2px;
            background-color: #1e88e5; /* Blue timeline line */
        }

        .timeline-item {
            position: relative;
            margin-bottom: 30px;
            padding-left: 60px;
        }

        .timeline-item::before {
            content: '';
            position: absolute;
            left: 10px;
            top: 0;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background-color: #1e88e5; /* Circle color */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .timeline-item .content {
            background-color: #e3f2fd; /* Light blue content background */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .timeline-item .content span {
            display: block;
            margin-bottom: 10px;
        }

        .timeline-item .content .timestamp {
            font-size: 0.9rem;
            color: #1565c0; /* Muted dark blue for timestamp */
        }
    </style>

    <div class="container">
        <h1>Book History</h1>

        <ul class="timeline">
            @foreach($histories as $history)
                <li class="timeline-item">
                    <div class="content">
                        <span><strong>Nom de livre:</strong> {{ $history->livre->titre ?? 'N/A' }}</span>
                        <span><strong>Action:</strong> {{ $history->action }}</span>
                        <span><strong>Utilisateur:</strong> {{ $history->user ? $history->user->name : 'N/A' }}</span>
                        <span class="timestamp"><strong>Faire à:</strong> {{ $history->created_at->format('Y-m-d H:i:s') }}</span>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
