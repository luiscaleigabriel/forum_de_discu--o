<?php

namespace App\Services;

use App\DTO\{
    CreateSupportDTO,
    UpdateSupportDTO
};
use App\Repositories\SupportRepositoryInterface;
use stdClass;

class SupportService
{
    public function __construct(
        protected SupportRepositoryInterface $repository
    )
    {}

    public function getAll(string $filter = null): array
    {
        return $this->repository->getAll($filter);
    }

    public function paginate(int $page = 1, int $totalPerPages = 15 , string $filter = null)
    {
        return $this->repository->paginate(page: $page,totalPerPages: $totalPerPages,filter: $filter);
    }

    public function findOne(string|int $id): stdClass|null
    {
        return $this->repository->findOne($id);
    }

    public function new(CreateSupportDTO $dto): stdClass
    {
        return $this->repository->new($dto);
    }

    public function update(UpdateSupportDTO $dto): stdClass|null
    {
        return $this->repository->update($dto);
    }

    public function delete(string|int $id): void
    {
        $this->repository->delete($id);
    }
}
