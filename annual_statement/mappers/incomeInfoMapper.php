<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        require_once('..//databaseConnector_Master.php');

        class incomeInfoMapper {

            private static function create($line) {

                // Create new object
                $current = new incomeInfoModel($line['idincome_info'], $line['cpr'], $line['idincome'], $line['value'], $line['date']);

                // Return object
                return $current;
            }

            public static function select($cpr) {

                // Get database connection
                $db = databaseConnectorMaster::getConnection();

                // Create a new scenario


                try {

                    // Prepare SQL statement
                    $pstmt = $db->prepare("SELECT * FROM income_info WHERE cpr=:cpr;");

                    // Bind SQL values
                    $pstmt->bindValue(':cpr', $cpr, PDO::PARAM_INT);

                    // Execute SQL query
                    $pstmt->execute();

                    $array = array();

                    // Fetch all results
                    $pstmt = $pstmt->fetchAll();

                    // Loop all results as lines
                    foreach ($pstmt as $line) {

                        // Add current object to array
                        $array[$line['idincome_info']] = self::create($line);
                    }
                } catch (PDOException $e) {
                    
                }

                return $array;
            }

            /* -------------------------------------------------------------------------------------------------------------- */

            public static function updateDetails($income_infos) {

                // Get database connection
                $db = Database::getConnection();

                // Create a new scenario


                try {

                    // Prepare SQL statement
                    $pstmt = $db->prepare("UPDATE income_info SET value=:value WHERE idincome_info=:idincome_info;");

                    // Bind SQL values
                    $pstmt->bindValue(':value', $income_infos->getValue(), PDO::PARAM_INT);
                    $pstmt->bindValue(':idincome_info', $income_infos->getIdincome_info(), PDO::PARAM_INT);
                    // Execute SQL query
                    $pstmt->execute();
                } catch (PDOException $e) {
                    echo '' . $e;
                }
            }

            public static function insert($incomeInfoModel) {

                // Get database connection
                $db = databaseConnectorMaster::getConnection();


                try {

                    // Prepare SQL statement
                    $pstmt = $db->prepare("INSERT INTO `income_info`(`cpr`, `idincome`, `value`) VALUES (:cpr, :idincome, :value)");


                    // Bind SQL values for statement

                    $pstmt->bindValue(':cpr', $incomeInfoModel->getCpr(), PDO::PARAM_INT);
                    $pstmt->bindValue(':idincome', $incomeInfoModel->getIdincome(), PDO::PARAM_INT);
                    $pstmt->bindValue(':value', $incomeInfoModel->getValue(), PDO::PARAM_INT);


                    // Execute statement
                    $pstmt->execute();

//                                var_dump($changeModel);
//                                var_dump($pstmt);
//                                $pstmt->debugDumpParams();
                } catch (PDOException $e) {

                    echo '' . $e;
                }
            }

            /* -------------------------------------------------------------------------------------------------------------- */
        }
        ?>

    </body>
</html>
