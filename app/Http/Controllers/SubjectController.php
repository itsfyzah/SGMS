<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    // Fungsi untuk paparkan senarai subjek
    public function index()
    {
        $subjects = Subject::all();
        return view('subjects.index', compact('subjects'));
    }

    // Fungsi untuk paparkan form tambah subjek
    public function create()
    {
        return view('subjects.create');
    }

    // Fungsi untuk simpan subjek baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'code' => 'required|string|unique:subjects,code',
            'credit_hours' => 'required|numeric',
        ]);

        Subject::create($request->all());
        return redirect()->route('subjects.index');
    }

    // Fungsi untuk paparkan form edit subjek
    public function edit($id)
    {
        $subject = Subject::findOrFail($id);
        return view('subjects.edit', compact('subject'));
    }

    // Fungsi untuk kemaskini subjek
    public function update(Request $request, $id)
    {
        $subject = Subject::findOrFail($id);
        $request->validate([
            'name' => 'required|string',
            'code' => 'required|string',
            'credit_hours' => 'required|numeric',
        ]);

        $subject->update($request->all());
        return redirect()->route('subjects.index');
    }

    // Fungsi untuk padam subjek
    public function destroy($id)
    {
        $subject = Subject::findOrFail($id);
        $subject->delete();
        return redirect()->route('subjects.index');
    }
}
