<?php

include_once('../model/db.php');
include_once('../controller/getDataController.php');

$data = get_data($db, 'usuario');
echo "<pre>";
print_r($data);
echo "</pre>";
