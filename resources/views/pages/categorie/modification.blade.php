@extends('layaouts.app')
@section('title','modifier category')
@section('cat', 'active bg-gradient-primary')
@section('content')


<section class="row">
    <h1 >Modifier une categorie :</h1>
    <form method="POST" action="{{ route('categorie.edit',$categorie->id) }}" >
        @method('PUT')
        @csrf
        <div class="mb-3">
        <label for="categorie" class="form-label">categorie</label>
        <input value="{{ $categorie->categorie }}"  type="text" name="categorie" class="form-control border border-dark w-25 p-2" id="categorie " >
        @error('categorie')
        <div class="text-danger">{{ $message }}</div>
        @enderror
        </div>
        <button type="submit" class="btn btn-primary">Modifier categorie</button>
    </form>
</section>

@endsection


