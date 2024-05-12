@extends('layaouts.app')
@section('title', 'creer un utilisateurs')
@section('util', 'active bg-gradient-primary')
@section('content')


    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <div class="container-fluid py-4">



            <section class="container">
                <h1 class="mt-3 mb-3">Ajouter un utilisateur :</h1>
                <form method="POST" action="{{ route('ajoute.user') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom</label>
                        <input autofocus placeholder="ajouter un nom" type="text" name="nom" class="ps-2 form-control border border-dark w-25" id="nom">
                        @error('nom')
                            <small class="text-danger">{{ $message }} <i class="fas fa-exclamation-circle"></i></small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="prenom" class="form-label">Prénom</label>
                        <input  placeholder="ajouter un prenom" type="text" name="prenom" class="ps-2 form-control border border-dark w-25" id="prenom">
                        @error('prenom')
                            <small class="text-danger">{{ $message }} <i class="fas fa-exclamation-circle"></i></small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="cin" class="form-label">CIN</label>
                        <input placeholder="ajouter un cin" type="text" name="cin" class=" ps-2 form-control border border-dark w-25" id="cin">
                        @error('cin')
                            <small class="text-danger">{{ $message }} <i class="fas fa-exclamation-circle"></i></small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input  placeholder="ajouter un email" type="email" name="email" class=" ps-2 form-control border border-dark w-25" id="email">
                        @error('email')
                            <small class="text-danger">{{ $message }} <i class="fas fa-exclamation-circle"></i></small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="telephone" class="form-label">Telephone</label>
                        <input  placeholder="ajouter un telephone" type="tel" name="telephone" class="form-control border border-dark w-25 ps-2" id="telephone">
                        @error('telephone')
                            <small class="text-danger">{{ $message }} <i class="fas fa-exclamation-circle"></i></small>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button> <a href="{{ route('show.user') }}"
                        class="btn btn-success ms-3"><i class="material-icons opacity-10">arrow_back</i></a>
                </form>
            </section>

        </div>
    </main>
@endsection
