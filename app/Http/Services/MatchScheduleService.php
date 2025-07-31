<?php

namespace App\Http\Services;

use App\Http\Repositories\MatchScheduleRepository;

class MatchScheduleService
{
    protected $repo;

    public function __construct(MatchScheduleRepository $repo)
    {
        $this->repo = $repo;
    }

    public function list()
    {
        return $this->repo->all();
    }

    public function get($id)
    {
        return $this->repo->find($id);
    }

    public function create(array $data)
    {
        return $this->repo->create($data);
    }

    public function update($id, array $data)
    {
        $ms = $this->repo->find($id);
        return $this->repo->update($ms, $data);
    }

    public function delete($id)
    {
        $ms = $this->repo->find($id);
        return $this->repo->delete($ms);
    }
}
