@extends('layouts.layout1')

@section('title', 'Edit Club')

@section('content')
    <div class="container mt-5">
        <h2>Edit the Club</h2>

        <form method="post" action="{{ route('clubs.update', $club->id) }}">
            @csrf
            @method('PATCH')

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $club->name }}">
            </div>

            <div class="form-group">
                <label for="country">Country:</label>
                <input type="text" class="form-control" id="country" name="country" value="{{ $club->country }}">
            </div>

            <div class="form-group">
                <label for="number_of_titles">Number of Titles:</label>
                <input type="text" class="form-control" id="number_of_titles" name="number_of_titles" value="{{ $club->number_of_titles }}">
            </div>

            <!-- Dropdown list for leagues -->
            <div class="mb-3">
                <label for="league_id" class="form-label"><b>League:</b> <span class="text-danger">*</span></label>
                <select class="form-control form-select form-select-lg mb-3" id="league_id" name="league_id">
                    @foreach($leagues as $league)
                        <option value="{{ $league->id }}">{{ $league->name }}</option>
                    @endforeach
                </select>
            </div>
            <!-- End of dropdown list -->

            <div class="form-group">
                <label for="founding_year">Founding Year:</label>
                <input type="text" class="form-control" id="founding_year" name="founding_year" value="{{ $club->founding_year }}">
            </div>

            <div class="form-group">
                <label for="stadium">Stadium:</label>
                <input type="text" class="form-control" id="stadium" name="stadium" value="{{ $club->stadium }}">
            </div>

            <div class="form-group">
                <label for="coach">Coach:</label>
                <input type="text" class="form-control" id="coach" name="coach" value="{{ $club->coach }}">
            </div>

            <div class="form-group">
                <label for="captain">Captain:</label>
                <input type="text" class="form-control" id="captain" name="captain" value="{{ $club->captain }}">
            </div>

            <div class="form-group">
                <label for="current_value">Current Value:</label>
                <input type="text" class="form-control" id="current_value" name="current_value" value="{{ $club->current_value }}">
            </div>

            <div class="form-group">
                <label for="colors">Colors:</label>
                <input type="text" class="form-control" id="colors" name="colors" value="{{ $club->colors }}">
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description">{{ $club->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="avg_goals">Average Goals:</label>
                <input type="text" class="form-control" id="avg_goals" name="avg_goals" value="{{ $club->avg_goals }}">
            </div>

            <div class="form-group">
                <label for="is_champion">Is Champion:</label>
                <input type="checkbox" class="form-check-input" id="is_champion" name="is_champion" {{ $club->is_champion ? 'checked' : '' }}>
            </div>

            <div class="form-group">
                <label for="avg_attendance">Average Attendance:</label>
                <input type="text" class="form-control" id="avg_attendance" name="avg_attendance" value="{{ $club->avg_attendance }}">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
@endsection
