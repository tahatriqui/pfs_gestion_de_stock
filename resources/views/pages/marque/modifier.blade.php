@extends('layaouts.app')
@section('title',"modifier la marque")
@section('mar', 'active bg-gradient-primary')
@section('content')

        <section class="container">
            <h1 class="mt-3 mb-3">modifier une marque :</h1>
            <form method="POST" action="{{ route('marque.edit',$marque->id) }}">
                @method('PUT')
                @csrf
                <div class="mb-3">
                <label for="marque" class="form-label">Etat</label>
                <input value="{{$marque->marque}}" type="text" name="marque" class="form-control border border-dark w-25 p-2" id="marque" >
                @error('marque')
                <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
                <button type="submit" class="btn btn-primary">modifier</button>
            </form>
        </section>

@endsection
