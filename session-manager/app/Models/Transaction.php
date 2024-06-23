<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = ['accounting_book_id', 'type', 'amount', 'description'];

    public function accountingBook()
    {
        return $this->belongsTo(AccountingBook::class);
    }
}
