<?php

namespace servicos\Http\Controllers;

use Request;

class pagination extends Controller
{
    public static function pagination(){
        $pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
        $offset = 5 * ($pagina - 1);
        $novaPagina = $pagina;
        $_POST['pagina'] = $novaPagina;
        $_POST['url'] = Request::url();
        $pagination = "LIMIT 5 OFFSET {$offset}";
        return $pagination;
    }
}
