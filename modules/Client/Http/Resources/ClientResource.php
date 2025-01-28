<?php

declare(strict_types=1);

namespace Modules\Client\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Appointment\Http\Resources\AppointmentResource;

class ClientResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->resource->id,
            'full_name' => $this->resource->full_name,
            'email' => $this->resource->email,
            'appointments' => AppointmentResource::collection($this->whenLoaded('appointments')),
        ];
    }
}
