<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','quantity','total_price','total_received','change','payment_type','payment_status'];


    public function menus()
    {
        $this->belongsToMany(Menu::class);//i9dar wagd lmabi3a fiha bzzaf dyal les menu
    }

    public function tables()
    {
        return $this->belongsToMany(Table::class); //wahd lmabi3a t9dar tkon fbzaf dyal les tables
    }

    public function servant()
    {
        return $this->belongsTo(Servant::class);//KOLA Sales tab3a lwahd serveur
    }
}
