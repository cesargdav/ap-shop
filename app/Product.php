<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //Seleccionar las categorias a las que pertenece el producto
    public function category(){
        return $this->belongsTo(Category::class);
    }

    //SAeleccionar las imagenes que pertenecen al producto
    public function images(){
        return $this->hasMany(ProductImage::class);
    }

    public function getFeaturedImageUrlAttribute(){
        $featuredImage = $this->images()->where('featured', true)->first();
        if(!$featuredImage)
            $featuredImage = $this->images()->first();
        
        if($featuredImage){
            return $featuredImage->url;
        }
        return '/images/products/default.png';
    }
}
