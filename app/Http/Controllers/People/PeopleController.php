<?php

namespace App\Http\Controllers\People;

use App\Http\Controllers\Controller;
use App\Http\Requests\Person\StoreRequest;
use App\Http\Requests\Person\UpdateRequest;
use App\Http\Resources\Person\PersonResource;
use App\Models\People;

class PeopleController extends Controller
{
    public function index()
    {
        $people = People::all();
        return PersonResource::collection($people);
    }

    public function show(People $person)
    {
        return new PersonResource($person);
    }

    public function store(StoreRequest $request) {
        $data = $request->validated();
        People::create($data);
        return response([]);
    }

    public function update(UpdateRequest $request, People $person) {
        $data = $request->validated();
        $person->update($data);
        return response([]);
    }

    public function destroy(People $person) {
        $person->delete();
        return response([]);
    }
}
