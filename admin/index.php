<?php
    require("../model/database.php");
    require("../model/vehicles_db.php");
    require("../model/makes_db.php");
    require("../model/types_db.php");
    require("../model/classes_db.php");

    $vehicle_id = filter_input(INPUT_POST, "vehicle_id", FILTER_VALIDATE_INT);
    $year = filter_input(INPUT_POST, "year", FILTER_UNSAFE_RAW);
    $model = filter_input(INPUT_POST, "model", FILTER_UNSAFE_RAW);
    $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_INT);

    $type_id = filter_input(INPUT_POST, "type_id", FILTER_VALIDATE_INT);
    if (!$type_id) {
        $type_id = filter_input(INPUT_GET, "type_id", FILTER_VALIDATE_INT);
    }
    $class_id = filter_input(INPUT_POST, "class_id", FILTER_VALIDATE_INT);
    if (!$class_id) {
        $class_id = filter_input(INPUT_GET, "class_id", FILTER_VALIDATE_INT);
    }
    $make_id = filter_input(INPUT_POST, "make_id", FILTER_VALIDATE_INT);
    if (!$make_id) {
        $make_id = filter_input(INPUT_GET, "make_id", FILTER_VALIDATE_INT);
    }

    $order_by = filter_input(INPUT_POST, "order_by", FILTER_UNSAFE_RAW);
    if (!$order_by) {
        $order_by = filter_input(INPUT_GET, "order_by", FILTER_UNSAFE_RAW);
    }

    $make_name = filter_input(INPUT_POST, "make_name", FILTER_UNSAFE_RAW);
    if (!$make_name) {
        $make_name = filter_input(INPUT_GET, "make_name", FILTER_UNSAFE_RAW);
    }
    $type_name = filter_input(INPUT_POST, "type_name", FILTER_UNSAFE_RAW);
    if (!$type_name) {
        $type_name = filter_input(INPUT_GET, "type_name", FILTER_UNSAFE_RAW);
    }
    $class_name = filter_input(INPUT_POST, "class_name", FILTER_UNSAFE_RAW);
    if (!$class_name) {
        $class_name = filter_input(INPUT_GET, "class_name", FILTER_UNSAFE_RAW);
    }

    $action = filter_input(INPUT_POST, "action", FILTER_UNSAFE_RAW);
    if (!$action) {
        $action = filter_input(INPUT_GET, "action", FILTER_UNSAFE_RAW);
        if(!$action) {
            $action = "list_vehicles";
        }
    }

    require("controllers/makes.php");
    require("controllers/types.php");
    require("controllers/classes.php");
    require("controllers/vehicles.php");