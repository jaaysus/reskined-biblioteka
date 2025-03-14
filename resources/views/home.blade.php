@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Tableau de bord') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>Bonjour, {{ Auth::user()->name }} ! Vous êtes maintenant connecté avec succès et prêt à <a href="{{ route('livres.index') }}" class="btn-link">explorer les livres</a>.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
