@extends('layaouts.app')
@section('title','ajouter un service')
@section('ser', 'active bg-gradient-primary')
@section('content')


<section class="container">
<h1 class="mt-3 mb-3">Ajouter un service :</h1>
<form method="POST" action="{{ route('services.ajouter') }}">
    @csrf
    <div class="mb-3">
      <label for="service" class="form-label">Service</label>
      <input autofocus placeholder="ajouter un service" type="text" name="service" class="form-control border border-dark w-25 p-2" id="service" >
      @error("service")
            <small class="text-danger">{{ $message }} <i  class="fa-solid fa-circle-exclamation"></i></small>
      @enderror
    </div>

    <div class="mb-3">
        <label for="bureau" class="form-label">bureau</label>
        <input placeholder="ajouter un bureau" type="text" name="bureau" class="form-control border border-dark w-25 p-2" id="bureau" >
            @error("bureau")
            <small class="text-danger">{{ $message }} <i  class="fa-solid fa-circle-exclamation"></i></small>
            @enderror
      </div>

      <div class="mb-3 form-group">
        <select name="div" class="form-select border-dark w-15 ps-2">
            <option selected disabled >Select une devision</option>
           @forelse ($divisions as $division )
            <option value="{{ $division->id }}">{{ $division->name}}</option>
           @empty
           <option>Ajouter une devision</option>
           @endforelse
        </select>
            @error("div")
            <small class="text-danger d-block">{{ $message }} <i  class="fa-solid fa-circle-exclamation"></i></small>
            @enderror
      </div>
    <button type="submit" class="btn btn-primary">Ajouter</button><a
    href="{{ route('services.index') }}" class="btn btn-success ms-3"><i
        class="material-icons opacity-10">arrow_back</i></a>
  </form>

</section>

@endsection
