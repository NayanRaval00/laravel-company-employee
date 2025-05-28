<?php

namespace App\Interface;

interface CompanyRepositoryInterface
{
    public function all();
    public function paginated($perPage);
    public function find($id);
    public function create(array $data);
    public function update($id, array $data);
    public function delete($id);
}
