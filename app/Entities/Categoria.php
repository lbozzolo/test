<?php namespace App\Entities;

class Categoria extends Entity
{
    protected $table = 'categorias';

    protected $fillable = [];

    //Relaciones

    public function servicios()
    {
        return $this->hasMany(Servicio::getClass());
    }

}
