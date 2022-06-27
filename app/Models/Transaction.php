<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'fuel_id',
        'price',
        'cash_paid',
        'phone_number',
        'litres',
        'access_token',
        'status',  // NULL = Processing, 0 = Rejected, 1 = Approved.
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function fuel()
    {
        return $this->belongsTo(Fuel::class);
    }

}
