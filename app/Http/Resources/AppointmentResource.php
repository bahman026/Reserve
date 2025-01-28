<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Client\Http\Resources\ClientResource;
use Modules\Consultant\Http\Resources\ConsultantResource;

class AppointmentResource extends JsonResource
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
            'consultant_id' => $this->resource->consultant_id,
            'client_id' => $this->resource->client_id,
            'appointment_date' => $this->resource->appointment_date,
            'client' => new ClientResource($this->whenLoaded('client')),
            'consultant' => new ConsultantResource($this->whenLoaded('consultant')),
        ];
    }
}
