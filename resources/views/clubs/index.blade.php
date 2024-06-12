@extends('layouts.layout1')

@section('title', 'All Clubs')

@section('content')
    <div class="container-fluid p-4 bg-white rounded-lg shadow-md">

        <h2 class="text-2xl font-bold mb-4 text-indigo-700">All Clubs</h2>

        <div class="table-responsive mt-4">
            <table class="table table-hover">
                <thead>
                <tr class="bg-gray-200">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Country</th>
                    <th>Number of Titles</th>
                    <th>League</th>
                    <th>Founding Year</th>
                    <th>Stadium</th>
                    <th>Coach</th>
                    <th>Captain</th>
                    <th>Current Value</th>
                    <th>Colors</th>
                    <th>Description</th>
                    <th>Average Goals</th>
                    <th>Is Champion</th>
                    <th>Average Attendance</th>
                    <th colspan="3">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($clubs as $club)
                    <tr>
                        <td>{{ $club->id }}</td>
                        <td>{{ $club->name }}</td>
                        <td>{{ $club->country}}</td>
                        <td>{{ $club->number_of_titles }}</td>
                        <td>{{ $club->league->name }}</td>
                        <td>{{ $club->founding_year }}</td>
                        <td>{{ $club->stadium }}</td>
                        <td>{{ $club->coach }}</td>
                        <td>{{ $club->captain }}</td>
                        <td>{{ $club->current_value }}</td>
                        <td>{{ $club->colors }}</td>
                        <td>{{ $club->description }}</td>
                        <td>{{ $club->avg_goals }}</td>
                        <td>{{ $club->is_champion ? 'Yes' : 'No' }}</td>
                        <td>{{ $club->avg_attendance }}</td>

                        <td>
                            <a href="{{ route('clubs.show', $club->id) }}" class="btn btn-primary">Show <i class="fa fa-eye" aria-hidden="true"></i></a>
                        </td>

                        <td>
                            <a href="{{ route('clubs.edit', $club->id) }}" class="btn btn-warning">Update <i class="fa fa-refresh" aria-hidden="true"></i></a>
                        </td>
                        <td>
                            <form action="{{ route('clubs.destroy', $club->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete <i class="fa fa-window-close-o" aria-hidden="true"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <form action="{{ route('clubs.search') }}" method="GET" class="form-inline">
                            <div class="input-group">
                                <input type="text" name="query" placeholder="Search Clubs.." class="form-control">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-dark"> Search <i class="fa fa-search-plus" aria-hidden="true"></i> </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row justify-content-center mt-4">
                    <div class="col-md-6 text-center">
                        <a href="{{ route('clubs.show.sum') }}" class="btn btn-dark">
                            <span>Summe von Marktwerten bilden</span>
                            <i class="fa fa-calculator ml-2" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
                <div class="row justify-content-center mt-4">
                    <div class="col-md-6 text-center">
                        <a href="{{ route('clubs.create') }}" class="btn btn-dark">
                            <span>Create</span>
                            <i class="fa fa-icon-name ml-2" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
