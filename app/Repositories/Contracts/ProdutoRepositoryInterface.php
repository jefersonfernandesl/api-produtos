<?php 

namespace App\Repositories\Contracts;

interface ProdutoRepositoryInterface 
{
    public function all();

    public function find($id);

    public function create($dados);

    public function update($dados, $id);

    public function delete($id);
}