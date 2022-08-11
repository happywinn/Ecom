<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $table = 'brands';

    protected $fillable = [
    	'name',
    	'slug',
    	'status'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class,'cate_id','id');
        // Category::class, foreignKey,primaryKey 
    }

    public function product()
    {
        return $this->hasMany(Product::class,'brand_id','id');
        // Category::class, foreignKey,primaryKey 
    }
}
