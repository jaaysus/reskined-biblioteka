<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bibliothèque</title>
    <style>
        /* General Styles */
        body {
            font-family: 'Georgia', serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5dc; /* Parchment-like background */
            color: #3e2723; /* Dark brown for text */
            line-height: 1.6;
        }

        /* Header and Navigation */
        header {
            background-color: #8b7355; /* Warm, earthy brown */
            padding: 1rem 0;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        nav ul li {
            margin: 0 15px;
        }

        nav ul li a {
            color: #fff8e1; /* Soft, creamy white */
            text-decoration: none;
            font-size: 1.1rem;
            padding: 0.5rem 1rem;
            transition: all 0.3s ease;
            position: relative;
        }

        nav ul li a::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            background-color: #fff8e1;
            bottom: 0;
            left: 0;
            transition: width 0.3s ease;
        }

        nav ul li a:hover::after {
            width: 100%;
        }

        nav ul li a:hover {
            color: #ffecb3; /* Lighter cream for hover */
        }

        /* Content Area */
        .content {
            padding: 2rem;
            max-width: 1200px;
            margin: 0 auto;
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

        /* Buttons */
        .btn {
            display: inline-block;
            padding: 0.75rem 1.5rem;
            background-color: #6d4c41; /* Muted brown */
            color: #fff8e1;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: all 0.3s ease;
            text-align: center;
        }

        .btn:hover {
            background-color: #8d6e63; /* Lighter brown */
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            nav ul {
                flex-direction: column;
                align-items: center;
            }

            nav ul li {
                margin: 10px 0;
            }
        }

        /* Book-themed Decorations */
        .content::before {
            content: '📚';
            font-size: 2rem;
            display: block;
            text-align: center;
            margin-bottom: 1rem;
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-10px);
            }
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="{{ route('emprunts.index') }}">Emprunts</a></li>
                <li><a href="{{ route('livres.index') }}">Livres</a></li>
                <li><a href="{{ route('auteurs.index') }}">Auteurs</a></li>
                @guest
                    <li><a href="{{ route('login') }}">Se connecter</a></li>
                    <li><a href="{{ route('register') }}">S'inscrire</a></li>
                @else
                    <li><a href="#">{{ Auth::user()->name }}</a></li>
                    <li>
                        <a href="{{ route('logout') }}" 
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Se déconnecter</a>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @endguest
            </ul>
        </nav>
    </header>    

    <div class="content">
        @yield('content')
    </div>
</body>
</html>