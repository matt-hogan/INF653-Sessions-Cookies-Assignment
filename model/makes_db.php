<?php
    function get_makes () {
        global $db;
        $query = "SELECT * FROM makes ORDER BY ID";
        $statement = $db->prepare($query);
        $statement->execute();
        $makes = $statement->fetchAll();
        $statement->closeCursor();
        return $makes;
    }

    function delete_make ($make_id) {
        global $db;
        $query = "DELETE FROM makes WHERE ID = :make_id";
        $statement = $db->prepare($query);
        $statement->bindValue(":make_id", $make_id);
        $statement->execute();
        $statement->closeCursor();
    }

    function add_make ($make_name) {
        global $db;
        $query = "INSERT INTO makes (Make) VALUES (:make_name)";
        $statement = $db->prepare($query);
        $statement->bindValue(":make_name", $make_name);
        $statement->execute();
        $statement->closeCursor();
    }