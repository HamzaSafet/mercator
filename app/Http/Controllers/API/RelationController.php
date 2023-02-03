<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRelationRequest;
use App\Http\Resources\Admin\RelationResource;
use App\Relation;
use Gate;
use Illuminate\Http\Response;

class RelationController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('relation_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $relations = Relation::all();

        return response()->json($relations);
    }

    public function store(StoreRelationRequest $request)
    {
        abort_if(Gate::denies('relation_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $relation = Relation::create($request->all());
        // syncs
        // $relation->roles()->sync($request->input('roles', []));

        return response()->json($relation, 201);
    }

    public function show(Relation $relation)
    {
        abort_if(Gate::denies('relation_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new RelationResource($relation);
    }

    public function update(StoreRelationRequest $request, Relation $relation)
    {
        abort_if(Gate::denies('relation_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $relation->update($request->all());
        // syncs
        // $relation->roles()->sync($request->input('roles', []));

        return response()->json();
    }

    public function destroy(Relation $relation)
    {
        abort_if(Gate::denies('relation_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $relation->delete();

        return response()->json();
    }
}
