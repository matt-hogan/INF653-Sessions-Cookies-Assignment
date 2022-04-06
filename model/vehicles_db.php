<?php
    function get_vehicles ($make_id, $type_id, $class_id, $order_by) {
        global $db;

        $filter = "WHERE ";
        $query = "SELECT V.Year, M.Make, V.Model, V.Price, V.Make_ID, V.Type_ID, T.Type, V.Class_ID, C.Class, V.ID FROM vehicles V 
                  LEFT JOIN makes M ON V.Make_ID = M.ID 
                  LEFT JOIN types T ON V.Type_ID = T.ID
                  LEFT JOIN classes C ON V.Class_ID = C.ID ";
        if ($make_id) {
            $query .= $filter."V.Make_ID = :make_id ";
            $filter = "AND ";
        }
        if ($type_id) {
            $query .= $filter."V.Type_ID = :type_id ";
            $filter = "AND ";
        }
        if ($class_id) {
            $query .= $filter."V.Class_id = :class_id ";
        }
        if ($order_by == "year") {
            $query .= "ORDER BY V.Year DESC";
        } else {
            $query .= "ORDER BY V.Price DESC";
        }

        $statement = $db->prepare($query);
        if ($make_id) {
            $statement->bindValue(":make_id", $make_id);
        }
        if ($type_id) {
            $statement->bindValue(":type_id", $type_id);
        }
        if ($class_id) {
            $statement->bindValue(":class_id", $class_id);
        }
        $statement->execute();
        $vehicles = $statement->fetchAll();
        $statement->closeCursor();
        return $vehicles;
    }

    function delete_vehicle ($vehicle_id) {
        global $db;
        $query = "DELETE FROM vehicles WHERE ID = :vehicle_id";
        $statement = $db->prepare($query);
        $statement->bindValue(":vehicle_id", $vehicle_id);
        $statement->execute();
        $statement->closeCursor();
    }

    function add_vehicle ($year, $model, $price, $make_id, $type_id, $class_id) {
        global $db;
        $query = "INSERT INTO vehicles (Year, Model, Price, Make_ID, Type_ID, Class_ID) VALUES (:year, :model, :price, :make_id, :type_id, :class_id)";
        $statement = $db->prepare($query);
        $statement->bindValue(":year", $year);
        $statement->bindValue(":model", $model);
        $statement->bindValue(":price", $price);
        $statement->bindValue(":make_id", $make_id);
        $statement->bindValue(":type_id", $type_id);
        $statement->bindValue(":class_id", $class_id);
        $statement->execute();
        $statement->closeCursor();
    }