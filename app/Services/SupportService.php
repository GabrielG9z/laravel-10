<?php

namespace App\Services;

use App\DTO\{CreateSupportDTO, UpdateSupportDTO};
use App\Repositories\SupportRepositoryInterface;
use GuzzleHttp\Promise\Create;
use \stdClass;


class SupportService
{

    public function __construct(
        protected SupportRepositoryInterface $repository
    ) {
        $this->repository = $repository;
    }

    public function getAll(string $filter = null): array
    {
        // Retorna o valor obtido do método getAll() do repositório
        return $this->repository->getAll($filter);
    }

    // Esta lógica não depende do Eloquent ORM
    public function findOne(string $id): ?stdClass
    {
        // Retorna o valor obtido do método findOne() do repositório
        return $this->repository->findOne($id);
    }


    //Retorne uma classe genérica
    public function new(CreateSupportDTO $dto): stdClass
    {
        return $this->repository->new($dto);
    }

    public function update(UpdateSupportDTO $dto): ?stdClass
    {
        return $this->repository->update($dto);
    }

    // Corrigido para passar o parâmetro $id para o método delete()
    public function delete(string $id): void
    {
        $this->repository->delete($id);
    }
}