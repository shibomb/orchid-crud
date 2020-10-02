<?php

namespace Orchid\Crud;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;

class ResourceRequest extends FormRequest
{
    /**
     * @return array
     */
    public function rules()
    {
        return [];
    }

    /**
     * Find the resource instance for the request.
     *
     * @return Resource
     */
    public function resource(): Resource
    {
        return $this->arbitrator()->findOrFail(
            $this->route('resource')
        );
    }

    /**
     * @return Arbitrator
     */
    public function arbitrator(): Arbitrator
    {
        return app(Arbitrator::class);
    }

    /**
     * @return Model
     */
    public function model(): Model
    {
        return $this->resource()->getModel();
    }

    /**
     * Find the model instance for the request.
     *
     * @return Model
     */
    public function findModelOrFail()
    {
        return $this->model()->findOrFail($this->route('id'));
    }
}