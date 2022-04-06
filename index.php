<?php
    session_start();

    require("model/database.php");
    require("model/vehicles_db.php");
    require("model/makes_db.php");
    require("model/types_db.php");
    require("model/classes_db.php");

    $firstname = filter_input(INPUT_GET, "firstname", FILTER_UNSAFE_RAW);
    if ($firstname) {
        $_SESSION["user_id"] = $firstname;
    }

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

    $action = filter_input(INPUT_POST, "action", FILTER_UNSAFE_RAW);
    if (!$action) {
        $action = filter_input(INPUT_GET, "action", FILTER_UNSAFE_RAW);
        if(!$action) {
            $action = "list_vehicles";
        }
    }

    if ($action == "register") {
        include("view/register.php");
    } else if ($action == "logout") {
        include("view/logout.php");
    } else {
        $makes = get_makes();
        $types = get_types();
        $classes = get_classes();
        $vehicles = get_vehicles($make_id, $type_id, $class_id, $order_by);
        include("view/vehicles_list.php");
    }