<?php

namespace App\Services;

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
    public function new(
        string $subject,
        string $status,
        string $body,
    ): stdClass
    {
        $this->repository->new( 
            $subject,
            $status, 
            $body,
        );
    }

    public function update(
        string $id,
        string $subject,
        string $status,
        string $body,
    ): stdClass|null 
    {
        $this->repository->update( 
            $id,
            $subject,
            $status, 
            $body,
        );
    }


    public function delete(): void
    {
        $this->repository->delete($id);
    }
}