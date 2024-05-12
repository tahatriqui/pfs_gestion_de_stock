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
            <div class="mb-3">
                <label for="services_tag" class="form-label">services tag</label>
                <input placeholder="ajouter une services tag" value="{{ old('services_tag') }}" type="text" name="services_tag"
                    class="form-control border border-dark w-25 p-2" id="services_tag">
                @error('services_tag')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="code_barre" class="form-label">code barre</label>
                <input placeholder="ajouter un code barre" value="{{ old('code_barre') }}" type="text" name="code_barre"
                    class="form-control border border-dark w-25 p-2" id="code_barre">
                @error('code_barre')
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

            <div class="mb-3">
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


                <select class="division form-select border-dark w-15 ps-2 d-inline" name="division">
                    <option selected disabled> choisit une division</option>
                    @forelse ($divisions as $division)
                        <option value="{{ $division->id }}">{{ $division->name }}</option>
                    @empty
                    @endforelse
                </select>
                @error('division')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <br>
                <select class="form-select border-dark w-15 me-3 ps-2 d-inline" name="service">
                    <option selected disabled> choisit un service</option>
                    @forelse ($services as $service)
                        <option name={{ $service->divisions_id }} value="{{ $service->id }}">{{ $service->services }}
                        </option>
                    @empty
                    @endforelse
                </select>
                @error('service')
                    <div class="text-danger">{{ $message }}</div>
                @enderror

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
                <br>
                <select class="form-select border-dark w-15 ps-2" name="user">
                    <option selected disabled> choisit un utilisateur</option>
                    @forelse ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->prenom . ' ' . $user->nom }}</option>
                    @empty
                    @endforelse
                </select>
                @error('user')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="  w-10 btn btn-primary">Ajouter</button> <a href="{{ route('materiel.index') }}"
                class="btn btn-success ms-3"><i class="material-icons opacity-10">arrow_back</i></a>
        </form>
    </section>
    <script>
        // Declare division_id outside of the functions
        let division_id;

        const divisionSelect = document.querySelector('.division');

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
