<!-- resources/views/livres/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Ajouter un nouveau livre</h1>
        <form action="{{ route('livres.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="titre">Titre</label>
                <input type="text" name="titre" id="titre" class="form-control @error('titre') is-invalid @enderror" value="{{ old('titre') }}" required>
                @error('titre')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="annee_publication">Année de publication</label>
                <input type="number" name="annee_publication" id="annee_publication" class="form-control @error('annee_publication') is-invalid @enderror" value="{{ old('annee_publication') }}" required>
                @error('annee_publication')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="nombre_pages">Nombre de pages</label>
                <input type="number" name="nombre_pages" id="nombre_pages" class="form-control @error('nombre_pages') is-invalid @enderror" value="{{ old('nombre_pages') }}" required>
                @error('nombre_pages')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="auteur_id">Auteur</label>
                <select name="auteur_id" id="auteur_id" class="form-control @error('auteur_id') is-invalid @enderror" required>
                    @foreach ($auteurs as $auteur)
                        <option value="{{ $auteur->id }}" {{ old('auteur_id') == $auteur->id ? 'selected' : '' }}>{{ $auteur->name }}</option>
                    @endforeach
                </select>
                @error('auteur_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Ajouter le livre</button>
        </form>
    </div>
@endsection
