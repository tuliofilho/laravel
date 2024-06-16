<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agendamento extends Model
{
    use HasFactory;

    protected $fillable = [
        'paciente_id', 'data', 'descricao'
    ];

    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }
}
