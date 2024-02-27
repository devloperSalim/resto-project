<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['title','slug'];
    public function menu()
    {
        return $this->hasMany(Menu::class); // hadi kat3ni kola category 3andha bzaf dyal menu
    }

    public function getRouteKeyName()
    {
        return  'slug';
    }
}
