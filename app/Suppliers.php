<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suppliers extends Model
{
    public $table = "suppliers";
    public $fillable = ['name', 'telephone', 'address','cep','cnpj'];
}
