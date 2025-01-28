<?php

declare(strict_types=1);

namespace App\Http\Resources;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AppointmentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        /** @var $this Appointment */
        return [
            'id' => $this->id,
            'consultant_id' => $this->consultant_id,
            'client_id' => $this->client_id,
            'appointment_date' => $this->appointment_date,
            'client' => new ClientResource($this->whenLoaded('client')),
        ];
    }
}
