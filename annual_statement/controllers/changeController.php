<?php

require_once('../annual_statement/mappers/changeMapper.php');
require_once('../annual_statement/models/changeModel.php');

class changeController {

    public static function getChange($cpr) {


        // Get the selected annualStatements from the database
        $scenario = changeMapper::select($cpr);

        // Return the results
        return $scenario;
    }

    public static function getAllChanges() {
        $scenario = changeMapper::selectAll();

        // Return the results
        return $scenario;
    }

    public static function insert($changeModel) {

        // Insert book
        changeMapper::insert($changeModel);

    }

}

?>