@extends('layaouts.app')
@section('title', 'Marque')
@section('mar', 'active bg-gradient-primary')
@section('content')


    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Les marques</h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-dark font-weight-bold opacity-7">#</th>
                                    <th class="text-uppercase text-dark font-weight-bold opacity-7 ps-2">Les marques</th>
                                    <th class="text-uppercase text-dark font-weight-bold opacity-7 ps-2">Les actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($marques as $key => $marque)
                                    <tr>
                                        <td scope="row">{{ $key + 1 }}
                                        </td>
                                        <td>
                                            {{ $marque->marque }}
                                        </td>
                                        <td>
                                            <a href="{{ route('marque.modifier', $marque->id) }}" type="button"
                                                class="btn btn-success">modifier</a>
                                            <form action="{{ route('marque.delete', $marque->id) }}" class="d-inline"
                                                method="POST" id="delete-form-{{ $marque->id }}">
                                                @csrf
                                                @method('DELETE')
                                                <button onclick="confirmDelete('delete-form-{{ $marque->id }}')"
                                                    type="button" class="btn btn-danger">supprime</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td align="center" colspan="3"> vide</td>
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
        <a href="{{ route('marque.ajoutePage') }}" class="btn btn-primary">Ajouter une marque</a>
    </div>


    <script>
        function confirmDelete(formId) {
            if (confirm('Are you sure you want to delete this marque?')) {
                document.getElementById(formId).submit();
            }
        }
    </script>

@endsection
