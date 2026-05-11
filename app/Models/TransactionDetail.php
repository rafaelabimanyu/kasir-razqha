<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;

class TransactionDetail extends Model
{
    use HasFactory;

    protected $fillable = ['transaction_id', 'menu_id', 'quantity', 'price'];

    public function transaction(): BelongsTo
    {
        return $this->belongsTo(Transaction::class);
    }

    public function menu(): BelongsTo
    {
        return $this->belongsTo(Menu::class);
    }

    protected static function booted()
    {
        static::created(function ($detail) {
            // Decrement stock automatically when a transaction detail is created
            DB::transaction(function () use ($detail) {
                $stock = Stock::where('menu_id', $detail->menu_id)->first();
                if ($stock) {
                    $stock->decrement('quantity', $detail->quantity);
                }
            });
        });
    }
}
