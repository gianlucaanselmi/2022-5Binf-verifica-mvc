<?php

namespace App\Models;

use PDO;

/**
 * Example user model
 *
 * PHP version 7.0
 */
class User extends \Core\Model
{

    /**
     * Get all the users as an associative array
     *
     * @return array
     */
    public static function getAll()
    {
        $db = static::getDB();
        $stmt = $db->query('SELECT pirate_id, name FROM ');
        $result = array();

        if ($stmt->num_rows > 0) {
            // output data of each row
            while($row = $stmt->fetch_assoc()) {
                $obj = [
                    "pirate_id" => $row["pirate_id"],
                    "name" => $row["name"],
                ];
                array_push($result,$obj);
            }
        }
        static::closeDB();
        return $result;
    }

    public static function getPirate($id)
    {
        $db = static::getDB();
        $stmt = $db->query('SELECT pirate_id, name FROM pirates WHERE pirate_id='.$id);
        $result = null;
        if ($stmt->num_rows > 0) {
            // output data of each row
            $row = $stmt->fetch_assoc();
            $result = [
                "pirate_id" => $row["pirate_id"],
                "name" => $row["name"],
            ];
        }
        static::closeDB();
        return $result;
    }
}
