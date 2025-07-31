<?php

namespace App\Http\Repositories;

use App\Models\MatchSchedule;

class MatchScheduleRepository
{
    public function all()
    {
        return MatchSchedule::with(['homeTeam','awayTeam'])->get();
    }

    public function find($id)
    {
        return MatchSchedule::with(['homeTeam','awayTeam'])->findOrFail($id);
    }

    public function create(array $data)
    {
        return MatchSchedule::create($data);
    }

    public function update(MatchSchedule $ms, array $data)
    {
        $ms->update($data);
        return $ms;
    }

    public function delete(MatchSchedule $ms)
    {
        return $ms->delete();
    }
}
