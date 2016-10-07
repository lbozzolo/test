<?php namespace App\Entities;

class Product extends Entity
{
    protected $fillable = ['producto', 'precio', 'stock', 'users_id'];

    // Relaciones
    public function user()
    {
        return $this->belongsTo(User::getClass(), 'users_id');
    }

    public function colores()
    {
        return $this->morphToMany(Color::getClass(), 'colorables');
    }

    public function proveedores()
    {
        return $this->belongsToMany(Proveedor::getClass(), 'productos_proveedores', 'id_producto', 'id_proveedores')->withPivot('contratacion');
    }

}
