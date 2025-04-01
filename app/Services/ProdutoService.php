<?php 

namespace App\Services;

use App\Exceptions\ProdutoNaoEncontradoException;
use App\Repositories\Contracts\ProdutoRepositoryInterface;

class ProdutoService 
{
    private $produtoRepository;

    public function __construct(ProdutoRepositoryInterface $produtoRepository) 
    {
        $this->produtoRepository = $produtoRepository;
    }

    public function all() 
    {
        return $this->produtoRepository->all();
    }

    public function find($id) 
    {
        $produto = $this->produtoRepository->find($id);
        if(!$produto) {
            throw new ProdutoNaoEncontradoException('Produto não encontrado.');
        }

        return $produto;
    }

    public function create($dados) 
    {
        return $this->produtoRepository->create($dados);
    }
    
    public function update($dados, $id) 
    {
        $this->find($id);
        return $this->produtoRepository->update($dados, $id);
    }

    public function delete($id) 
    {
        $this->find($id);
        return $this->produtoRepository->delete($id);
    }
}