<?php

require '../configs/config.php';

$smarty->assign('model', $model);
$smarty->display('listaQuarto.tpl');