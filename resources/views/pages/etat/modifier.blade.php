@extends('layaouts.app')
@section('title', "modifier l'etat")
@section('etat', 'active bg-gradient-primary')
@section('content')
    <section class="container">
        <h1 class="mt-3 mb-3">modifier une etat :</h1>
        <form method="POST" action="{{ route('etat.edit', $etats->id) }}">
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label for="etat" class="form-label">Etat</label>
                <input value="{{ $etats->etats }}" type="text" name="etat"
                    class="form-control border border-dark w-25 p-2" id="etat">
                @error('etat')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">modifier</button><a href="{{ route('etat.index') }}"
                class="btn btn-success ms-3"><i class="material-icons opacity-10">arrow_back</i></a>
        </form>
    </section>
@endsection
