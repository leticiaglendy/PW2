<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    use HasFactory;

    protected $table = 'tbContato';

    public $fillable = ['id_contato','nome','email','telefone'];

    public $timestamps = false;  
    //protected $table = 'tbContato';
    //use HasFactory;
}
