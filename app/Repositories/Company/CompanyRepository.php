<?php

namespace App\Repositories\Company;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;  

interface CompanyRepository
{
    public function All(): Collection;

    public function create(array $data): Model;

    public function getByNit(string $nit): Model;

    public function update(int $id, array $data): bool;

    public function delete(int $nit): bool;
}