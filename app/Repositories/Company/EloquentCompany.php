<?php

namespace App\Repositories\Company;

use App\Models\Domain\Company;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class EloquentCompany implements CompanyRepository
{
    public function __construct(private Company $company)
    {

    }

    public function All(): Collection
    {
        return $this->company::all();
    }

    public function create(array $data): Model
    {
        return $this->company::create($data);
    }

    public function getByNit(string $nit): Model
    {
        return $this->company::where('nit', $nit)->first();
    }

    public function update(int $id, array $data): bool
    {
        $company = $this->company->find($id);
        if ($company) {
            return $company->update($data);
        }
        return false;
    }

    public function delete(int $id): bool
    {
        $company = $this->company->find($id);
        if (!$company) {
            return false;
        }
        if ($company->status !== 'Inactivo') {
            return false;
        }
        return $company->delete();
    }
}