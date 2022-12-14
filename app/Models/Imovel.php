<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imovel extends Model
{
    use HasFactory;

    protected $table = 'imoveis';

    protected $fillable = [
        'salas',
        'preco',
        'titulo',
        'terreno',
        'garagens',
        'descricao',
        'banheiros',
        'dormitorios',
        'tipo_id',
        'cidade_id',
        'finalidade_id',

    ];

    public function endereco()
    {
        return $this->hasOne(Endereco::class);
    }

    public function cidade()
    {
        return $this->belongsTo(Cidade::class);
    }

    public function finalidade()
    {
        return $this->belongsTo(Finalidade::class);
    }

    public function tipo()
    {
        return $this->belongsTo(Tipo::class);
    }

    public function proximidades()
    {
        return $this->belongsToMany(Proximidade::class)->withTimestamps();
    }

    public function fotos()
    {
        return $this->hasMany(Foto::class);
    }
}
