<?php
require_once ('./autoLoader.php');
?>

<head>
    <meta charset="utf-8">
    Tax changes need to have an Administrator approval!
</head>
<body>
    <?php

    $changes = changeController::getAllChanges();
    foreach ($changes as $changeModel) {
        $cpr = $changeModel->getCpr();
        ?>



        <br></br>
        <br></br>
        <table border="1" style="width:390px"> 
            <tr>
                <td><?php echo $cpr; ?></td>     
                <td>50,000</td> 
                <td>22,000</td>
                <td> <button type="submit" onclick="alert('Not implemented yet')">Approve</button><button type="submit" onclick="alert('Not implemented yet')">Disapprove</button></td>
            </tr>
            <tr>
                <td><?php echo $cpr; ?></td>
                <td>40,000</td> 
                <td>1,500</td>
                <td> <button type="submit" onclick="alert('Not implemented yet')">Approve</button><button type="submit" onclick="alert('Not implemented yet')">Disapprove</button></td>
            </tr>


        </table>

<?php } ?>
</body>


