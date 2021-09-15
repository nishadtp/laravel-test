<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'name', 'code', 'price', 'gst','image' ];

    public function getImage()
    {
    	return asset("storage/uploads/product/{$this->image}");
    }

   
}
