<?php namespace App\Entities;

class Color extends Entity
{
    protected $table = 'colores';

    protected $fillable = [];

    //Relaciones

    public function productos()
    {
        return $this->morphedByMany(Product::getClass(), 'colorables');
    }

    public function usuarios()
    {
        return $this->morphedByMany(User::getClass(), 'colorables');
    }

}
