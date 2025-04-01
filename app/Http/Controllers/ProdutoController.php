<?php

namespace App\Http\Controllers;

use App\Exceptions\ProdutoNaoEncontradoException;
use App\Http\Requests\ProdutoFormRequest;
use App\Services\ProdutoService;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    private $produtoService;

    public function __construct(ProdutoService $produtoService)
    {
        $this->produtoService = $produtoService;
    }

    private function response($success, $message, $data = null, $statusCode = 200)
    {
        return response()->json([
            'success' => $success,
            'message' => $message,
            'data' => $data
        ], $statusCode);
    }

    public function all()
    {
        $produtos = $this->produtoService->all();
        return $this->response(true, 'Lista de produtos recuperada com sucesso.', $produtos);
    }

    public function find($id)
    {
        try {
            $produto = $this->produtoService->find($id);
            return $this->response(true, 'Produto encontrado.', $produto);
        } catch (ProdutoNaoEncontradoException $e) {
            return $this->response(false, $e->getMessage(), null, 404);
        } catch (\Exception $e) {
            return $this->response(false, 'Erro interno.', null, 500);
        }
    }

    public function create(ProdutoFormRequest $request)
    {
        try {
            $produto = $this->produtoService->create($request->all());
            return $this->response(true, 'Produto criado com sucesso.', $produto, 201);
        } catch (\Exception $e) {
            return $this->response(false, 'Erro ao criar produto.', null, 500);
        }
    }

    public function update(ProdutoFormRequest $request, $id)
    {
        try {
            $produto = $this->produtoService->update($request->all(), $id);
            return $this->response(true, 'Produto atualizado com sucesso.', $produto);
        } catch (ProdutoNaoEncontradoException $e) {
            return $this->response(false, $e->getMessage(), null, 404);
        } catch (\Exception $e) {
            return $this->response(false, 'Erro ao atualizar produto.', null, 500);
        }
    }

    public function delete($id)
    {
        $deleted = $this->produtoService->delete($id);

        if (!$deleted) {
            return $this->response(false, 'Produto não encontrado.', null, 404);
        }

        return $this->response(true, 'Produto excluído com sucesso.');
    }
}
