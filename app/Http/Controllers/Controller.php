<?php

namespace App\Http\Controllers;

abstract class Controller
{
    protected $fillable = [
        'nome',
        'loja',
        'preco',
        'quantidade'
    ];
}
