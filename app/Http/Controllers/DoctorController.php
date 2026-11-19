<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = Doctor::all();

        return view('doctors', compact('doctors'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'specialization' => 'required|string|max:255',
            'fee' => 'required|integer|min:0',
            'available_days' => 'required|string|max:255',
        ]);

        Doctor::create($validated);

        return redirect('/doctors')->with('success', 'Doctor added successfully!');
    }

    public function update(Request $request, Doctor $doctor)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'specialization' => 'required|string|max:255',
            'fee' => 'required|integer|min:0',
            'available_days' => 'required|string|max:255',
        ]);

        $doctor->update($validated);

        return redirect('/doctors')
            ->with('success', 'Doctor updated successfully!');
    }


    public function destroy(Doctor $doctor)
    {
        $doctor->delete();

        return redirect('/doctors')
            ->with('success', 'Doctor deleted successfully!');
    }


}
