<?php

namespace servicos;

use Illuminate\Database\Eloquent\Model;

class informacao extends Model
{
    protected $fillable = ['id_usuario', 'id_permissao', 'cpf', 'contato', 'data_nascimento'];
}
