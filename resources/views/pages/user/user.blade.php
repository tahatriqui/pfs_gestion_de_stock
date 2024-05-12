@extends('layaouts.app')
@section('title','creer un utilisateurs')
@section('util','active bg-gradient-primary')
@section('content')


<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <div class="container-fluid py-4">
        <a href="{{ route('show.user') }}" class="btn btn-success">retour a la page des utilisateur</a>


        <section class="container">
            <h1 class="mt-3 mb-3">Ajouter un utilisateur :</h1>
            <form method="POST" action="{{ route('ajoute.user') }}">
                @csrf

                <div class="mb-3">
                    <label for="nom" class="form-label">Nom</label>
                    <input type="text" name="nom" class="form-control border border-dark w-25" id="nom">
                    @error('nom')
                    <small class="text-danger">{{ $message }} <i class="fas fa-exclamation-circle"></i></small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="prenom" class="form-label">Prénom</label>
                    <input type="text" name="prenom" class="form-control border border-dark w-25" id="prenom">
                    @error('prenom')
                    <small class="text-danger">{{ $message }} <i class="fas fa-exclamation-circle"></i></small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="cin" class="form-label">CIN</label>
                    <input type="text" name="cin" class="form-control border border-dark w-25" id="cin">
                    @error('cin')
                    <small class="text-danger">{{ $message }} <i class="fas fa-exclamation-circle"></i></small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control border border-dark w-25" id="email">
                    @error('email')
                    <small class="text-danger">{{ $message }} <i class="fas fa-exclamation-circle"></i></small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="telephone" class="form-label">Telephone</label>
                    <input type="tel" name="telephone" class="form-control border border-dark w-25" id="telephone">
                    @error('telephone')
                    <small class="text-danger">{{ $message }} <i class="fas fa-exclamation-circle"></i></small>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </section>

    </div>
</main>
@endsection
