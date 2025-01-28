<?php

declare(strict_types=1);

namespace Modules\Consultant\Models;

use App\Models\Appointment;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;
use Modules\Consultant\Database\Factories\ConsultantFactory;

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

    protected static function newFactory(): ConsultantFactory | Factory
    {
        return ConsultantFactory::new();
    }

    public function appointments(): HasMany
    {
        return $this->hasMany(Appointment::class);
    }
}
