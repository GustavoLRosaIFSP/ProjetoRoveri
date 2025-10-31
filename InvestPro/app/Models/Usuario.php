<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    public $id;
    public $nome;
    public $email;
    public $criandoEm;
    public $status;

}
