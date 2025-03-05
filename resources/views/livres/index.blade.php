@extends('layouts.app')

@section('content')
    <style>
        /* General Styles */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f9f9f9;
            color: #333;
            line-height: 1.6;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 4px;
        }

        h1 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 30px;
            font-size: 2rem;
            font-weight: 600;
        }

        /* Button Styles */
        .btn {
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 500;
            transition: background-color 0.3s ease;
        }

        .btn-primary {
            background-color: #3498db;
            color: white;
        }

        .btn-primary:hover {
            background-color: #2980b9;
        }

        .btn-warning {
            background-color: #f39c12;
            color: white;
        }

        .btn-warning:hover {
            background-color: #e67e22;
        }

        .btn-danger {
            background-color: #e74c3c;
            color: white;
        }

        .btn-danger:hover {
            background-color: #c0392b;
        }

        /* Table Styles */
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .table th, .table td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }

        .table th {
            background-color: #2c3e50;
            color: white;
            font-weight: 600;
        }

        .table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .table tr:hover {
            background-color: #f1f1f1;
        }

        /* Actions Buttons */
        .actions {
            display: flex;
            gap: 10px;
        }

        /* Pagination Styles */
        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .pagination li {
            list-style: none;
            margin: 0 5px;
        }

        .pagination li a {
            padding: 8px 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            color: #3498db;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .pagination li a:hover {
            background-color: #f1f1f1;
        }

        .pagination .active a {
            background-color: #3498db;
            color: white;
            border-color: #3498db;
        }
    </style>

    <div class="container">
        <h1>Liste des livres</h1>
        <a href="{{ route('livres.create') }}" class="btn btn-primary mb-3">Ajouter un nouveau livre</a>

        <table class="table">
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Année de publication</th>
                    <th>Nombre de pages</th>
                    <th>Auteur</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($livres as $livre)
                    <tr>
                        <td>{{ $livre->titre }}</td>
                        <td>{{ $livre->annee_publication }}</td>
                        <td>{{ $livre->nombre_pages }}</td>
                        <td>{{ $livre->auteur ? $livre->auteur->nom : 'Auteur non défini' }}</td>
                        <td class="actions">
                            <a href="{{ route('livres.edit', $livre) }}" class="btn btn-warning btn-sm">Modifier</a>
                            <form action="{{ route('livres.destroy', $livre) }}" method="POST" class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $livres->links() }}
    </div>
@endsection