<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TesteModel extends Model
{
    // se quiser definir qual é a tabela do model.
    protected $table = 'products';

    // se quiser definir qual é a chave primária do model.
    protected $primaryKey = 'id';

    public $incrementing = false; // se a chave primária é auto-incrementada ou não

    protected $keyType = 'string'; // se a chave primária é do tipo string ou int

    public $timestamps = false; // se o model tem timestamps (created_at, updated_at) ou não

    protected $dataFormat = 'Y-m-d H:i:s'; // formato de data usado pelo model

    const CREATED_AT = 'data_criacao'; // nome da coluna de criação
    const UPDATED_AT = 'data_atualizacao'; // nome da coluna de atualização

    protected $connection = 'mysql_new'; // se quiser definir qual é a conexão do model.
}
