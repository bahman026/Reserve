<?php

declare(strict_types=1);

namespace Modules\Consultant\Actions;

use Illuminate\Support\Facades\DB;
use Modules\Consultant\DTOs\ConsultantDTO;
use Modules\Consultant\Http\Requests\ConsultantRequest;
use Modules\Consultant\Repositories\Interfaces\ConsultantRepositoryInterface;
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
