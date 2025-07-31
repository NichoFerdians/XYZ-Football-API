<?php

namespace App\Http\Services;

use App\Http\Repositories\TeamRepository;

class TeamService
{
    protected $repo;
    public function __construct(TeamRepository $repo) { $this->repo = $repo; }

    public function getAll() { return $this->repo->all(); }
    public function create(array $data) { return $this->repo->create($data); }
    public function update($id, array $data) {
        $team = $this->repo->find($id);
        return $this->repo->update($team, $data);
    }
    public function delete($id) {
        $team = $this->repo->find($id);
        return $this->repo->delete($team);
    }
}
