<?php

declare(strict_types=1);

return [
    'custom' => [
        'full_name' => [
            'required' => 'The full name field is required.',
            'string' => 'The full name must be a string.',
            'max' => 'The full name may not be greater than :max characters.',
        ],
        'email' => [
            'required' => 'The email field is required.',
            'email' => 'The email must be a valid email address.',
            'unique' => 'The email has already been taken.',
        ],
    ],
];
