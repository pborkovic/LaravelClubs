@extends('layouts.layout1')

@section('title', 'Create new Club')

@section('content')
    <div class="container mt-5">
        <h2>Create Club</h2>
        <form method="post" action="{{ route('clubs.store') }}" class="needs-validation" novalidate>
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label"><b>Name:</b> <span class="text-danger">*</span></label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required />
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="country" class="form-label"><b>Country:</b> <span class="text-danger">*</span></label>
                <input type="text" name="country" class="form-control @error('country') is-invalid @enderror" value="{{ old('country') }}" required />
                @error('country')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="number_of_titles" class="form-label"><b>Number of Titles:</b></label>
                <input type="text" name="number_of_titles" class="form-control @error('number_of_titles') is-invalid @enderror" value="{{ old('number_of_titles') }}">
                @error('number_of_titles')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
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


            <div class="mb-3">
                <label for="founding_year" class="form-label"><b>Founding Year:</b></label>
                <input type="text" name="founding_year" class="form-control @error('founding_year') is-invalid @enderror" value="{{ old('founding_year') }}">
                @error('founding_year')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="stadium" class="form-label"><b>Stadium:</b></label>
                <input type="text" name="stadium" class="form-control @error('stadium') is-invalid @enderror" value="{{ old('stadium') }}">
                @error('stadium')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="coach" class="form-label"><b>Coach:</b></label>
                <input type="text" name="coach" class="form-control @error('coach') is-invalid @enderror" value="{{ old('coach') }}">
                @error('coach')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="captain" class="form-label"><b>Captain:</b></label>
                <input type="text" name="captain" class="form-control @error('captain') is-invalid @enderror" value="{{ old('captain') }}">
                @error('captain')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="current_value" class="form-label"><b>Current Value:</b></label>
                <input type="text" name="current_value" class="form-control @error('current_value') is-invalid @enderror" value="{{ old('current_value') }}">
                @error('current_value')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="colors" class="form-label"><b>Colors:</b></label>
                <input type="text" name="colors" class="form-control @error('colors') is-invalid @enderror" value="{{ old('colors') }}">
                @error('colors')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label"><b>Description:</b></label>
                <textarea name="description" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="avg_goals" class="form-label"><b>Average Goals:</b></label>
                <input type="text" name="avg_goals" class="form-control @error('avg_goals') is-invalid @enderror" value="{{ old('avg_goals') }}">
                @error('avg_goals')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" name="is_champion" class="form-check-input" @if(old('is_champion')) checked @endif>
                <label class="form-check-label" for="is_champion"><b>Is Champion</b></label>
                @error('is_champion')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="avg_attendance" class="form-label"><b>Average Attendance:</b></label>
                <input type="text" name="avg_attendance" class="form-control @error('avg_attendance') is-invalid @enderror" value="{{ old('avg_attendance') }}">
                @error('avg_attendance')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
@endsection
