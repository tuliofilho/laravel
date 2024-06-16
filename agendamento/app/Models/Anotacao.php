<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anotacao extends Model
{
    use HasFactory;

    protected $table = 'anotacoes'; // Especificar o nome da tabela

    protected $fillable = ['paciente_id', 'anotacao'];

    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }
}