<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'sku',
        'expiry_date',
    ];
    
    public function getId(): int {
        return $this->getAttribute('id');
    }
    public function getName(): string {
        return $this->getAttribute('name');
    }
    public function getSku(): string {
        return $this->getAttribute('sku');
    }
    public function getExpiryDate(): string {
        return $this->getAttribute('expiry_date');
    }
    public function getStatus(): string
    {
        $expiryDate = Carbon::parse($this->expiry_date);
        $now = Carbon::now();

        $daysUntilExpiry = $expiryDate->diffInDays($now);

        if ($daysUntilExpiry >= 0 && $daysUntilExpiry <= 3) {
            return 'Por vencer'; 
        }

        if ($expiryDate->isFuture()) {
            return 'Vigente'; 
        }

        return 'Vencido'; 
    }
    public function getSummary(): int
    {
        // Obtener todos los movimientos relacionados con el producto
        $movements = $this->movements;

        // Inicializar la suma
        $total = 0;

        // Calcular la sumatoria
        foreach ($movements as $movement) {
            if ($movement->type === 'entry') {
                $total += $movement->quantity; // Sumar si es entrada
            } elseif ($movement->type === 'exit') {
                $total -= $movement->quantity; // Restar si es salida
            }
        }

        return $total; // Retornar la sumatoria final
    }
    public function getCreatedAt(): string {
        return $this->getAttribute('created_at');
    }
    public function getUpdatedAt(): string {
        return $this->getAttribute('updated_at');
    }
    public function movements(): HasMany {
        return $this->hasMany(InventoryMovement::class, 'product_id', 'id');
    }
}
