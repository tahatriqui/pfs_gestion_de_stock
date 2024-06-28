@extends('layaouts.app')
@section('title', 'Materiel')
@section('mat', 'active bg-gradient-primary')
@section('content')


    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Les materiels</h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-dark font-weight-bold opacity-7 ps-2">#</th>
                                    <th class="text-uppercase text-dark font-weight-bold opacity-7 ps-2" scope="col">Les
                                        marques</th>
                                    <th class="text-uppercase text-dark font-weight-bold opacity-7 ps-2" scope="col">Les
                                        references</th>
                                    <th class="text-uppercase text-dark font-weight-bold opacity-7 ps-2" scope="col">La
                                        configuration</th>
                                    <th class="text-uppercase text-dark font-weight-bold opacity-7 ps-2" scope="col">
                                        L'etat</th>
                                    <th class="text-uppercase text-dark font-weight-bold opacity-7 ps-2" scope="col">La
                                        division</th>
                                        <th class="text-center text-uppercase text-dark font-weight-bold opacity-7">
                                            la quantité</th>
                                    <th class="text-uppercase text-dark font-weight-bold opacity-7 ps-2" scope="col">La
                                        category</th>
                                    <th class="text-uppercase text-dark font-weight-bold opacity-7 ps-2" scope="col">La
                                        date</th>

                                    <th class="text-uppercase text-dark font-weight-bold opacity-7 ps-2" scope="col">
                                        expire</th>
                                    <th class="text-uppercase text-dark font-weight-bold opacity-7 ps-2">Les actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($materiels as $key=>$materiel)
                                    <th scope="row">{{ $key + 1 }}</th>
                                    <td>{{ $materiel->marque->marque }}</td>
                                    <td>{{ $materiel->ref }}</td>
                                    <td>{{ $materiel->configue }}</td>
                                    <td>
                                        @isset($materiel->etat->etats)
                                            {{ $materiel->etat->etats }}
                                        @else
                                            aucune
                                        @endisset
                                    </td>
                                    <td>
                                        @isset($materiel->division->name)
                                            {{ $materiel->division->name }}
                                        @else
                                            aucune
                                        @endisset
                                    </td>
                                    <td class="text-center text-dark">{{ $materiel->quant }}</td>
                                    <td>{{ $materiel->categories->categorie }}</td>
                                    <td>{{ $materiel->la_date->year . '-' . $materiel->la_date->month . '-' . $materiel->la_date->day }}
                                    </td>
                                    <td>
                                        @if ($materiel->la_date->year + 5 <= $year)
                                            oui
                                        @else
                                            non
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('materiel.modifierPage', $materiel->id) }}" type="button"
                                            class="btn btn-success">modifier</a>
                                        <form class="d-inline" action="{{ route('materiel.supprimer', $materiel->id) }}"
                                            method="POST" id="delete-form-{{ $materiel->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <button onclick="confirmDelete('delete-form-{{ $materiel->id }}')"
                                                type="button" class="btn btn-danger">supprimer</button>
                                        </form>
                                    </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td align="center" colspan="8"> vide</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="w-20 row justify-content-end px-4 mb-3">
        <a href="{{  route('materiel.ajouterPage') }}" class="btn btn-primary">Ajouter un materiel</a>
    </div>

    <script>
        function confirmDelete(formId) {
            if (confirm("t'es sure tu veux supprimer cette materiel?")) {
                document.getElementById(formId).submit();
            }
        }
    </script>
@endsection
