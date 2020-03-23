<?php

namespace App\Contracts;

interface ICompaniesRepository {

    public function all();

    public function paginate($limit); 
    
    public function create(array $data);

    public function update($att, $column, $data);

    public function findBy($att, $column);
}

