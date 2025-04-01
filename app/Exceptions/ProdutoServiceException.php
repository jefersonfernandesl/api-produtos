<?php

namespace App\Exceptions;

use Exception;

class ProdutoServiceException extends Exception
{
    protected $codigoHttp = 500;
}
