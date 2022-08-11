<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrderItem;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        'id',
        'user_id',
    	'fname',
    	'lname',
    	'email',
    	'phone',
    	'address1',
    	'address2',
    	'city',
    	'state',
    	'country',
    	'pincode',
        'total_price',
        'payment_mode',
        'payment_id',
    	'status',
    	'message',
    	'tracking_no',
    ];

    public $incrementing = false;

    public function orderitems()
    {
        return $this->hasMany(OrderItem::class);
    }


    public static function generateRandomNumber() {
        $number = mt_rand(100000000, 999999999); // better than rand()
        return $number;
    }


    // public static function boot()
    // {
    //     parent::boot();

    //     static::creating(function($table)
    //     {
    //         $table->id = self::generateRandomNumber();
    //     });
    // }

    
}
