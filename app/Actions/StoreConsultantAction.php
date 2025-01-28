<?php

declare(strict_types=1);

namespace App\Actions;

use App\DTOs\ConsultantDTO;
use App\Http\Requests\ConsultantRequest;
use App\Repositories\Interfaces\ConsultantRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Throwable;

readonly class StoreConsultantAction
{
    public function __construct(public ConsultantRepositoryInterface $consultantRepository) {}

    /**
     * @throws Throwable
     */
    public function __invoke(ConsultantRequest $request)
    {
        try {
            DB::beginTransaction();
            $consultantDto = ConsultantDTO::fromArray($request->validated());
            $consultant = $this->consultantRepository->create($consultantDto->toArray());
            DB::commit();

            return $consultant;
        } catch (Throwable $throwable) {
            DB::rollBack();

            throw $throwable;
        }
    }
}
