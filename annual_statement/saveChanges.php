<?php

require_once ('./autoLoader.php');
session_start();
$cpr = $_SESSION['SESS_MEMBER_ID'];

$i = 0;
foreach ($_POST as $changeLine) {

    if ($changeLine !== "") {
        $id = array_keys($_POST)[$i];
        //var_dump($btn);
        $changeModel = new changeModel(null, $cpr, $id, intval($changeLine), null, null);
        $changeModel->setCpr($cpr);
        $changeModel->setIncome_id($id);
        $changeModel->setValue(intval($changeLine));
        changeController::insert($changeModel);
    }
    $i++;
}


echo '<h1>Your data has been inserted successfully.</h1>';
?>