<?php
require_once ('./autoLoader.php');
echo '<h1>To be implemented</h1>';
?>
<head>
    <meta charset="utf-8">
    Tax changes need to be authorised by an Administrator!
</head>
<body>
    <form action="approve_disapproveChanges.php" method="post">
        <table border="1" style="width:600px"> 
            <tr>
                <th>ID</th>
                <th>CPR</th>
                <th>INCOME ID</th>
                <th>VALUE</th>
                <th>DATE</th>
                <th>APPROVE/DISAPPROVE</th>
            </tr>
            <?php
            $changes = changeController::getAllChanges();
            var_dump($changes);
            foreach ($changes as $changeModel) {
                $id = $changeModel->getId();
                $cpr = $changeModel->getCpr();
                $income_id = $changeModel->getIncome_id();
                $value = $changeModel->getValue();
                $date = $changeModel->getDate();
                $status = $changeModel->getStatus();
                if ($status === "Disapprove") {
                    ?>
                    <tr style="color: red;">
                        <td style="text-decoration: line-through;"><?php echo $id; ?></td>
                        <td style="text-decoration: line-through;"><?php echo $cpr; ?></td>     
                        <td style="text-decoration: line-through;"><?php echo $income_id; ?></td> 
                        <td style="text-decoration: line-through;"><?php echo $value; ?></td>
                        <td style="text-decoration: line-through;"><?php echo $date; ?></td>
                        <td> <input type="submit" name="approve <?php echo $id; ?>" value="Approve"></td>
                    </tr>
                <?php } else { ?>
                    <tr>
                        <td><?php echo $id; ?></td>
                        <td><?php echo $cpr; ?></td>     
                        <td><?php echo $income_id; ?></td> 
                        <td><?php echo $value; ?></td>
                        <td><?php echo $date; ?></td>
                        <td> <input type="submit" name="approve <?php echo $id; ?>" value="Approve"><input type="submit" name="disapprove <?php echo $id; ?>" value="Disapprove"></td>
                    </tr>
                <?php
                }
            }
            ?>
        </table>
    </form>
</body>