@extends('layaouts.app')
@section('title','modifier un utilisateurs')
@section('util','active bg-gradient-primary')
@section('content')

<section class="container">
<h1 class="mt-3 mb-3">Modifier l'utilisateur :</h1>
<form method="POST" action="{{route('user.edit',$user->id)}}">
    @method('PUT')
    @csrf
    <div class="mb-3">
      <label for="nom" class="form-label">nom</label>
      <input type="text"  value="{{ $user->nom }}" name="nom" class="form-control border border-dark w-25 ps-2" id="nom" >
    </div>

    <div class="mb-3">
        <label for="prenom" class="form-label">prenom</label>
        <input type="text" value="{{ $user->prenom }}" name="prenom" class="form-control border border-dark w-25 ps-2 " id="prenom" >
      </div>

      <div class="mb-3">
        <label for="cin" class="form-label">CIN</label>
        <input type="cin" value="{{ $user->cin }}" name="cin" class="form-control border border-dark w-25 ps-2" id="cin" >
      </div>

      <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" value="{{ $user->email }}" name="email" class="form-control border border-dark w-25 ps-2" id="email" >
      </div>

      <div class="mb-3">
        <label for="email" class="form-label"> telephone </label>
        <input type="tel" name="telephone" value="{{ $user->telephone }}" class="form-control border border-dark w-25 ps-2" id="email" >
      </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

</section>

@endsection
