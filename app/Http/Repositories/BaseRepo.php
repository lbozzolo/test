<?php namespace App\Http\Repositories;

abstract class BaseRepo
{
    protected $model;

    public function __construct()
    {
        $this->model = $this->getModel();
    }

    public abstract function getModel();

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function findOrFail($id)
    {
        return $this->model->findOrFail($id);
    }

    public function massCreate($datos)
    {
        return $this->model->create($datos);
    }

    public function massEdit($model, $datos)
    {
        $model->fill($datos);
        $model->save();

        return $model;
    }

    public function all()
    {
        return $this->model->all();
    }
}