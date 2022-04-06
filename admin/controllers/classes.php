<?php

if ($action == "list_classes") {
    $classes = get_classes();
    include("view/classes_list.php");
} else if ($action == "add_class") {
    add_class($class_name);
    header("Location: .?action=list_classes");
} else if ($action == "delete_class") {
    if ($class_id) {
        try {
            delete_class($class_id);
        } catch (PDOException $e) {
            $error = "You cannot delete a class if vehicles exist in the class.";
            include("../view/error.php");
            exit();
        }
    }
    header("Location: .?action=list_classes");
}