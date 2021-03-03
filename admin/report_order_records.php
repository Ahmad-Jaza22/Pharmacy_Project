<?php

include 'report_order_model.php';

$model = new Model();
    $rows = $model->fetch();


echo json_encode($rows);