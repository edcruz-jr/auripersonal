<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;
use Inertia\Response;
use Carbon\Carbon;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): Response
    {
        return Inertia::render('Auth/Register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // dd($request->all());
        $request->validate([
            'full_name' => 'required|string|min:10|max:255',
            'email' => 'required|string|lowercase|email|max:255|unique:'.User::class,
            'phone_number' => 'required|string|max:20',
            'birth_date' => 'required|date',
            'gender_id' => 'required|exists:genders,id',
            'height' => 'required|numeric|min:0',
            'weight' => 'nullable|numeric|min:0',
            'main_objective_id' => 'required|exists:main_objectives,id',
            'activity_level_id' => 'required|exists:activity_levels,id',
            'dietary_restrictions' => 'nullable|string|max:255',
            'password' => ['required', 'confirmed', Rules\Password::defaults()]
        ],
        [
            'full_name.required' => 'O campo nome completo é obrigatório.',
            'full_name.min' => 'O campo nome completo deve ter no mínimo :min caracteres.',
            'full_name.max' => 'O campo nome completo deve ter no máximo :max caracteres.',
            'email.required' => 'O campo e-mail é obrigatório.',
            'email.email' => 'O campo e-mail deve ser um endereço de e-mail válido.',
            'email.unique' => 'O e-mail informado já está em uso.',
            'phone_number.required' => 'O campo número de telefone é obrigatório.',
            'phone_number.max' => 'O campo número de telefone deve ter no máximo :max caracteres.',
            'birth_date.required' => 'O campo data de nascimento é obrigatório.',
            'birth_date.date' => 'O campo data de nascimento deve ser uma data válida.',
            'gender_id.required' => 'O campo gênero é obrigatório.',
            'gender_id.exists' => 'O gênero selecionado é inválido.',
            'height.required' => 'O campo altura é obrigatório.',
            'height.numeric' => 'O campo altura deve ser um número.',
            'height.min' => 'O campo altura deve ser um número positivo.',
            'weight.numeric' => 'O campo peso deve ser um número.',
            'weight.min' => 'O campo peso deve ser um número positivo.',
            'main_objective_id.required' => 'O campo objetivo principal é obrigatório.',
            'main_objective_id.exists' => 'O objetivo principal selecionado é inválido.',
            'activity_level_id.required' => 'O campo nível de atividade é obrigatório.',
            'activity_level_id.exists' => 'O nível de atividade selecionado é inválido.',
            'dietary_restrictions.max' => 'O campo restrições alimentares deve ter no máximo :max caracteres.',
            'password.required' => 'O campo senha é obrigatório.',
            'password.confirmed' => 'A confirmação da senha não corresponde.',
        ]);

        $user = User::create([
            'full_name' => $request->full_name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'birth_date' => $request->birth_date,
            'gender_id' => $request->gender_id,
            'height' => $request->height,
            'weight' => $request->weight,
            'main_objective_id' => $request->main_objective_id,
            'activity_level_id' => $request->activity_level_id,
            'dietary_restrictions' => $request->dietary_restrictions,
            'password' => Hash::make($request->password)
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}
