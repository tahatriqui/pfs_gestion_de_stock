@extends('layaouts.app')
@section('title', 'les utilisateur')
@section('util', 'active bg-gradient-primary')

@section('content')
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">Les utilisateurs</h6>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-dark font-weight-bold opacity-7">#</th>
                                            <th class="text-uppercase text-dark font-weight-bold opacity-7 ps-2">Nom</th>
                                            <th class="text-center text-uppercase text-dark font-weight-bold opacity-7">
                                                Prénom</th>
                                            <th class="text-center text-uppercase text-dark font-weight-bold opacity-7">CIN
                                            </th>
                                            <th class="text-center text-uppercase text-dark font-weight-bold opacity-7">
                                                Téléphone</th>
                                            <th class="text-center text-uppercase text-dark font-weight-bold opacity-7">
                                                Email</th>
                                            <th class="text-center text-uppercase text-dark font-weight-bold opacity-7">
                                                Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($users as $key => $user)
                                            <tr>
                                                <td class='text-dark'>{{ $key + 1 }}</td>
                                                <td>{{ $user->nom }}</td>
                                                <td class="text-center text-dark">{{ $user->prenom }}</td>
                                                <td class="text-center text-dark">{{ $user->cin }}</td>
                                                <td class="text-center text-dark">{{ $user->telephone }}</td>
                                                <td class="text-center text-dark">{{ $user->email }}</td>
                                                <td class="text-center ">
                                                    <a href="{{ route('user.modifier', $user->id) }}"
                                                        class="btn btn-success me-2">Modifier</a>
                                                    <form class="d-inline" action="{{ route('delete.user', $user->id) }}"
                                                        method="POST" id="delete-form-{{ $user->id }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button onclick="confirmDelete('delete-form-{{ $user->id }}')"
                                                            type="button" class="btn btn-danger">Supprimer</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="7" class="text-center">Aucun utilisateur trouvé</td>
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
                    if (confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')) {
                        document.getElementById(formId).submit();
                    }
                }
            </script>

            <div class="row justify-content-end px-4 mb-3">
                <a href="{{ route('user') }}" class="btn btn-primary">Ajouter un utilisateur</a>
            </div>



            
        @endsection
