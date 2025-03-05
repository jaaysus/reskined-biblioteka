<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bibliothèque</title>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="{{ route('emprunts.index') }}">Emprunts</a></li>
                <li><a href="{{ route('livres.index') }}">Livres</a></li>
                <!-- Add more links as needed -->
            </ul>
        </nav>
    </header>

    <div class="content">
        @yield('content')
    </div>
</body>
</html>
