<?php

namespace App\Http\Controllers;

abstract class Controller
{
    protected $fillable = [
        'nome',
        'marca',
        'preco'
    ];
}
