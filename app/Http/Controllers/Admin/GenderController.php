<?php

namespace App\Http\Controllers;

use App\Models\Gender;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class GenderController extends Controller
{
    public function index(): Response
    {
        $genders = Gender::orderBy('description')->get();

        return Inertia::render('Admin/Gender/EditGender', [
            'genders' => $genders
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'new_gender' => 'required|string|unique:genders,description|min:5|max:255'
        ]);

        Gender::create([
            'description' => $request->new_gender
        ]);

        return back();
    }

    public function update (Request $request)
    {
        $request->validate([
            'current_gender' => 'required|exists:genders,id',
            'new_gender' => 'required|string|unique:genders,description|min:5|max:255'
        ]);

        $find_gender = Gender::findOrFail($request->current_gender);

        $find_gender->update([
            'description' => $request->new_gender
        ]);

        return back();
    }

    public function destroy (Request $request)
    {
        $request->validate([
            'selected_gender' => 'required|exists:genders,id',
            'password' => 'required | current_password'
        ]);

        Gender::destroy($request->selected_gender);

        return back();
    }
}
