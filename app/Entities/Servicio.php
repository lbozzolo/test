<?php namespace App\Entities;

class Servicio extends Entity
{
    protected $table = 'servicios';

    protected $fillable = [];

    public function categoria()
    {
        return $this->belongsTo(Categoria::getClass());
    }


    public function proveedores()
    {
        return $this->belongsToMany(Proveedor::getClass(), 'servicios_proveedores', 'id_servicio', 'id_proveedor')
                    ->withPivot('id_servicio', 'id_proveedor', 'precio','contratacion');
    }

    public function getIsActiveAttribute()
    {
        $reg = $this->proveedores()
            ->first();

        return (! is_null($reg));
        
    }

}
