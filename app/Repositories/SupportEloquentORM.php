<?php

namespace App\Repositories;

use App\DTO\{CreateSupportDTO, UpdateSupportDTO};
use App\Repositories\SupportRepositoryInterface;
use App\Models\Support;
use stdClass; // Adicionado para a declaração de stdClass

class SupportEloquentORM implements SupportRepositoryInterface {

     public function __construct(
         protected Support $model
     ) {}

     public function paginate(int $page = 1, int $totalPerPage = 15, string $filter = null): PaginationInterface {

        $result = $this->model
        ->where(function ($query) use ($filter){
            if ($filter) {
                $query->where('subject', $filter);
                $query->orWhere('body', 'like', "%$filter%"); // Corrigido para interpolação da variável
            }
        })
        ->paginate($totalPerPage, ['*'], 'page', $page);

        //Debugando o result para ver oque a programação acima irá retornar
        return new PaginationPresenter($result);


     }

    public function getAll(string $filter = null): array
    {
        return $this->model
            ->where(function ($query) use ($filter){
                if ($filter) {
                    $query->where('subject', $filter);
                    $query->orWhere('body', 'like', "%$filter%"); // Corrigido para interpolação da variável
                }
            })
            ->get()
            ->toArray();
    }

    public function findOne(string $id): ?stdClass {
        $support = $this->model->find($id);
        if (!$support) {
            return null;
        }
        return (object) $support->toArray();
    }

    public function delete(string $id): void
    {
        $this->model->findOrFail($id)->delete();
    }

    public function new(CreateSupportDTO $dto): stdClass
    {
        $support = $this->model->create(
            (array) $dto
        );
        return (object) $support->toArray();
    }

    public function update(UpdateSupportDTO $dto): ?stdClass
    {
        $support = $this->model->find($dto->id);

        if (!$support) {
            return null;
        }

        $support->update((array) $dto);

        return (object) $support->toArray();
    }
}
