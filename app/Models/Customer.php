<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'address_id',
        'name',
        'surname',
        'phone',
        'quantity',
        'returned',
        'date',
    ];

    protected $casts = [
        'date' => 'datetime',
    ];

    public function address()
    {
        return $this->belongsTo(Address::class);
    }
}
