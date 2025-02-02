<?php

declare(strict_types=1);

namespace Modules\Appointment\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Modules\Appointment\Actions\StoreAppointmentAction;
use Modules\Appointment\Http\Requests\AppointmentRequest;
use Modules\Appointment\Http\Resources\AppointmentResource;
use Modules\Appointment\Models\Appointment;
use Modules\Appointment\Repositories\Interfaces\AppointmentRepositoryInterface;
use Throwable;

class AppointmentController extends Controller
{
    public function __construct(readonly AppointmentRepositoryInterface $appointmentRepository) {}

    /**
     * List all appointments with clients and appointments.
     */
    public function index(): JsonResponse
    {
        $appointments = $this->appointmentRepository->getAllAppointments();

        return response()->json(AppointmentResource::collection($appointments), 200);
    }

    /**
     * Create a new appointment
     */
    public function store(AppointmentRequest $request, StoreAppointmentAction $storeAppointmentAction): JsonResponse
    {
        try {
            $appointment = $storeAppointmentAction($request);

            return response()->json([
                'message' => trans('appointment::appointment.appointment_created_successfully'),
                'appointment' => new AppointmentResource($appointment),
            ], 201);
        } catch (Throwable $throwable) {
            return response()->json([
                'message' => trans('appointment::appointment.error_creating_appointment'),
                'error' => $throwable->getMessage(),
            ], 500);
        }
    }

    /**
     * Show a specific appointment
     */
    public function show(Appointment $appointment): JsonResponse
    {
        $appointment->load('consultant', 'client');

        return response()->json(new AppointmentResource($appointment), 200);
    }
}
