<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        require_once('..//databaseConnector.php');

        class changeMapper {

            private static function create($line) {

                // Create new object
                $current = new changeModel($line['id'], $line['cpr'], $line['income_id'], $line['value'], $line['date']);

                // Return object
                return $current;
            }

            public static function select($cpr) {

                // Get database connection
                $db = databaseConnector::getConnection();

                // Create a new scenario


                try {

                    // Prepare SQL statement
                    $pstmt = $db->prepare("SELECT * FROM person WHERE cpr=:cpr;");

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
                        $array[$line['cpr']] = self::create($line);
                    }
                } catch (PDOException $e) {
                    
                }

                return $array;
            }

            public static function selectAll() {

                // Get database connection
                $db = databaseConnector::getConnection();

                // Create a new scenario


                try {

                    // Prepare SQL statement
                    $pstmt = $db->prepare("SELECT * FROM taxchanges;");
                    // Execute SQL query
                    $pstmt->execute();

                    $array = array();

                    // Fetch all results
                    $pstmt = $pstmt->fetchAll();

                    // Loop all results as lines
                    foreach ($pstmt as $line) {

                        // Add current object to array
                        $array[$line['cpr']] = self::create($line);
                    }
                } catch (PDOException $e) {
                    
                }

                return $array;
            }

            /* -------------------------------------------------------------------------------------------------------------- */

            public static function updateDetails($persons) {

                // Get database connection
                $db = Database::getConnection();

                // Create a new scenario


                try {

                    // Prepare SQL statement
                    $pstmt = $db->prepare("UPDATE person SET cpr=:cpr, income_id=:income_id, value=:value, date=:date WHERE cpr=:cpr;");

                    // Bind SQL values
                    $pstmt->bindValue(':cpr', $person->getCpr(), PDO::PARAM_INT);
                    $pstmt->bindValue(':income_id', $person->income_id(), PDO::PARAM_STR);
                    $pstmt->bindValue(':value', $person->value(), PDO::PARAM_STR);
                    $pstmt->bindValue(':date', $person->date(), PDO::PARAM_STR);

                    // Execute SQL query
                    $pstmt->execute();



                    // Update the current session
                    if ($_SESSION['person']->getCpr() == $person->getCpr()) {
                        $_SESSION['person'] = $person;
                    }
                } catch (PDOException $e) {
                    echo '' . $e;
                }
            }

            /* -------------------------------------------------------------------------------------------------------------- */
        }
        ?>

    </body>
</html>
