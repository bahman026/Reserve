<?php

declare(strict_types=1);

namespace Modules\Client\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;
use Modules\Appointment\Models\Appointment;
use Modules\Client\Database\Factories\ClientFactory;

/**
 * @property int $id
 * @property string $full_name
 * @property string $email
 * @property Collection<Appointment> $appointments
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */
class Client extends Model
{
    /** @use HasFactory<ClientFactory> */
    use HasFactory;

    protected $fillable = ['full_name', 'email'];

    protected static function newFactory(): ClientFactory | Factory
    {
        return ClientFactory::new();
    }

    public function appointments(): HasMany
    {
        return $this->hasMany(Appointment::class);
    }
}
