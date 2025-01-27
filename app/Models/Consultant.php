<?php

declare(strict_types=1);

namespace App\Models;

use Database\Factories\ConsultantFactory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property string $full_name
 * @property string $email
 * @property Collection<Appointment> $appointments
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */
class Consultant extends Model
{
    /** @use HasFactory<ConsultantFactory> */
    use HasFactory;

    protected $fillable = ['full_name', 'email'];

    public function appointments(): HasMany
    {
        return $this->hasMany(Appointment::class);
    }
}
