@extends('layaouts.app')
@section('title','modifier division')
@section('content')

<section class="container">
    <h1 class="mt-3 mb-3">Modifier une division :</h1>
    <form method="POST" action="{{ route('division.edit',$division->id) }}">
        @method('PUT')
        @csrf
        <div class="mb-3">
        <label for="division" class="form-label">Division</label>
        <input value="{{ $division->name }}"  type="text" name="division" class="form-control border border-dark w-25 p-2" id="division " >
        @error('division')
        <div class="text-danger">{{ $message }}</div>
        @enderror
        </div>
        <button type="submit" class="btn btn-primary">Modifier division</button>
    </form>
</section>


@endsection
