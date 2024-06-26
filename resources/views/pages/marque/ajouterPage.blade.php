@extends('layaouts.app')
@section('title','ajouter marque')
@section('mar', 'active bg-gradient-primary')
@section('content')

<section class="container">
    <h1 class="mt-3 mb-3">Ajouter une marque :</h1>
    <form method="POST" action="{{ route('marque.ajouter') }}" >
        @csrf
        <div class="mb-3">
        <label for="marque" class="form-label">marque</label>
        <input autofocus autofocus placeholder="ajouter une marque" type="text" name="marque" class="form-control border border-dark w-25 p-2" id="marque" >
        @error('marque')
        <div class="text-danger">{{ $message }}</div>
        @enderror
        </div>
        <button type="submit" class="btn btn-primary">Ajouter une maruqe</button><a href="{{ route('marque.index') }}"
        class="btn btn-success ms-3"><i class="material-icons opacity-10">arrow_back</i></a>
    </form>
</section>

@endsection


