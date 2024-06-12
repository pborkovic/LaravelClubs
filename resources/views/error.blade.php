@extends('layouts.layout1')

@section('title', 'Error')

@section('content')
    <div class="max-w-md w-full mx-auto">
        @if (count($errors) > 0)
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Fehler aufgetreten!</strong>
                <ul class="mt-3 list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        @if (strpos($error, 'SQLSTATE')) <!-- strpos() sucht teilstring in einem anderen string -->
                        @if (strpos($error, '2002'))
                            <li>Verbindung zur Datenbank kann nicht hergestellt werden.</li>

                        @elseif (strpos($error, '23000'))
                            <li>Duplikate sind in der Datenbank nicht erlaubt.</li>

                        @elseif (strpos($error, '23001'))
                            <li>Eine Foreign-Key ist aufgetreten.</li>

                        @elseif (strpos($error, '42000'))
                            <li>Es gab einen Syntaxfehler in der SQL-Query.</li>

                        @elseif (strpos($error, '42S02'))
                            <li>Die angegebene Table gibt es nicht in der Datenbank.</li>
                        @else
                            <li>Allgemeiner Datenbankfehler.</li>
                        @endif
                        @else
                            <li>{{ $error }}</li>
                        @endif
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
@endsection
