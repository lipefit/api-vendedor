<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = ['sale_value', 'commission', 'seller_id'];

    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }
}
