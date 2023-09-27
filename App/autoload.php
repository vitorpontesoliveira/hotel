<?php 

spl_autoload_register(function ($nome_da_class) {
    
    $arquivo = BASEDIR . str_replace('\\', '/', $nome_da_class) . '.php';
    if(file_exists($arquivo))
    {
        include $arquivo;
    } else{
        exit('Arquivo não encontrado. Arquivo: ' . $arquivo);
    }

});

