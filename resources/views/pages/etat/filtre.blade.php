@extends('layaouts.app')
@section('title', 'les materielles : ' . $filtre)
@section('etat', 'active bg-gradient-primary')
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">{{ $filtre }}</h6>

                    </div>
                </div>

                <div class="card-body px-0 pb-2">
                    <div class="table-responsive">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>

                                    <th class="text-uppercase text-dark font-weight-bold opacity-7">#</th>
                                    <th class="text-uppercase text-dark font-weight-bold opacity-7 ps-2">La marque</th>
                                    <th class="text-uppercase text-dark font-weight-bold opacity-7 ps-2">reference</th>

                                    <th class="text-uppercase text-dark font-weight-bold opacity-7 ps-2">la configuration
                                        </th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse($materiels as $key => $materiel)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $materiel->marque->marque }}</td>
                                        <td>{{ $materiel->ref }}</td>
                                        <td>{{ $materiel->configue }}</td>

                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="2">Aucune materiel trouvé.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row justify-content-end w-10  px-4 mb-3">
        <a href="{{ route('etat.index') }}" class="btn btn-success p-3"><i class="material-icons opacity-10">arrow_back</i></a>
    </div>



@endsection
