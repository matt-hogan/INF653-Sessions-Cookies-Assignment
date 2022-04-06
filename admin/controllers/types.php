<?php

if ($action == "list_types") {
    $types = get_types();
    include("view/types_list.php");
} else if ($action == "add_type") {
    add_type($type_name);
    header("Location: .?action=list_types");
} else if ($action == "delete_type") {
    if ($type_id) {
        try {
            delete_type($type_id);
        } catch (PDOException $e) {
            $error = "You cannot delete a type if vehicles exist in the type.";
            include("../view/error.php");
            exit();
        }
    }
    header("Location: .?action=list_types");
}