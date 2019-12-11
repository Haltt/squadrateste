<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cadastro extends Model
{
    public $timestamps = false;
    protected $dateFormat = 'Y-m-d H:i:s';
    const CREATED_AT = 'dataDoCadastro';
    const UPDATED_AT = 'dataDoCadastro';
    protected $dates = ['dataDoCadastro'];
    protected $fillable = ['nome', 'valor', 'descricao', 'dataDoCadastro'];
}
