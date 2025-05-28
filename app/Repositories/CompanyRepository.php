<?php

namespace App\Repositories;

use App\Interface\CompanyRepositoryInterface;
use App\Models\Company;

class CompanyRepository implements CompanyRepositoryInterface
{

    public function all()
    {
        return Company::all();
    }

    public function paginated($perPage)
    {
        return Company::paginate($perPage);
    }

    public function find($id)
    {
        return Company::findOrFail($id);
    }

    public function create(array $data)
    {
        return Company::create($data);
    }

    public function update($id, array $data)
    {
        $company = Company::findOrFail($id);
        $company->update($data);
        return $company;
    }

    public function delete($id)
    {
        Company::destroy($id);
    }
}
