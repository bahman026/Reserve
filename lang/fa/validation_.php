<?php

declare(strict_types=1);

return [
    'attributes' => [
        'consultant_id' => 'مشاور',
        'client_id' => 'مراجع',
        'appointment_date' => 'تاریخ قرار ملاقات',
        'full_name' => 'نام کامل',
        'email' => 'ایمیل',
    ],

    'custom' => [
        'consultant_id' => [
            'required' => 'فیلد مشاور الزامی است.',
            'exists' => 'مشاور انتخاب شده معتبر نیست.',
        ],
        'client_id' => [
            'required' => 'فیلد مراجع الزامی است.',
            'exists' => 'مراجع انتخاب شده معتبر نیست.',
        ],
        'appointment_date' => [
            'required' => 'فیلد تاریخ قرار ملاقات الزامی است.',
            'date' => 'تاریخ قرار ملاقات باید معتبر باشد.',
            'after' => 'تاریخ قرار ملاقات باید بعد از زمان فعلی باشد.',
        ],
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

    'required' => 'فیلد :attribute الزامی است.',
    'exists' => ':attribute انتخاب شده معتبر نیست.',
    'date' => ':attribute باید یک تاریخ معتبر باشد.',
    'after_or_equal' => ':attribute باید برابر یا بعد از :date باشد.',
    'string' => ':attribute باید به صورت متن باشد.',
    'max' => [
        'string' => ':attribute نباید بیشتر از :max کاراکتر باشد.',
    ],
    'email' => ':attribute باید معتبر باشد.',
    'unique' => 'این :attribute قبلا ثبت شده است.',
];
