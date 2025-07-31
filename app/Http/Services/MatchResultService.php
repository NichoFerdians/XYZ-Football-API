<?php

namespace App\Http\Services;

use App\Http\Repositories\MatchResultRepository;

class MatchResultService
{
    protected $repo;
    public function __construct(MatchResultRepository $r)
    {
        $this->repo = $r;
    }

    public function list() { return $this->repo->all(); }
    public function get($id) { return $this->repo->find($id); }
    public function create($data) { return $this->repo->create($data); }
    public function update($id,$data){
        $res = $this->repo->find($id);
        return $this->repo->update($res,$data);
    }
    public function delete($id){
        $res = $this->repo->find($id);
        return $this->repo->delete($res);
    }
}
