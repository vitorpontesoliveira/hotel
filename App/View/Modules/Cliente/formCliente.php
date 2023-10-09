<?php

require '../configs/config.php';

$smarty->assign('model', $model);
$smarty->display('formCliente.tpl');

