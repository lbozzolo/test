<?php namespace App\Entities;

class Servicios_proveedores extends Entity
{
    protected $table = 'servicios_proveedores';

    protected $fillable = [];


    public function servicios()
    {
        return $this->belongsToMany(Servicios::getClass());
                    
    }

}
