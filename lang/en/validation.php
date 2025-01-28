<?php

declare(strict_types=1);

return [
    'attributes' => [
        'consultant_id' => 'consultant',
        'client_id' => 'client',
        'appointment_date' => 'appointment date',
        'full_name' => 'full name',
        'email' => 'email',
    ],

    'custom' => [
        'consultant_id' => [
            'required' => 'The consultant field is required.',
            'exists' => 'The selected consultant is invalid.',
        ],
        'client_id' => [
            'required' => 'The client field is required.',
            'exists' => 'The selected client is invalid.',
        ],
        'appointment_date' => [
            'required' => 'The appointment date field is required.',
            'date' => 'The appointment date must be a valid date.',
            'after' => 'The appointment date must be after the current time.',
        ],
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
