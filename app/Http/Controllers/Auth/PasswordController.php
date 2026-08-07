<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class PasswordController extends Controller
{
    /**
     * Update the user's password.
     */
    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'current_password' => [
                'required',
                'string',
                'max:100',
                'different:current_password',
                'confirmed',
                Password::min(8)
                    ->mixedCase()    // pelo menos 1 maiúscula e 1 minúscula
                    ->letters()      // pelo menos 1 letra
                    ->numbers()       // pelo menos 1 número
                    ->symbols()       // pelo menos 1 caractere especial
                    ->uncompromised(), // verifica vazamento em data breaches (HIBP)
            ],
            'password' => [
                'required',
                'string',
                'max:100',
                'different:current_password',
                'confirmed',
                Password::min(8)
                    ->mixedCase()    // pelo menos 1 maiúscula e 1 minúscula
                    ->letters()      // pelo menos 1 letra
                    ->numbers()       // pelo menos 1 número
                    ->symbols()       // pelo menos 1 caractere especial
                    ->uncompromised(), // verifica vazamento em data breaches (HIBP)
            ],
        ]);

        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        return back();
    }
}
