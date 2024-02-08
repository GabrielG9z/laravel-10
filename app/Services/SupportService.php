<?php

namespace App\Services;

use app\DTO\CreateSupportDTO;
use app\DTO\UpdateSupportDTO;
use GuzzleHttp\Promise\Create;
use stdClass;

class SupportService 
{
    protected $repository;


    public function  __construct() {
        
    }

    public function getAll(string $filter = null): array
    {
        $this->repository->getAll($filter);
    }
    //Esta lógica não depende do Eloquent ORM
    public function findOne(string $id): stdClass |null
    {
        $this->repository->findOne($id);
    }


    //Retorne uma classe genérica
    public function new(CreateSupportDTO $dto): stdClass
    {
        $this->repository->new($dto);
    }

    public function update(UpdateSupportDTO $dto): stdClass|null 
    {
        return $this->repository->update($dto);
    }


    public function delete(): void
    {
        $this->repository->delete($id);
    }
}