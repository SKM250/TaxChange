
<?php
echo '<h1>To be implemented</h1>';

var_dump($_POST);
echo "<br>";

$btn = array_keys($_POST)[0];
preg_match_all('!\d+!', $btn, $matches);
$id = $matches[0][0];
echo $id;


$toProcess;
foreach ($_POST as $act) {
    $toProcess = $act;
}

if ($toProcess === "Approve") {

    echo 'To approve!';
//$taxChange = changeController::getChange($id);
//
//$taxChange->setId($id);
//
//        $changeModel->getCpr($cpr);
//        $changeModel->getIncome_id($id); 
//        $changeModel->getIncome_id($income_id);
//        $changeModel->setValue($value);
//        changeController::insert($changeModel);
//        changeController::delete($id);
    
    
    
} else {

    echo ' To disapprove';
}
?>

