@extends('layouts.layout1')

@section('title', 'Club Details')

@section('content')
    <div class="container mt-5">
        <h2>Club Details</h2>
        <div class="card">
            <div class="card-body">
                <p class="card-text">
                    <strong>Name:</strong> {{ $club->name }}
                </p>
                <p class="card-text">
                    <strong>Country:</strong> {{ $club->country }}
                </p>
                <p class="card-text">
                    <strong>Number of Titles:</strong> {{ $club->number_of_titles }}
                </p>
                <p class="card-text">
                    <strong>League:</strong> {{ $club->league->name}}
                </p>
                <p class="card-text">
                    <strong>Founding Year:</strong> {{ $club->founding_year }}
                </p>
                <p class="card-text">
                    <strong>Stadium:</strong> {{ $club->stadium }}
                </p>
                <p class="card-text">
                    <strong>Coach:</strong> {{ $club->coach }}
                </p>
                <p class="card-text">
                    <strong>Captain:</strong> {{ $club->captain }}
                </p>
                <p class="card-text">
                    <strong>Current Value:</strong> {{ $club->current_value }}
                </p>
                <p class="card-text">
                    <strong>Colors:</strong> {{ $club->colors }}
                </p>
                <p class="card-text">
                    <strong>Description:</strong> {{ $club->description }}
                </p>
                <p class="card-text">
                    <strong>Average Goals:</strong> {{ $club->avg_goals }}
                </p>
                <p class="card-text">
                    <strong>Is Champion:</strong> {{ $club->is_champion ? 'Yes' : 'No' }}
                </p>
                <p class="card-text">
                    <strong>Average Attendance:</strong> {{ $club->avg_attendance }}
                </p>
            </div>
        </div>
    </div>
@endsection
