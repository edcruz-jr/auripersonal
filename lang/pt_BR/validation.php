<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    */

    'required' => 'O campo :attribute é obrigatório.',
    'string'   => 'O campo :attribute deve ser um texto.',
    'min'      => [
        'string' => 'O campo :attribute deve ter no mínimo :min caracteres.',
        'numeric' => 'O campo :attribute deve ser no mínimo :min.',
        'array' => 'O campo :attribute deve ter no mínimo :min itens.',
    ],
    'max' => [
        'string' => 'O campo :attribute deve ter no máximo :max caracteres.',
        'numeric' => 'O campo :attribute deve ser no máximo :max.',
        'array' => 'O campo :attribute deve ter no máximo :max itens.',
    ],
    'confirmed' => 'A confirmação do campo :attribute não coincide.',
    'different'  => 'Os campos :attribute e :other devem ser diferentes.',
    'email'      => 'O campo :attribute deve ser um e-mail válido.',

    /*
    |--------------------------------------------------------------------------
    | Password Rule Messages
    |--------------------------------------------------------------------------
    */

    'password' => [
        'mixed'         => 'A senha deve conter pelo menos uma letra maiúscula e uma minúscula.',
        'letters'       => 'A senha deve conter pelo menos uma letra.',
        'numbers'       => 'A senha deve conter pelo menos um número.',
        'symbols'       => 'A senha deve conter pelo menos um caractere especial.',
        'uncompromised' => 'Esta senha foi encontrada em um vazamento de dados. Escolha outra senha.',
    ]
];