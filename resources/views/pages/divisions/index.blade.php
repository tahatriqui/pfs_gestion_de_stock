@extends('layaouts.app')
@section('title', 'les division')
@section('div', 'active bg-gradient-primary')
@section('content')


    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Les devision</h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-dark font-weight-bold opacity-7">#</th>
                                    <th class="text-uppercase text-dark font-weight-bold opacity-7 ps-2">La divison</th>

                                    <th class="text-uppercase text-dark font-weight-bold opacity-7 ps-2">Les actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($divisions as $key=>$division)
                                    <th scope="row">{{ $key + 1 }}</th>
                                    <td>{{ $division->name }}</td>
                                    <td>
                                        <a href="{{ route('division.modifier', $division->id) }}" type="button"
                                            class="btn btn-success">modifier</a>
                                        <form action="{{ route('division.delete', $division->id) }}" class="d-inline"
                                            method="POST" id="delete-form-{{ $division->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <button onclick="confirmDelete('delete-form-{{ $division->id }}')"
                                                type="button" class="btn btn-danger">supprime</button>
                                        </form>
                                        <a class="btn btn-dark"
                                            href="{{ route('division.filtre', ['id' => $division->id, 'division' => $division->name]) }}">les
                                            services de division</a>
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

    <div class="row justify-content-end w-20  px-4 mb-3">
        <a href="{{ route('division.ajouter') }}" class="btn btn-primary p-3">Ajouter une division</a>
    </div>

    <script>
        function confirmDelete(formId) {
            if (confirm('Are you sure you want to delete this division?')) {
                document.getElementById(formId).submit();
            }
        }
    </script>

@endsection
