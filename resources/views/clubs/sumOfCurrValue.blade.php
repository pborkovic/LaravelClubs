@extends('layouts.layout1')

@section('title', 'Summe der aktuellen Marktwerte')

@section('content')
    <div class="container mt-5">
        <h2>Summe der aktuellen Marktwerte</h2>

        <form method="GET" action="{{ route('club.sum-build') }}" class="needs-validation" novalidate>
            <div class="mb-3">
                <label for="filter_from" class="form-label"><b>Von:</b></label>
                <input type="number" id="filter_from" name="filter_from" class="form-control" placeholder="Jahr:" min="1900" max="{{ date('Y') }}" value="{{ old('filter_from', $fromValue ?? '') }}">
            </div>

            <div class="mb-3">
                <label for="filter_to" class="form-label"><b>Bis:</b></label>
                <input type="number" id="filter_to" name="filter_to" class="form-control" placeholder="Jahr:" min="1900" max="{{ date('Y') }}" value="{{ old('filter_to', $toValue ?? '') }}">
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Berechnen</button>
            </div>
        </form>

        @isset($message)
            <div class="alert alert-warning">
                <p>{{ $message }}</p>
            </div>
        @endisset

        @isset($clubData)
            <div class="mt-4">
                <p><b>Von:</b> {{ $fromValue }}</p>
                <p><b>Bis:</b> {{ $toValue }}</p>

                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Club</th>
                        <th>Gründungsjahr</th>
                        <th>Beträge</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($clubData as $club)
                        <tr>
                            <td>{{ $club['name'] }}</td>
                            <td>{{ $club['founding_year'] }}</td>
                            <td>{{ $club['current_value'] }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="2"><b>Summe</b></td>
                        <td>{{ $sum }}</td>
                    </tr>
                    </tbody>
                </table>
                <p class="mt-3"><b>{{ $sumText }}</b></p>
            </div>
        @endisset
    </div>
@endsection
