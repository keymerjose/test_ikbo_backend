<?php

namespace App\Http\Controllers;

use App\Http\Requests\InventoryMovementRequest;
use App\Http\Resources\InventoryMovementResource;
use App\Models\InventoryMovement;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class InventoryMovementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $inventory = InventoryMovement::all();
        return InventoryMovementResource::collection($inventory);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(InventoryMovementRequest $request): InventoryMovementResource
    {
        $inventory = InventoryMovement::create($request->validated());
        return new InventoryMovementResource($inventory);    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        InventoryMovement::destroy($id);
        return $id;
    }

    public function getInventoryByProduct($id): AnonymousResourceCollection
    {
        $inventory = InventoryMovement::where('product_id', $id)->get();
        return InventoryMovementResource::collection($inventory);
    }
}
