<?php
namespace App\Http\Services;

use App\Http\Repositories\PlayerRepository;

class PlayerService
{
    protected $repo;
    public function __construct(PlayerRepository $r){ $this->repo=$r; }

    public function list()       { return $this->repo->all(); }
    public function get($id)     { return $this->repo->find($id); }
    public function create($data){ return $this->repo->create($data); }
    public function update($id,$data){
        $p = $this->repo->find($id);
        return $this->repo->update($p,$data);
    }
    public function delete($id){
        $p = $this->repo->find($id);
        return $this->repo->delete($p);
    }
}
