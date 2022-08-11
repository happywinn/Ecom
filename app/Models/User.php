<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;
use DB;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
        'google_id',
    ];

    public $incrementing = false;

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // static function generateRandomNumber() {
    //     $number = mt_rand(100000000, 999999999); // better than rand()
    //     return $number;
    // }


    // public static function boot()
    // {
    //     parent::boot();

    //     static::creating(function($table)
    //     {
    //         $table->id = self::generateRandomNumber();
    //     });
    // }

    public static function generateUserid(int $length = 8): string
    {
        $user_id = Str::random($length);//Generate random string
        $exists = DB::table('users')
            ->where('id', '=', $user_id)
            ->get(['id']);//Find matches for id = generated id
        if (isset($exists[0]->id)) {//id exists in users table
            return self::generateUserid();//Retry with another generated id
        }
        return $user_id;//Return the generated id as it does not exist in the DB
    }
}
