<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InventoryMovementResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $inventory = $this->resource;

        return [
            'id'            => $inventory->getId(),
            'productId'     => $inventory->getProductId(),
            'type'          => $inventory->getType(),
            'quantity'      => $inventory->getQuantity(),
            'movementDate'  => $inventory->getMovementDate(),
            'description'   => $inventory->getDescription(),
            'createdAt'     => $inventory->getCreatedAt(),
            'updatedAt'     => $inventory->getUpdatedAt(),
        ];
    }
}
