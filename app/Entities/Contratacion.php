<?php namespace App\Entities;


class Contratacion extends Entity
{
    protected $table = 'contrataciones';
    //protected $primaryKey = 'id';

    protected $fillable = [];

    public function contratacion()
    {
    	return $this->morphTo();
    }
}
