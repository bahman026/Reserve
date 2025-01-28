<?php

declare(strict_types=1);

namespace App\Actions;

use App\DTOs\AppointmentDTO;
use App\Http\Requests\AppointmentRequest;
use App\Repositories\Interfaces\AppointmentRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Throwable;

readonly class StoreAppointmentAction
{
    public function __construct(public AppointmentRepositoryInterface $appointmentRepository) {}

    /**
     * @throws Throwable
     */
    public function __invoke(AppointmentRequest $request)
    {
        try {
            DB::beginTransaction();
            $appointmentDto = AppointmentDTO::fromArray($request->validated());
            $appointment = $this->appointmentRepository->create($appointmentDto->toArray());
            DB::commit();

            return $appointment;
        } catch (Throwable $throwable) {
            DB::rollBack();

            throw $throwable;
        }
    }
}
