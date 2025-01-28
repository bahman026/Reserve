<?php

declare(strict_types=1);

namespace App\Http\Resources;

use App\Models\Consultant;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ConsultantResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        /** @var $this Consultant */
        return [
            'id' => $this->id,
            'full_name' => $this->full_name,
            'email' => $this->email,
            'appointments' => AppointmentResource::collection($this->whenLoaded('appointments')),
        ];
    }
}
