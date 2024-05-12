@extends('layaouts.app')
@section('title', 'modifier category')
@section('cat', 'active bg-gradient-primary')
@section('content')


    <section class="row">
        <h1>Modifier une categorie :</h1>
        <form method="POST" action="{{ route('categorie.edit', $categorie->id) }}">
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label for="categorie" class="form-label">categorie</label>
                <input autofocus  value="{{ $categorie->categorie }}" type="text" name="categorie"
                    class="form-control border border-dark w-25 p-2" id="categorie ">
                @error('categorie')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Ajouter categorie</button> <a
                href="{{ route('categorie.index') }}" class="btn btn-success ms-3"><i
                    class="material-icons opacity-10">arrow_back</i></a>
        </form>
    </section>

@endsection
