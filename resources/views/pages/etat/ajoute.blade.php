@extends('layaouts.app')
@section('title', 'ajouter etat')
@section('etat', 'active bg-gradient-primary')
@section('content')

    <section class="container">
        <h1 class="mt-3 mb-3">Ajouter une etat :</h1>
        <form method="POST" action="{{ route('etat.ajouter') }}">
            @csrf
            <div class="mb-3">
                <label for="etat" class="form-label">etat</label>
                <input autofocus placeholder="ajouter une etat" type="text" name="etat" class="form-control border border-dark w-25 p-2" id="etat">
                @error('etat')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Ajouter etat</button> <a href="{{ route('etat.index') }}"
                class="btn btn-success ms-3"><i class="material-icons opacity-10">arrow_back</i></a>
        </form>
    </section>

@endsection
