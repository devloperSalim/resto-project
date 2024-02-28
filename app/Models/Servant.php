<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servant extends Model
{
    use HasFactory;

    protected $fillable = ['name','address'];

    public function sales()
    {
        return $this->hasMany(Sales::class);//kola serveur i9dar ibi3 bzaf dyal lmabi3at
    }
}
