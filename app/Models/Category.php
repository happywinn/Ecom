<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = "categories";
    protected $fillable = [
        'name',
		'slug',
	    'description',
		'status',
		'popular',
		'image',
		'meta_title',
		'meta_descrip',
		'meta_keywords',
    ];

    public function brand()
    {
        return $this->hasMany(Brand::class,'cate_id','id')->where('status','0');
        // Category::class, foreignKey,primaryKey 
    }

}
