<?php

namespace App\Repositories;

use App\Models\Produto;
use App\Repositories\Contracts\ProdutoRepositoryInterface;

class ProdutoRepository implements ProdutoRepositoryInterface
{
    private $produtoModel;

    public function __construct(Produto $produtoModel)
    {
        $this->produtoModel = $produtoModel;
    }

    public function all()
    {
        return $this->produtoModel->orderBy('nome')->get();
    }

    public function find($id)
    {
        return $this->produtoModel->find($id);
    }

    public function create($dados)
    {
        return $this->produtoModel->create($dados);
    }

    public function update($dados, $id)
    {
        $produto = $this->find($id);
        $produto->update($dados);
        return $produto->fresh();
    }

    public function delete($id)
    {
        $produto = $this->find($id);
        $produto->delete();
        return ['id' => $id, 'message' => 'Produto excluído com sucesso.'];
    }
}
