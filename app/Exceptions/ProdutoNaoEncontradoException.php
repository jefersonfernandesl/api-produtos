<?php

namespace App\Exceptions;

use Exception;

class ProdutoNaoEncontradoException extends Exception
{
    protected $codigoHttp = 404;
}
