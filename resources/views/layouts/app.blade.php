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
            background: url('{{ asset('library.jpg') }}') no-repeat center center fixed;
            background-size: cover;
            color: #0d47a1; /* Dark blue for text */
            line-height: 1.6;
        }

        /* Header and Navigation */
        header {
            background-color: #1e88e5; /* Bright blue for header */
            padding: 2rem 0;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            gap: 2rem; /* Increased space between links */
        }

        nav ul li {
            position: relative;
        }

        nav ul li a {
            color: #ffffff; 
            text-decoration: none;
            font-size: 1.2rem; /* Larger font size */
            padding: 0.5rem 1rem;
            transition: all 0.3s ease;
            position: relative;
            font-weight: 500;
            letter-spacing: 0.5px;
        }

        nav ul li a::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            background-color: #90caf9; /* Light blue accent */
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            transition: width 0.3s ease, background-color 0.3s ease;
        }

        nav ul li a:hover::after {
            width: 100%;
            background-color: #64b5f6; 
        }

        nav ul li a:hover {
            color: #64b5f6; 
        }

        /* Dropdown Effect for Logout and History */
        nav ul li .dropdown-content {
            display: none;
            position: absolute;
            top: 100%;
            left: 50%;
            transform: translateX(-50%);
            background-color: #1976d2; /* Deep blue for dropdown */
            border-radius: 4px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            padding: 0.5rem;
            z-index: 1000;
            animation: slideDown 0.5s ease-in-out forwards;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateX(-50%) translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateX(-50%) translateY(0);
            }
        }

        nav ul li:hover .dropdown-content {
            display: block;
        }

        nav ul li .dropdown-content button,
        nav ul li .dropdown-content a {
            background: none;
            border: none;
            color: #ffffff;
            cursor: pointer;
            font-size: 1rem;
            padding: 0.5rem 1rem;
            transition: color 0.3s ease;
            display: block;
            width: 100%;
            text-align: left;
            text-decoration: none;
        }

        nav ul li .dropdown-content button:hover,
        nav ul li .dropdown-content a:hover {
            color: #64b5f6;
        }

        /* Content Area */
        .content {
            padding: 2rem;
            max-width: 1200px;
            margin: 0 auto;
            background-color: rgba(227, 242, 253, 0.9); /* Light blue background with slight transparency */
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

        /* Responsive Design */
        @media (max-width: 768px) {
            nav ul {
                flex-direction: column;
                align-items: center;
            }

            nav ul li {
                margin: 10px 0;
            }

            nav ul li .dropdown-content {
                left: 0;
                transform: translateX(0);
            }
        }
    </style>
</head>
<body>
    <header>
        <!-- Navigation -->
        <nav>
            <ul>
                <li><a href="{{ route('register') }}">Inscrivez-vous</a></li>
                <li><a href="{{ route('login') }}">Connectez-vous</a></li>
                <li><a href="{{ route('livres.index') }}">Nos Livres</a></li>
                <li><a href="{{ route('auteurs.index') }}">Nos Auteurs</a></li>
                @guest
                    <li><a href="{{ route('emprunts.index') }}">Nos Emprunts</a></li>
                @else
                    <li>
                        <a href="#">Mon Profil</a>
                        <div class="dropdown-content">
                            <a href="{{ route('livre-history.index') }}">Historique des Emprunts</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit">Déconnexion</button>
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </nav>
    </header>

    <div class="content">
        @yield('content')
    </div>
</body>
</html>
