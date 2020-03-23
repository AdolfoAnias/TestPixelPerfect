<?php

namespace App\Repositories;

use App\Contracts\ICompaniesRepository;
use App\Models\Companies;

class CompaniesRepository implements ICompaniesRepository {

    protected $companiesRepo;

    public function __construct(Companies $companies) {
        $this->companiesRepo = $companies;
    }

    public function paginate($limit = 10) {
        return $this->companiesRepo->paginate($limit);
    }
    
    public function all() {
        return $this->companiesRepo->all();
    }

    public function create(array $data) {
        return $this->companiesRepo->create($data);     
    }

    public function update($att, $column, $data) {
        return $this->companiesRepo->where($att, $column)->update($data);
    }

    public function findBy($att, $column) {
        return $this->companiesRepo->where($att, $column)->get();
    }

    public function delete($id){
        return $this->companiesRepo->find($id)->delete();        
    }   
    
}

