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
            max-width: 1200px;
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

        /* List Styles */
        .history-list {
            list-style: none;
            padding: 0;
        }

        .history-list li {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px;
            border-bottom: 1px solid #ddd;
            transition: background-color 0.3s ease;
        }

        .history-list li:hover {
            background-color: #f1f1f1;
        }

        .history-list li:last-child {
            border-bottom: none;
        }

        .history-list .details {
            flex: 1;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        /* Equal width for all spans */
        .history-list .details span {
            flex: 1; /* Equal width for all spans */
            margin-right: 20px;
            text-align: left; /* Align text to the left */
        }

        .history-list .actions {
            display: flex;
            gap: 10px;
        }

        .history-list .details span {
            flex: 1; /* Equal width for all spans */
            margin-right: 20px;
            text-align: left; /* Align text to the left */
        }


    </style>

    <div class="container">
        <h1>Book History</h1>


        <ul class="history-list">
            <li class="header">
                <div class="details">
                    <span>nom de livre</span>
                    <span>Action</span>
                    <span>Utilisateur</span>
                    <span>faire a </span>
                </div>
            </li>

            @foreach($histories as $history)
                <li>
                    <div class="details">
                        <span>{{ $history->livre->titre ?? 'N/A' }}</span>
                        <span>{{ $history->action }}</span>
                        <span>{{ $history->user ? $history->user->name : 'N/A' }}</span>
                        <span>{{ $history->created_at->format('Y-m-d H:i:s') }}</span>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@endsection