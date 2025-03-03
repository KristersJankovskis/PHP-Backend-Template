<?php
include_once __DIR__ . "/../autoload.php";

class CRUD extends Database{

    public function fetchSingleRecord($select_single, $parameters = []){
        $result = $this->db_connection->prepare($select_single);
        $result->execute($parameters);
        return $result->fetch();
    }

    public function fetchAllRecords($select_all, $parameters = []){
        $result = $this->db_connection->prepare($select_all);
        $result->execute($parameters);
        return $result->fetchAll();
    }

    public function insertRecord($insert_record, $parameters){
        $result = $this->db_connection->prepare($insert_record);
        return $result->execute($parameters);
    }

    public function countRecord($count_record, $parameters = []){
        $result = $this->db_connection->prepare($count_record);
        $result->execute($parameters);
        return $result->fetchColumn();
    }

    public function updateRecord($update_record, $parameters){
        $result = $this->db_connection->prepare($update_record);
        return $result->execute($parameters);
    }

    public function deleteRecord($delete_record, $parameters){
        $result = $this->db_connection->prepare($delete_record);
        return $result->execute($parameters);
    }
}
?>