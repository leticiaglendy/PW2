<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Produto extends Model
{

    use HasFactory;

    protected $table = 'tbProduto';

    public $fillable = ['id_produto','nome_produto','quantidade','descricao','valor','data_cadastro'];

    public $timestamps = false;   

   // protected $table = 'tbProduto';
    //use HasFactory;
}
