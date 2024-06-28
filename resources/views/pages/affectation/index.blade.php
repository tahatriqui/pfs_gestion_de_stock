@extends('layaouts.app')
@section('title', 'les affectation')
@section('aff', 'active bg-gradient-primary')
@section('content')
    <div class="row">
        <div class="col-12">
            @if (session('suc'))
                <div class="alert alert-success alert-dismissible fade show w-30 position-fixed top-0  translate-middle-x"
                    role="alert" id="autoCloseAlert">
                    <div class="alert-message">
                        <strong class="text-white">{{ session('suc') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            <i class="material-icons">close</i>
                        </button>
                    </div>
                </div>
            @elseif (session('sup'))
                <div class="alert alert-danger alert-dismissible fade show w-30 position-fixed top-0 translate-middle-x"
                    role="alert" id="autoCloseAlert">
                    <div class="alert-message">
                        <strong class="text-white">{{ session('sup') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            <i class="material-icons">close</i>
                        </button>
                    </div>
                </div>
            @elseif (session('mod'))
                <div class="alert alert-secondary alert-dismissible fade show ms-5 w-30 position-fixed top-0  translate-middle-x"
                    role="alert" id="autoCloseAlert">
                    <div class="alert-message">
                        <strong class="text-white">{{ session('mod') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            <i class="material-icons">close</i>
                        </button>
                    </div>
                </div>
            @endif
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Les affectations</h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive">
                        <table class=" table align-items-center mb-0 ">
                            <thead>
                                <tr>
                                    <th class=" text-uppercase text-dark font-weight-bold opacity-7">#</th>
                                    <th class="text-uppercase text-dark font-weight-bold opacity-7 ps-2">l'utilisateur</th>
                                    <th class="text-center text-uppercase text-dark font-weight-bold opacity-7">la division
                                    </th>
                                    <th class="text-center text-uppercase text-dark font-weight-bold opacity-7">
                                        le service</th>
                                    <th class="text-center text-uppercase text-dark font-weight-bold opacity-7">
                                        service tag</th>
                                    <th class="text-center text-uppercase text-dark font-weight-bold opacity-7">
                                        code barre</th>
                                    <th class="text-center text-uppercase text-dark font-weight-bold opacity-7">
                                        la mark</th>
                                    <th class="text-center text-uppercase text-dark font-weight-bold opacity-7">
                                        la reference</th>

                                    <th class="text-center text-uppercase text-dark font-weight-bold opacity-7">
                                        la categorie</th>
                                    <th class="text-center text-uppercase text-dark font-weight-bold opacity-7">
                                        les Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($affectations as $key => $affectation)
                                    <tr>
                                        <td class='text-dark'>{{ $key + 1 }}</td>
                                        <td>{{ $affectation->user->nom . ' ' . $affectation->user->prenom }}</td>
                                        <td class="text-center text-dark">{{ $affectation->division->name }}</td>
                                        <td class="text-center text-dark">{{ $affectation->service->services }}</td>
                                        <td class="text-center text-dark">{{ $affectation->services_tag }}</td>
                                        <td class="text-center text-dark">{{ $affectation->code_barre }}</td>
                                        <td class="text-center text-dark">{{ $affectation->materiel->marque->marque }}</td>
                                        <td class="text-center text-dark">{{ $affectation->materiel->ref }}</td>

                                        <td class="text-center text-dark">
                                            {{ $affectation->materiel->categories->categorie }}</td>
                                        <td class="text-center ">
                                            <a href="{{ route('affectation.modifierPage', $affectation->id) }}"
                                                class="btn btn-success me-2">Modifier</a>
                                            <form class="d-inline"
                                                action="{{ route('delete.affectation', $affectation->id) }}" method="POST"
                                                id="delete-form-{{ $affectation->id }}">
                                                @csrf
                                                @method('DELETE')
                                                <button onclick="confirmDelete('delete-form-{{ $affectation->id }}')"
                                                    type="button" class="btn btn-danger">Supprimer</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="10" class="text-center">Aucun affectation trouvé</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-end w-20  px-4 mb-3">
        <a href="{{ route('affectation.ajouterPage') }}" class="btn btn-primary p-3">Ajouter une affectation</a>
    </div>

    <script>
        function confirmDelete(formId) {
            if (confirm('Are you sure you want to delete this affectation?')) {
                document.getElementById(formId).submit();
            }
        }
    </script>
@endsection
