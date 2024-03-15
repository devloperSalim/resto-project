<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable =  ['title','description','slug','price','image','category_id'];

    public function Category(){

        return $this->belongsTo(Category::class);// hadi kat3ni kola menu tab3 lwahd lcategory
    }

    public function sales(){

        return $this->belongsToMany(Sales::class);//wahd lmenu tkon tab3a lbzaf dyal les bi3a

    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
