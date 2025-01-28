<?php

declare(strict_types=1);

namespace Modules\Appointment\Models;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;
use Modules\Appointment\Database\Factories\AppointmentFactory;
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

    protected static function newFactory(): AppointmentFactory | Factory
    {
        return AppointmentFactory::new();
    }

    public function consultant(): BelongsTo
    {
        return $this->belongsTo(Consultant::class);
    }

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }
}
