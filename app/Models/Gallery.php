<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Gallery extends Model
{
    
    use HasFactory;
    protected $table = 'galleries';
    protected $guarded = [];

    public function categories(){
        return $this->hasOne(Category::class,'id','category');
    }
}
    
