<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Services\TeamService;
use App\Http\Requests\StoreTeamRequest;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    protected $service;

    public function __construct(TeamService $service) { $this->service = $service; }

    public function index() {
        return response()->json($this->service->getAll());
    }

    public function store(StoreTeamRequest $request) {
        return response()->json($this->service->create($request->validated()), 201);
    }

    public function update(StoreTeamRequest $request, $id) {
        try {
            $result = $this->service->update($id, $request->validated());
        } catch (\Throwable $e) {
            return response()->json(['messages'=> $e->getMessage()], 422);
        }
        return response()->json($result);
    }

    public function destroy($id) {
        try {
            $result = $this->service->delete($id);
        } catch (\Throwable $e) {
            return response()->json(['messages'=> $e->getMessage(), 'deleted' => false], 422);
        }
        return response()->json(['deleted' => $result]);
    }
}
