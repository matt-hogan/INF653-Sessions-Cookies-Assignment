<?php

if ($action == "list_makes") {
    $makes = get_makes();
    include("view/makes_list.php");
} else if ($action == "add_make") {
    add_make($make_name);
    header("Location: .?action=list_makes");
} else if ($action == "delete_make") {
    if ($make_id) {
        try {
            delete_make($make_id);
        } catch (PDOException $e) {
            $error = "You cannot delete a make if vehicles exist in the make.";
            include("../view/error.php");
            exit();
        }
    }
    header("Location: .?action=list_makes");
}