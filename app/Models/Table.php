<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'slug', 'status'];

    public function sales(){
        return $this->belongsToMany(Sales::class);//wahd table i9dar ikon fiha wahd ola bzaf les menu
    }


    public function getRouteKeyName()
    {
        return  'slug';
    }

}
