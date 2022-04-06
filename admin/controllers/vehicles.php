<?php

if ($action == "delete_vehicle") {
    if ($vehicle_id) {
        delete_vehicle($vehicle_id);
        header("Location: .");
    } else {
        $error = "Vehicle unable to be deleted.";
        include("../view/error.php");
    }
} else if ($action == "add_vehicle") {
    if ($year && $model && $price && $make_id && $type_id && $class_id) {
        add_vehicle($year, $model, $price, $make_id, $type_id, $class_id);
        header("Location: .");
    } else {
        $error = "Invalid vehicle data. Check all fields and try again.";
        include("../view/error.php");
        exit();
    }
} else if ($action == "add_vehicle_form") {
    $makes = get_makes();
    $types = get_types();
    $classes = get_classes();
    include("view/vehicle_add.php");
} else if ($action == "list_vehicles") {
    $makes = get_makes();
    $types = get_types();
    $classes = get_classes();
    $vehicles = get_vehicles($make_id, $type_id, $class_id, $order_by);
    include("../view/vehicles_list.php");
}