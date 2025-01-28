<?php

declare(strict_types=1);

namespace Modules\Appointment\Actions;

use Illuminate\Support\Facades\DB;
use Modules\Appointment\DTOs\AppointmentDTO;
use Modules\Appointment\Http\Requests\AppointmentRequest;
use Modules\Appointment\Jobs\SendAppointmentEmails;
use Modules\Appointment\Repositories\Interfaces\AppointmentRepositoryInterface;
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

            SendAppointmentEmails::dispatch($appointment);

            return $appointment;
        } catch (Throwable $throwable) {
            DB::rollBack();

            throw $throwable;
        }
    }
}
