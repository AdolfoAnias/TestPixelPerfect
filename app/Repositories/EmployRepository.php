<?php

namespace App\Repositories;

use App\Contracts\IEmployRepository;
use App\Models\Employees;

class EmployRepository implements IEmployRepository {

    protected $employeesRepo;

    public function __construct(Employees $employees) {
        $this->employeesRepo = $employees;
    }

    public function all() {
        return $this->employeesRepo->all();
    }

    public function paginate($limit = 10) {
        return $this->employeesRepo->paginate($limit);
    }
    
    public function create(array $data) {
        return $this->employeesRepo->create($data);     
    }

    public function update($att, $column, $data) {
        return $this->employeesRepo->where($att, $column)->update($data);
    }

    public function findBy($att, $column) {
        return $this->employeesRepo->where($att, $column)->get();
    }
    
    public function delete($id){
        return $this->employeesRepo->find($id)->delete();        
    }   

}

