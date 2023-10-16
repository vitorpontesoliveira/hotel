<?php

namespace App\Controller;

use Smarty;

abstract class Controller
{
    protected $smarty;

    public function __construct()
    {
        $this->initializeSmarty();
    }

    private function initializeSmarty()
    {
        $this->smarty = new Smarty();
        $this->smarty->setTemplateDir('../templates/');
        $this->smarty->setCompileDir('../templates_c/');
        $this->smarty->setCacheDir('../cache/');
        $this->smarty->setConfigDir('../configs/');
    }

    protected function render($view, $params)
    {
        $arquivo_view = VIEWS . $view . ".tpl";

        if (!file_exists($arquivo_view))
            exit('Arquivo da View não existe. Arquivo: ' . $view);

        foreach ($params as $key => $value) {
            $this->smarty->assign($key, $value);
        }
        $this->smarty->display($arquivo_view);
    }
}
