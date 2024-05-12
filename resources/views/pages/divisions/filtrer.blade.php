@extends('layaouts.app')
@section('div', 'active bg-gradient-primary')
@section('title', 'filtre par etat')
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">{{ $division }}</h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive">
                        <table class="table  mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-dark font-weight-bold opacity-7 ">#</th>
                                    <th class="text-uppercase text-dark font-weight-bold opacity-7 ">Les services</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($services as $key => $service)
                                    <tr>
                                        <td class="ps-4">{{ $key + 1 }}</td>
                                        <td class="ps-4">{{ $service->services }}</td>

                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="2">Aucun service trouvé.</td>
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
        <a href="{{ route('divisions.index') }}" class="btn btn-success p-3"><i class="material-icons opacity-10">arrow_back</i></a>
    </div>

@endsection
