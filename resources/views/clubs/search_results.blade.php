@extends('layouts.layout1')

@section('title', 'Search Results')

@section('content')
    <div class="container mx-auto p-4 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-4 text-indigo-700">Search Results</h2>

        <div class="overflow-x-auto">
            <table class="w-full min-w-[1500px] border border-gray-300"> <!-- Adjust the value as needed -->
                <thead>
                <th class="border-b p-2 bg-gray-200">ID</th>
                <th class="border-b p-2 bg-gray-200">Name</th>
                <th class="border-b p-2 bg-gray-200">Country</th>
                <th class="border-b p-2 bg-gray-200">Number of Titles</th>
                <th class="border-b p-2 bg-gray-200">League</th>
                <th class="border-b p-2 bg-gray-200">Founding Year</th>
                <th class="border-b p-2 bg-gray-200">Stadium</th>
                <th class="border-b p-2 bg-gray-200">Coach</th>
                <th class="border-b p-2 bg-gray-200">Captain</th>
                <th class="border-b p-2 bg-gray-200">Current Value</th>
                <th class="border-b p-2 bg-gray-200">Colors</th>
                <th class="border-b p-2 bg-gray-200">Description</th>
                <th class="border-b p-2 bg-gray-200">Average Goals</th>
                <th class="border-b p-2 bg-gray-200">Is Champion</th>
                <th class="border-b p-2 bg-gray-200">Average Attendance</th>
                </thead>

                <tbody>
                @foreach($clubs as $club)
                    <tr>
                        <td class="border-b p-2">{{ $club->id }}</td>
                        <td class="border-b p-2">{{ $club->name }}</td>
                        <td class="border-b p-2">{{ $club->country }}</td>
                        <td class="border-b p-2">{{ $club->number_of_titles }}</td>
                        <td class="border-b p-2">{{ $club->league }}</td>
                        <td class="border-b p-2">{{ $club->founding_year }}</td>
                        <td class="border-b p-2">{{ $club->stadium }}</td>
                        <td class="border-b p-2">{{ $club->coach }}</td>
                        <td class="border-b p-2">{{ $club->captain }}</td>
                        <td class="border-b p-2">{{ $club->current_value }}</td>
                        <td class="border-b p-2">{{ $club->colors }}</td>
                        <td class="border-b p-2">{{ $club->description }}</td>
                        <td class="border-b p-2">{{ $club->avg_goals }}</td>
                        <td class="border-b p-2">{{ $club->is_champion ? 'Yes' : 'No' }}</td>
                        <td class="border-b p-2">{{ $club->avg_attendance }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
