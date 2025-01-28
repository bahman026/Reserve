<?php

declare(strict_types=1);

namespace Modules\Appointment\DTOs;

use Carbon\Carbon;

class AppointmentDTO
{
    public function __construct(
        public int $consultant_id,
        public int $client_id,
        public string | Carbon $appointment_date,
        public string | null | Carbon $created_at = null,
        public string | null | Carbon $updated_at = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            (int) $data['consultant_id'],
            (int) $data['client_id'],
            $data['appointment_date'],
            $data['created_at'] ?? null,
            $data['updated_at'] ?? null,
        );
    }

    public function toArray(): array
    {
        return get_object_vars($this);
    }
}
