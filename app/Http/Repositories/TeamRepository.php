<?php

namespace App\Http\Repositories;

use App\Models\Team;

class TeamRepository
{
    public function all() { return Team::all(); }
    public function find($id) { return Team::findOrFail($id); }
    public function create(array $data) { return Team::create($data); }
    public function update(Team $team, array $data) { $team->update($data); return $team; }
    public function delete(Team $team) { return $team->delete(); }
}
