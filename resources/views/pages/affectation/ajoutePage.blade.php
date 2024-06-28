@extends('layaouts.app')
@section('title', 'ajouter une affectation')
@section('aff', 'active bg-gradient-primary')

@section('content')

<section class="container">
    @if (session('err'))
    <div class="alert alert-danger alert-dismissible fade show w-30 position-fixed top-0 translate-middle-x"
    role="alert" id="autoCloseAlert">
    <div class="alert-message">
        <strong class="text-white">{{ session('err') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <i class="material-icons">close</i>
        </button>
    </div>
</div>
    @endif
    <h1 class="mt-3 mb-3">Ajouter une affectation :</h1>
    <form method="POST" action="{{ route('affectation.ajouter') }}">
        @csrf

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


        <select class="form-select border-dark w-15 me-3 ps-2 d-inline" name="service">
            <option selected disabled> choisit un service</option>
            @forelse ($services as $service)
                <option name={{ $service->divisions_id }} value="{{ $service->id }}">{{ $service->services }}
                </option>
            @empty
            @endforelse
        </select>
        @error('service')
            <small class="text-danger">{{ $message }}</small>
        @enderror


       <div>
        <select class="form-select d- border-dark w-15 mt-2 ps-2  d-inline" name="user">
            <option selected disabled> choisit un utilisateur</option>
            @forelse ($users as $user)
                <option value="{{ $user->id }}">{{ $user->prenom . ' ' . $user->nom }}</option>
            @empty
            @endforelse
        </select>
        @error('user')
            <small class="text-danger">{{ $message }}</small>
        @enderror


        <select class="form-select border-dark w-15   d-inline ps-2" name="materiel">
            <option selected disabled> choisit une materiel</option>
            @forelse ($materiels as $materiel)
                <option value="{{ $materiel->id }}">{{ $materiel->marque->marque . " " .$materiel->ref . " " .$materiel->categories->categorie   }}</option>
            @empty
            @endforelse
        </select>
        @error('user')
            <div class="text-danger">{{ $message }}</div>
        @enderror
       </div>



        <button type="submit" class=" mt-4 w-10 btn btn-primary">Ajouter</button>
                <a href="{{ route('affectation.index') }}"
                class="btn btn-success mt-4 ms-3"><i class="material-icons opacity-10">arrow_back</i>
        </a>
    </form>
</section>


{{--  js function to filter services  --}}
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