<?php namespace App\Entities;

class Proveedor extends Entity
{
    protected $table = 'proveedores';

    protected $fillable = [];

    //Relaciones

    /*public function poveedorRelacion()
    {
        return $this->$this->morphTo();
    }*/

    public function servicios_proveedores()
    {
        return $this->belongsToMany(Servicio::getClass(), 'servicios_proveedores', 'id_proveedor', 'id_servicio');
    }

    public function productos()
    {
        return $this->belongsToMany(Product::getClass(), 'productos_proveedores', 'id_proveedores', 'id_producto', 'contratacion');
    }

}
