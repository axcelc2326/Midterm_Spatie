<?php
namespace App\Http\Controllers;

use App\Models\Record;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecordController extends Controller
{
    public function index()
    {
        $records = Record::all();
        return view('records.index', compact('records'));
    }

    public function create()
    {
        if (!Auth::user()->can('create-records')) {
            abort(403, 'Unauthorized.');
        }

        return view('records.create');
    }

    public function store(Request $request)
    {
        if (!Auth::user()->can('create-records')) {
            abort(403, 'Unauthorized.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'email' => 'required|email|unique:records,email',
            'phone' => 'required|string|max:20',
            'course' => 'required|string|max:255',
        ]);

        Record::create($request->only(['name', 'address', 'email', 'phone', 'course']));

        return redirect()->route('records.index')->with('success', 'Record created successfully.');
    }

    public function edit(Record $record)
    {
        if (!Auth::user()->can('edit-records')) {
            abort(403, 'Unauthorized.');
        }

        return view('records.edit', compact('record'));
    }

    public function update(Request $request, Record $record)
    {
        if (!Auth::user()->can('edit-records')) {
            abort(403, 'Unauthorized.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'email' => 'required|email|unique:records,email,' . $record->id,
            'phone' => 'required|string|max:20',
            'course' => 'required|string|max:255',
        ]);

        $record->update($request->only(['name', 'address', 'email', 'phone', 'course']));

        return redirect()->route('records.index')->with('success', 'Record updated successfully.');
    }

    public function destroy(Record $record)
    {
        if (!Auth::user()->can('delete-records')) {
            abort(403, 'Unauthorized.');
        }

        $record->delete();

        return redirect()->route('records.index')->with('success', 'Record deleted successfully.');
    }
}
