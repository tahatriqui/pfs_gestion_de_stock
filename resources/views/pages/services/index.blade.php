@extends('layaouts.app')
@section('title', 'services')
@section('ser', 'active bg-gradient-primary')
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Les services</h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-dark font-weight-bold opacity-7">#</th>
                                    <th class="text-uppercase text-dark font-weight-bold opacity-7 ps-2">Les services</th>
                                    <th class="text-uppercase text-dark font-weight-bold opacity-7 ps-2">Les division</th>
                                    <th class="text-uppercase text-dark font-weight-bold opacity-7 ps-2">Les bureau</th>
                                    <th class="text-uppercase text-dark font-weight-bold opacity-7 ps-2">Les actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($services as $key => $service)
                                    <tr>
                                        <th scope="row">{{ $key + 1 }}</th>
                                        <td>{{ $service->services }}</td>
                                        <td>{{ $service->division->name }}</td>
                                        <td>{{ $service->bureau }}</td>
                                        <td>
                                            <a href="{{ route('services.modifier', $service->id) }}" type="button"
                                                class="btn btn-success">modifier</a>
                                            <form class="d-inline" action="{{ route('delete.service', $service->id) }}"
                                                method="POST" id="delete-form-{{ $service->id }}">
                                                @csrf
                                                @method('DELETE')
                                                <button onclick="confirmDelete('delete-form-{{ $service->id }}')"
                                                    type="button" class="btn btn-danger">supprime</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td align="center" colspan="5">vide</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-end  px-4 mb-3">
        <a href="{{ route('services_view.ajouter') }}" class="btn btn-primary p-3">Ajouter un service</a>
    </div>

    <script>
        function confirmDelete(formId) {
            if (confirm('Are you sure you want to delete this service?')) {
                document.getElementById(formId).submit();
            }
        }
    </script>

@endsection
