<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property int $consultant_id
 * @property int $client_id
 * @property string $appointment_date
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */
class Appointment extends Model
{
    protected $fillable = [
        'consultant_id',
        'client_id',
        'appointment_date',
        'status',
        'notes',
    ];
}
