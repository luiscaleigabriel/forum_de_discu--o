<?php

namespace App\Repositories;

use App\DTO\{
    CreateSupportDTO,
    UpdateSupportDTO
};
use App\Models\Support;
use App\Repositories\Presenter\PaginationPresenter;
use stdClass;

class SupportEloquentORM implements SupportRepositoryInterface
{
    public function __construct(
        protected Support $model
    )
    {}

    public function paginate (int $page = 1, int $totalPerPages = 15 , string $filter = null): PaginationInterface
    {
        $result = $this->model
                    ->where(function ($query) use ($filter) {
                        if ($filter) {
                            $query->where('subject', $filter);
                            $query->orwhere('body', 'like', "%$filter%");
                        }
                    })
                    ->paginate($totalPerPages, ['*'], 'page', $page);

        return (new PaginationPresenter($result));
    }

    public function getAll(string $filter = null): array
    {
        return $this->model
                    ->where(function ($query) use ($filter) {
                        if ($filter) {
                            $query->where('subject', $filter);
                            $query->orwhere('body', 'like', "%$filter%");
                        }
                    })
                    ->get()
                    ->toArray();
    }

    public function findOne(string|int $id): stdClass|null
    {
        $support = $this->model->find($id);
        if (!$support) {
            return null;
        }

        return (object) $support->toArray();
    }

    public function new(CreateSupportDTO $dto): stdClass
    {
        $support = $this->model->create((array) $dto);
        return (object) $support->toArray();
    }

    public function update(UpdateSupportDTO $dto): stdClass|null
    {
        $support = $this->model->find($dto->id);

        if (!$support) {
            return null;
        }

        $support->update((array) $dto);

        return (object) $support->toArray();
    }

    public function delete(string|int $id): void
    {
        $this->model->findOrFail($id)->delete();
    }
}
