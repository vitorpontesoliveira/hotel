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

    protected function render($view, ...$models)
    {
        $arquivo_view = VIEWS . $view . ".tpl";

        if (file_exists($arquivo_view)) {
            foreach ($models as $data) {
                foreach ($data as $prop => $value) {
                    $this->smarty->assign($prop, $value);
                }
            }

            $this->smarty->display($arquivo_view);
        } else {
            exit('Arquivo da View não existe. Arquivo: ' . $view);
        }
    }
}
