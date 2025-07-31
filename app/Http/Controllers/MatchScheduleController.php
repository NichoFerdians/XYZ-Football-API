<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Services\MatchScheduleService;
use App\Http\Requests\StoreMatchScheduleRequest;
use App\Http\Requests\UpdateMatchScheduleRequest;

class MatchScheduleController extends Controller
{
    protected $svc;

    public function __construct(MatchScheduleService $svc)
    {
        $this->svc = $svc;
    }

    public function index()
    {
        return response()->json($this->svc->list());
    }

    public function show($id)
    {
        return response()->json($this->svc->get($id));
    }

    public function store(StoreMatchScheduleRequest $request)
    {
        return response()->json($this->svc->create($request->validated()), 201);
    }

    public function update(UpdateMatchScheduleRequest $request, $id)
    {
        try {
            $result =$this->svc->update($id, $request->validated());
        } catch (\Throwable $e) {
            return response()->json(['messages'=> $e->getMessage()], 422);
        }
        return response()->json($result);
    }

    public function destroy($id)
    {
        try {
            $result = $this->svc->delete($id);
        } catch (\Throwable $e) {
            return response()->json(['messages'=> $e->getMessage(), 'deleted' => false], 422);
        }
        return response()->json(['deleted' => $result]);
    }
}
