<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bibliothèque</title>
    <style>
        /* General Styles */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            color: #333;
        }

        /* Header and Navigation */
        header {
            background-color: #2c3e50;
            padding: 1rem 0;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
        }

        nav ul li {
            margin: 0 15px;
        }

        nav ul li a {
            color: #ecf0f1;
            text-decoration: none;
            font-size: 1.1rem;
            padding: 0.5rem 1rem;
            transition: background-color 0.3s ease;
        }

        nav ul li a:hover {
            background-color: #34495e;
            border-radius: 4px;
        }

        /* Content Area */
        .content {
            padding: 2rem;
            max-width: 1200px;
            margin: 0 auto;
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
    </style>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="{{ route('emprunts.index') }}">Emprunts</a></li>
                <li><a href="{{ route('livres.index') }}">Livres</a></li>
                <li><a href="{{ route('auteurs.index') }}">Auteurs</a></li>
            </ul>
        </nav>
    </header>

    <div class="content">
        @yield('content')
    </div>
</body>
</html>