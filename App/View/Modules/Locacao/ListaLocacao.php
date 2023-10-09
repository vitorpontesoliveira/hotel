<?php

require '../configs/config.php';

$smarty->assign('model', $model);
$smarty->assign('model2', $model2);
$smarty->display('listaLocacao.tpl');