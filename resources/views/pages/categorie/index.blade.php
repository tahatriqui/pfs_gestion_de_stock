@extends('layaouts.app')
@section('title', 'les categories')
@section('cat', 'active bg-gradient-primary')

@section('content')
    <div class="row">
        <div class="col-12">
                @if (session('suc'))
                <div  class="alert alert-success alert-dismissible fade show w-30 position-fixed top-0  translate-middle-x" role="alert" id="autoCloseAlert">
                    <div class="alert-message">
                        <strong class="text-white">{{session('suc')}}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            <i class="material-icons">close</i>
                        </button>
                    </div>
                </div>
                @elseif (session('sup'))
                <div class="alert alert-danger alert-dismissible fade show w-30 position-fixed top-0 translate-middle-x" role="alert" id="autoCloseAlert">
                    <div class="alert-message">
                        <strong class="text-white">{{session('sup')}}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            <i class="material-icons">close</i>
                        </button>
                    </div>
                </div>
                @elseif (session('mod'))
                <div  class="alert alert-secondary alert-dismissible fade show ms-5 w-30 position-fixed top-0  translate-middle-x" role="alert" id="autoCloseAlert">
                    <div class="alert-message">
                        <strong class="text-white">{{session('mod')}}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            <i class="material-icons">close</i>
                        </button>
                    </div>
                </div>
                @endif
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Les categories</h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-dark font-weight-bold opacity-7">#</th>
                                    <th class="text-uppercase text-dark font-weight-bold opacity-7 ps-2">La categorie</th>
                                    <th class="text-uppercase text-dark font-weight-bold opacity-7 ps-2">Les actions</th>
                                </tr>
                            </thead>
                            <tbody>

                                    @forelse($categories as $key => $cat)
                                        <tr>
                                            <td
                                             scope="row">{{ $key + 1 }}
                                            </td>
                                            <td class=" text-dark">
                                                {{ $cat->categorie }}
                                            </td>
                                            <td>
                                                <a href="{{ route('categorie.modification',$cat->id) }}" type="button" class="btn btn-success">modifier</a>
                                                <form action="{{ route("categorie.delete",$cat->id) }}" class="d-inline" method="POST" id="delete-form-{{ $cat->id  }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button onclick="confirmDelete('delete-form-{{ $cat->id }}')" type="button" class="btn btn-danger">supprime</button>
                                                  </form>
                                                <a href="{{route("categorie.filtre",$cat->id)}}" class="btn btn-dark">filtrer par category</a>
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

    <script>
        function confirmDelete(formId) {
            if (confirm('Êtes-vous sûr de vouloir supprimer cet categories ?')) {
                document.getElementById(formId).submit();
            }
        }
    </script>

    <div class=" w-20 row justify-content-end px-4 mb-3">
        <a href="{{ route('categorie.ajouter') }}" class="btn btn-primary">Ajouter une categorie</a>
    </div>


@endsection
