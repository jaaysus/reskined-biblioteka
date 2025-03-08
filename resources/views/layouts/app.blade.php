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
            background-color: #6d4c41; /* Deep, rich brown for old money vibe */
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
            position: relative;
        }

        nav ul li a {
            color: #fff8e1; /* Soft, creamy white */
            text-decoration: none;
            font-size: 1.1rem;
            padding: 0.5rem 1rem;
            transition: all 0.3s ease;
            position: relative;
            font-weight: 500;
            letter-spacing: 0.5px;
        }

        /* Hover Effect with Underline */
        nav ul li a::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            background-color: #d4af37; /* Gold accent for old money feel */
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            transition: width 0.3s ease, background-color 0.3s ease;
        }

        nav ul li a:hover::after {
            width: 100%;
            background-color: #ffecb3; /* Lighter gold on hover */
        }

        nav ul li a:hover {
            color: #ffecb3; /* Lighter cream for hover */
        }

        /* Dropdown Effect for Logout */
        nav ul li form {
            display: none;
            position: absolute;
            top: 100%;
            left: 50%;
            transform: translateX(-50%);
            background-color: #8b7355; /* Warm brown for dropdown */
            border-radius: 4px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            padding: 0.5rem;
            z-index: 1000;
        }

        nav ul li:hover form {
            display: block;
        }

        nav ul li form button {
            background: none;
            border: none;
            color: #fff8e1;
            cursor: pointer;
            font-size: 1rem;
            padding: 0.5rem 1rem;
            transition: color 0.3s ease;
        }

        nav ul li form button:hover {
            color: #ffecb3;
        }

    /* User Welcome Section */
    .user-welcome {
        text-align: center;
        padding: 1.5rem 0;
        background-color: #fffaf0; /* Light, creamy background */
        border-bottom: 1px solid #8b7355; /* Warm, earthy brown border */
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        position: relative;
        overflow: hidden;
    }

    .user-welcome::before {
        content: '';
        position: absolute;
        top: 0;
        left: -50%;
        width: 200%;
        height: 100%;
        background: linear-gradient(90deg, rgba(139, 115, 85, 0.1) 25%, transparent 50%, rgba(139, 115, 85, 0.1) 75%);
        animation: shimmer 3s infinite linear;
    }

    @keyframes shimmer {
        0% {
            transform: translateX(-50%);
        }
        100% {
            transform: translateX(50%);
        }
    }

    .user-welcome h2 {
        margin: 0;
        font-size: 1.75rem;
        color: #3e2723; /* Dark brown for text */
        font-weight: 600;
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
        animation: fadeInDown 1s ease-in-out;
    }

    .user-welcome p {
        margin: 0.5rem 0 0;
        font-size: 1.25rem;
        color: #6d4c41; /* Muted brown */
        font-style: italic;
        animation: fadeInUp 1s ease-in-out;
    }

    /* Animations */
    @keyframes fadeInDown {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
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

        /* Responsive Design */
        @media (max-width: 768px) {
            nav ul {
                flex-direction: column;
                align-items: center;
            }

            nav ul li {
                margin: 10px 0;
            }

            nav ul li form {
                left: 0;
                transform: translateX(0);
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
                    <li>
                        <a href="#">Mon Compte</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit">Se déconnecter</button>
                        </form>
                    </li>
                @endguest
            </ul>
        </nav>
    </header>    

    @auth
        <div class="user-welcome">
            <h2>Bienvenue, {{ Auth::user()->name }}!</h2>
            <p>Nous sommes ravis de vous revoir.</p>
        </div>
    @endauth

    <div class="content">
        @yield('content')
    </div>
</body>
</html>