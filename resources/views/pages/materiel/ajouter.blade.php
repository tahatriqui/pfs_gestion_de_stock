@extends('layaouts.app')
@section('mat', 'active bg-gradient-primary')
@section('title', 'ajouter un materiel')
@section('content')


    <section class="container">
        <h1 class="mt-3 mb-3">Ajouter un materiel :</h1>
        <form method="POST" action="{{ route('materiel.ajouter') }}">
            @csrf
            <div class="mb-3">
                <label for="marque" class="form-label">Marque</label>
                <br>
                <select class="form-select border-dark w-15 ps-2" name="marque">
                    <option selected disabled> choisit une marque</option>
                    @forelse ($marques as $marque)
                        <option value="{{ $marque->id }}">{{ $marque->marque }}</option>
                    @empty
                    @endforelse
                </select>
                @error('marque')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="ref" class="form-label">reference</label>
                <input autofocus placeholder="ajouter une reference" value="{{ old('ref') }}" type="text" name="ref"
                    class="form-control border border-dark w-25 p-2" id="ref">
                @error('ref')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            {{--  la quantité  --}}
            <div class="mb-3">
                <label for="quant" class="form-label">quantité</label>
                <input  placeholder="ajouter une quantité" value="{{ old('quant') }}" type="number" name="quant"
                    class="form-control border border-dark w-25 p-2" id="quant">
                @error('quant')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>



            <div class="mb-3">
                <label for="configue" class="form-label">configue</label>
                <input placeholder="ajouter une configue" value="{{ old('configue') }}" type="text" name="configue"
                    class="form-control border border-dark w-25 p-2" id="configue">
                @error('code_barre')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="date" class="form-label"> la date</label>
                <input placeholder="ajouter la date" type="date" name="date" class="form-control border border-dark w-25 p-2" id="date">
                @error('date')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-2">
                <select class="form-select border-dark w-15 ps-2 me-3 mb-2 d-inline" name="etat">
                    <option selected disabled> choisit une etat</option>
                    @forelse ($etats as $etat)
                        <option value="{{ $etat->id }}">{{ $etat->etats }}</option>
                    @empty
                    @endforelse
                </select>
                @error('etat')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-2">
                <select class="form-select border-dark w-15 ps-2 d-inline mb-2" name="categorie">
                    <option selected disabled> choisit une categorie</option>
                    @forelse ($categories as $categorie)
                        <option value="{{ $categorie->id }}">{{ $categorie->categorie }}</option>
                    @empty
                    @endforelse
                </select>
                @error('division')
                    <div class="text-danger">{{ $message }}</div>
                @enderror

            </div>
            <button type="submit" class="  w-10 btn btn-primary">Ajouter</button>
                    <a href="{{ route('materiel.index') }}"
                    class="btn btn-success ms-3"><i class="material-icons opacity-10">arrow_back</i>
            </a>
        </form>
    </section>

@endsection
