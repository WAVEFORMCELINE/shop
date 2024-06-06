<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $guarded = false;
    protected $fillable=[
        'name',
        'price',
        'category_id',
        'sort_order'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    
    public function getImageUrlAttribute()
    {
        if($this->image){
            return url('storage/' . $this->image);
        }
        else{
            return url('storage/images/noimage.jpg');
        }
    }
}
