<?php

declare(strict_types=1);

namespace Modules\Client\DTOs;

use Carbon\Carbon;

class ClientDTO
{
    public function __construct(
        public string $full_name,
        public string $email,
        public string | null | Carbon $created_at = null,
        public string | null | Carbon $updated_at = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            $data['full_name'],
            $data['email'],
            $data['created_at'] ?? null,
            $data['updated_at'] ?? null,
        );
    }

    public function toArray(): array
    {
        return get_object_vars($this);
    }
}
