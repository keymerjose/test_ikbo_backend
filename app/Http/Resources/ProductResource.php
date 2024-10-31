<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $product = $this->resource;

        return [
            'id'            => $product->getId(),
            'name'          => $product->getName(),
            'sku'           => $product->getSku(),
            'expiry_date'   => $product->getExpiryDate(),
            'movements'     => InventoryMovementResource::collection($this->movements),
            'status'        => $product->getStatus(),
            'summary'       => $product->getSummary(),
            'createdAt'     => $product->getCreatedAt(),
            'updatedAt'     => $product->getUpdatedAt(),
        ];
    }
}
