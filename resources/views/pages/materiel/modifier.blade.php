@extends('layaouts.app')
@section('title', 'modifier un materiel')
@section('mat', 'active bg-gradient-primary')
@section('content')


    <section class="container">
        <h1 class="mt-3 mb-3">Modifier un materiel :</h1>
        <form method="POST" action=" {{ route('materiel.modifier', $materiel->id) }}">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="marque" class="form-label">Marque</label>
                <br>
                <select class="form-select border-dark w-15 ps-2" name="marque">
                    <option disabled> choisit une etat</option>
                    @forelse ($marques as $marque)
                        @if ($marque->id == $materiel->id)
                            <option selected value="{{ $marque->id }}">{{ $marque->marque }}</option>
                        @else
                            <option value="{{ $marque->id }}">{{ $marque->marque }}</option>
                        @endif
                    @empty
                    @endforelse
                </select>
                @error('marque')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>


            <div class="mb-3">
                <label for="ref" class="form-label">reference</label>
                <input value="{{ $materiel->ref }}" type="text" name="ref"
                    class="form-control border border-dark w-25 p-2" id="ref">
                @error('ref')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="configue" class="form-label">configue</label>
                <input value='{{ $materiel->configue }}' type="text" name="configue"
                    class="form-control border border-dark w-25 p-2" id="configue">
                @error('code_barre')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>


            <div class="mb-3">
                <label for="configue" class="form-label">quantité</label>
                <input value='{{ $materiel->quant }}' type="text" name="quant"
                    class="form-control border border-dark w-25 p-2" id="quant">
                @error('quant')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="date" class="form-label">ajouter la date</label>
                <input value="{{ $materiel->la_date->format('Y-m-d') }}" type="date" name="date"
                    class="form-control border border-dark w-25 p-2" id="date">
                @error('date')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <select class="form-select border-dark w-15 ps-2 me-3 mb-2 d-inline" name="etat">
                    <option disabled> choisit une etat</option>
                    @forelse ($etats as $etat)
                        @if ($etat->id == $materiel->etats_id)
                            <option selected value="{{ $etat->id }}">{{ $etat->etats }}</option>
                        @else
                            <option value="{{ $etat->id }}">{{ $etat->etats }}</option>
                        @endif
                    @empty
                    @endforelse
                </select>
                @error('etat')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <select class="form-select border-dark w-15 ps-2 d-inline mb-2" name="categorie">
                    <option selected disabled> choisit une categorie</option>
                    @forelse ($categories as $categorie)
                        @if ($categorie->id == $materiel->categories_id)
                            <option selected value="{{ $categorie->id }}">{{ $categorie->categorie }}</option>
                        @else
                            <option value="{{ $categorie->id }}">{{ $categorie->categorie }}</option>
                        @endif
                    @empty
                    @endforelse
                </select>
                @error('categorie')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="  w-10 btn btn-primary">Modifier</button> <a href="{{ route('materiel.index') }}"
                class="btn btn-success ms-3"><i class="material-icons opacity-10">arrow_back</i></a></button>
        </form>
    </section>
    <script>
        // Declare division_id outside of the functions
        let division_id;

        const divisionSelect = document.querySelector('.division');


        // Add event listener to division select
        divisionSelect.addEventListener('click', handleDivision);

        function handleDivision(event) {
            division_id = event.target.value; // Assign the selected division ID to division_id
            filterServices(); // Call the function to filter services
        }

        function filterServices() {
            const selectedDivisionId = division_id;
            const serviceOptions = document.querySelectorAll('select[name="service"] option');

            serviceOptions.forEach(option => {
                if (option.getAttribute('name') === selectedDivisionId) {
                    option.style.display = 'block'; // Show the option
                } else {
                    option.style.display = 'none'; // Hide the option
                }
            });
        }
    </script>
@endsection
