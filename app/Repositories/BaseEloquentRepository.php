<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class BaseEloquentRepository implements BaseRepository
{
    public function __construct(protected Model $model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function getAllDesc()
    {
        return  $this->model->latest()->get();
    }

    public function getDesc_Filtering(array $filters)
    {
        return $this->model->latest()->filter(request($filters))->get();
    }

    public function getDesc_Paginating(int $paginate)
    {
        return $this->model->latest()->paginate($paginate);
    }

    public function getDesc_Paginating_Filtering(int $paginate, array $filters)
    {
        return $this->model->latest()->filter(request($filters))->paginate($paginate);
    }

    public function find($id)
    {
        return $this->model->findOrFail($id);
    }

    public function create($formData)
    {
        return $this->model->create($formData);
    }

    public function update($model, $formData)
    {
        return $model->update($formData);
    }

    public function destroy($model)
    {
        return $model->destroy($model->id);
    }

    public function requestFileExists(string $file): bool
    {
        return request()->hasFile($file);
    }

    public function saveImage(string $file, string $path)
    {

        return request()->file($file)->store($path, 'public');
    }

    public function deleteImage($model)
    {
        return Storage::disk('public')->delete($model ?? '');
    }
}
