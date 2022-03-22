<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory,SoftDeletes;
        /**
         * Get the user that owns the Product
         *
         * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
         */
        public function categories()
        {
            return $this->belongsToMany(Category::class)->withTimestamps();
        }
        public function colors()
        {
            return $this->belongsToMany(Color::class)->withTimestamps();
        }
        public function sizes()
        {
            return $this->belongsToMany(Size::class)->withTimestamps();
        }
        public function product_galleries()
        {
            return $this->hasMany(ProductGalleries::class);
        }

    protected $fillable =['title','discription','short_discription','price','sale_price','additional_info','quantity','photo'];
}
