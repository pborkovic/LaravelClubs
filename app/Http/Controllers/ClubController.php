<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Club;
use App\Models\League;

class ClubController extends Controller
{

    /**
     * @var string[]
     * Validation rules for Methods in Controller
     */
    private $validator_rules = [
        "name" => "required|max:40",
        "country" => "required|max:40",
        "number_of_titles" => "integer|nullable",
        "league" => "required|max:40",
        "founding_year" => "required|date|after:01.01.1907|before_or_equal:today",
        "stadium" => "required|max:40",
        "coach" => "required|max:40",
        "captain" => "required|max:40",
        "current_value" => "required|numeric",
        "colors" => "nullable|max:40",
        "description" => "nullable",
        "avg_goals" => "nullable|numeric",
        "avg_attendance" => "nullable|numeric",
    ];


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $clubs = Club::all(); // read all clubs from database
            return view('clubs.index')->with('clubs', $clubs);
            // The array 'books' becomes the variable $books in the view.
        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect()->route('error')->withErrors("Database access failed: {$ex->getMessage()} : {$ex->getCode()}");
        } catch (Exception $ex) {
            return redirect()->route('error')->withErrors("Error occurred: {$ex->getMessage()} : {$ex->getCode()}");
        }
    } //End index method

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $clubs = Club::find($id);
            return view('clubs.show')->with('club', $clubs);
        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect()->route('error')->withErrors("Datenbankzugriff fehlgeschlagen: {$ex->getMessage()} : {$ex->getCode()}");
        } catch (Exception $ex) {
            return redirect()->route('error')->withErrors("Fehler aufgetreten:: {$ex->getMessage()} : {$ex->getCode()}");
        }
    }//End show method


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $leagues = League::orderBy('name')->get()->unique('name');
        return view('clubs.create')->with('leagues', $leagues);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // Add the validation rule for the publisher ID
            $validator_rules = array_merge($this->validator_rules, [
                'league_id' => 'exists:leagues,id',
            ]);
            $this->validate($request, $validator_rules);

            $club = new Club();
            $club->fill($request->only(array_keys($validator_rules)));

            $club->league_id = $request->input('league_id');

            $club->save();

            return redirect()->route('index')->with('success', 'Club created successfully');
        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect()->route('error')->withErrors("Database access failed: {$ex->getMessage()} : {$ex->getCode()}");
        } catch (\Exception $ex) {
            return redirect()->route('error')->withErrors("Error occurred: {$ex->getMessage()} : {$ex->getCode()}");
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        try {
            $club = Club::find($id);

            $leagues = League::orderBy('name')->get()->unique('name');

            return view('clubs.edit')
                ->with('club', $club)
                ->with('leagues', $leagues);

        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect()->route('error')->withErrors("Database access failed: {$ex->getMessage()} : {$ex->getCode()}");
        } catch (Exception $ex) {
            return redirect()->route('error')->withErrors("Error occurred: {$ex->getMessage()} : {$ex->getCode()}");
        }
    }//end edit method


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            // Add the validation rule for the league ID
            $validator_rules = array_merge($this->validator_rules, [
                'league_id' => 'exists:leagues,id',
            ]);
            $this->validate($request, $validator_rules);
            $validatedData = $request->validated();

            $club = Club::find($id);
            if (!$club) {
                return redirect()->route('error')->withErrors('Club not found.');
            }

            $club->league_id = $request->input('league_id');

            $club->update($validatedData);

            return redirect()->route('index')->with('success', 'Club updated successfully');
        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect()->route('error')->withErrors("Database access failed: {$ex->getMessage()} : {$ex->getCode()}");
        } catch (\Exception $ex) {
            return redirect()->route('error')->withErrors("Error occurred: {$ex->getMessage()} : {$ex->getCode()}");
        }
    }//end update method

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $club = Club::find($id);
            $club->delete();
            return redirect()->route('index')->with('success', 'Club deleted successfully');
        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect()->route('error')->withErrors("Database access failed: {$ex->getMessage()} : {$ex->getCode()}");
        } catch (Exception $ex) {
            return redirect()->route('error')->withErrors("Error occurred: {$ex->getMessage()} : {$ex->getCode()}");
        }
    }//End destroy method

    /**
     * Search something out of the DB with a query
     */
    public function search(Request $request)
    {
        try {
            $query = $request->input('query');

            if (!strlen($query) === 0 || !empty($query)) { //Check if field is empty or the input is nothing
                $clubs = Club::where('name', 'LIKE', $query . '%')
                    ->orWhere('country', 'LIKE', $query . '%')
                    ->orWhere('number_of_titles', 'LIKE', $query . '%')
                    ->orWhere('league', 'LIKE', '%', $query . '%')
                    ->orWhere('founding_year', 'LIKE', $query . '%')
                    ->orWhere('stadium', 'LIKE', $query . '%')
                    ->orWhere('coach', 'LIKE', $query . '%')
                    ->orWhere('captain', 'LIKE', $query . '%')
                    ->orWhere('current_value', 'LIKE', $query . '%')
                    ->orWhere('colors', 'LIKE', $query . '%')
                    ->orWhere('description', 'LIKE', $query . '%')
                    ->orWhere('avg_goals', 'LIKE', $query . '%')
                    ->orWhere('is_champion', 'LIKE', $query . '%')
                    ->orWhere('avg_attendance', 'LIKE', $query . '%')
                    ->get();

                return view('clubs.search_results')->with('clubs', $clubs);
            } else {
                return redirect()->route('error')->withErrors("Der Input ist null oder ist leer!");
            }
        }//end try
        catch (\Illuminate\Database\QueryException $ex) {
            return redirect()->route('error')->withErrors("Database access failed: {$ex->getMessage()} : {$ex->getCode()}");
        } catch (Exception $ex) {
            return redirect()->route('error')->withErrors("Error occurred: {$ex->getMessage()} : {$ex->getCode()}");
        }
    }//End search method

    public function calculateSum(Request $request)
    {
        try {
            $validated = $request->validate([
                'filter_from' => 'nullable|integer|min:1900|max:' . date('Y'),
                'filter_to' => 'nullable|integer|min:1900|max:' . date('Y'),
            ]);

            $filterFrom = $request->input('filter_from');
            $filterTo = $request->input('filter_to');

            if (is_null($filterFrom) && is_null($filterTo)) {
                $message = "Bitte geben Sie mindestens einen Filterwert (Von oder Bis) ein.";
                return view('clubs.sumOfCurrValue')
                    ->with('message', $message)
                    ->with('fromValue', null)
                    ->with('toValue', null);
            }

            $clubsQuery = \App\Models\Club::query();

            if (!is_null($filterFrom)) {
                $clubsQuery->whereYear('founding_year', '>=', $filterFrom);
            }

            if (!is_null($filterTo)) {
                $clubsQuery->whereYear('founding_year', '<=', $filterTo);
            }

            $clubs = $clubsQuery->get();
            $sum = 0;
            $clubData = [];
            foreach ($clubs as $club) {
                $sum += $club->current_value;
                $clubData[] = [
                    'name' => $club->name,
                    'current_value' => $club->current_value,
                    'founding_year' => $club->founding_year,
                ];
            }

            $sumText = "Die Gesamtsumme der aktuellen Werte beträgt: $sum";

            $fromValue = is_null($filterFrom) ? 'nicht angegeben' : $filterFrom;
            $toValue = is_null($filterTo) ? 'nicht angegeben' : $filterTo;

            return view('clubs.sumOfCurrValue')
                ->with('clubData', $clubData)
                ->with('sum', $sum)
                ->with('sumText', $sumText)
                ->with('fromValue', $fromValue)
                ->with('toValue', $toValue);

        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect()->route('error')->withErrors("Database access failed: {$ex->getMessage()} : {$ex->getCode()}");
        } catch (\Exception $ex) {
            return redirect()->route('error')->withErrors("Error occurred: {$ex->getMessage()} : {$ex->getCode()}");
        }
    }//end sum method
}
