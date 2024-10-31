<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InventoryMovement extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'type',
        'quantity',
        'movement_date',
        'description'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function getId(): int {
        return $this->getAttribute('id');
    }

    public function getProductId(): int {
        return $this->getAttribute('product_id');
    }
    
    public function getType(): string {
        return $this->getAttribute('type');
    }
    public function getQuantity(): string {
        return $this->getAttribute('quantity');
    }
    public function getMovementDate(): string {
        return $this->getAttribute('movement_date');
    }
    public function getDescription(): string | null {
        return $this->getAttribute('description');
    }
    public function getCreatedAt(): string {
        return $this->getAttribute('created_at');
    }
    public function getUpdatedAt(): string {
        return $this->getAttribute('updated_at');
    }
}
