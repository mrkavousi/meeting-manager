<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryMovement extends Model
{
    use HasFactory;

    protected $fillable = ['item_id', 'type', 'quantity', 'description'];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
