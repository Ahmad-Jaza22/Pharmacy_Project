<?php

include 'report_stock_model.php';

$model = new Model();

    $rows = $model->fetch();


echo json_encode($rows);