<?php

declare(strict_types=1);

return [
    'custom' => [
        'full_name' => [
            'required' => 'نام کامل الزامی است.',
            'string' => 'نام کامل باید به صورت متن باشد.',
            'max' => 'نام کامل نباید بیشتر از :max کاراکتر باشد.',
        ],
        'email' => [
            'required' => 'ایمیل الزامی است.',
            'email' => 'ایمیل باید معتبر باشد.',
            'unique' => 'این ایمیل قبلا ثبت شده است.',
        ],
    ],
];
