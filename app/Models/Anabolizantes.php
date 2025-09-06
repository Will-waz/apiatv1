<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anabolizantes extends Model
{
    protected $table = 'anabolizantes';
    protected $fillable = [
        'nome',
        'loja',
        'preco',
        'quantidade'
    ];
}
