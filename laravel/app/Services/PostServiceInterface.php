<?php

namespace App\Services;

interface PostServiceInterface
{
    public function all();

    public function create($data);

    public function delete($id);

    public function update($id, $data);

    public function find($id);
}