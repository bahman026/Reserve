<?php

declare(strict_types=1);

namespace App\Models;

use Database\Factories\AppointmentFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;
use Modules\Client\Models\Client;
use Modules\Consultant\Models\Consultant;

/**
 * @property int $id
 * @property int $consultant_id
 * @property int $client_id
 * @property string $appointment_date
 * @property Consultant $consultant
 * @property Client $client
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */
class Appointment extends Model
{
    /** @use HasFactory<AppointmentFactory> */
    use HasFactory;

    protected $fillable = [
        'consultant_id',
        'client_id',
        'appointment_date',
    ];

    public function consultant(): BelongsTo
    {
        return $this->belongsTo(Consultant::class);
    }

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }
}
