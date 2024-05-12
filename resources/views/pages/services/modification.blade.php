@extends('layaouts.app')
@section('title', 'modifier le service')
@section('ser', 'active bg-gradient-primary')
@section('content')

    <section class="container">
        <h1 class="mt-3 mb-3">Modifier un service :</h1>
        <form method="POST" action="{{ route('services.edit', $service->id) }}">
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label for="service" class="form-label">Service</label>
                <input value="{{ $service->services }}" type="text" name="service"
                    class="form-control border border-dark w-25 p-2" id="service">
            </div>

            <div class="mb-3">
                <label for="bureau" class="form-label">bureau</label>
                <input value="{{ $service->bureau }}" type="text" name="bureau"
                    class="form-control border border-dark w-25 p-2" id="bureau">
            </div>

            <div class="mb-3 form-group">
                <select name="div" class="form-select border-dark w-15 ps-2">
                    <option value="">Select division</option>
                    @forelse ($divisions as $division)
                        @if ($division->id == $service->id)
                            <option selected value="{{ $division->id }}">{{ $division->name }}</option>
                        @else
                            <option value="{{ $division->id }}">{{ $division->name }}</option>
                        @endif
                    @empty
                        <option>Ajouter une devision</option>
                    @endforelse
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Modifier</button><a href="{{ route('services.index') }}"
                class="btn btn-success ms-3"><i class="material-icons opacity-10">arrow_back</i></a>
        </form>

    </section>

@endsection
