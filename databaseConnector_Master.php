<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php

        class databaseConnectorMaster {

            private static $db;

            public static function getConnection() {

                // Set login information and settings
                $username = "root";
                $password = "";
                $hostname = "localhost";
                $name = "skat";

                $char = 'utf8';

                // Create a connection if it has not yet been established
                if (!isset(self::$db)) {
                    try {

                        // Create settings
                        $settings = 'mysql:host=' . $hostname . ';dbname=' . $name . ';charset=' . $char;

                        // Create PDO connection
                        self::$db = new PDO($settings, $username, $password, /* Force: UTF-8 */ array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

                        // Connection type: Persistent (keeps the connection alive)
                        self::$db->setAttribute(PDO::ATTR_PERSISTENT, TRUE);

                        // Error reporting: Throw exceptions
                        self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                        // Case: Leaves column names as returned by the database driver
                        self::$db->setAttribute(PDO::ATTR_CASE, PDO::CASE_NATURAL);
                    } catch (PDOException $e) {

                        // In case of connection fail
                        // Print error message
                        $message = $e->getMessage();
                        echo '<pre>' . $message . '</pre>';

                        // Stop everything (kill switch)
                        die();

                        // Return false because the connection failed
                        return FALSE;
                    }
                }

                // Return the connection
                return self::$db;
            }

            public static function closeConnection() {

                // Close the current connection
                self::$db = NULL;
            }

        }

        ?>
    </body>
</html>
