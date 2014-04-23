<?php

require_once ('./autoLoader.php');

$cpr = "1005891234";

$i = 0;
foreach ($_POST as $changeLine) {

    if ($changeLine !== "") {
        $id = array_keys($_POST)[$i];
        //var_dump($btn);
        $changeModel = new changeModel($cpr, $id, intval($changeLine));
        $changeModel->setCpr($cpr);
        $changeModel->setIncome_id($id);
        $changeModel->setValue(intval($changeLine));
        changeController::insert($changeModel);
    }
    $i++;
}


echo '<h1>Your data has been inserted successfully.</h1>';
?>