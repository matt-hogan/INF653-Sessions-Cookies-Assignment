<section class="admin-links-container">
    <?php if ($action != "list_vehicles") { ?>
        <p class="admin-links"><a href="./?action=list_vehicles">View Vehicles</a></p>
    <?php } ?>
    <?php if ($action != "add_vehicle_form") { ?>
        <p class="admin-links"><a href="./?action=add_vehicle_form">Add Vehicle</a></p>
    <?php } ?>
    <?php if ($action != "list_makes") { ?>
        <p class="admin-links"><a href="./?action=list_makes">View/Edit Makes</a></p>
    <?php } ?>
    <?php if ($action != "list_types") { ?>
        <p class="admin-links"><a href="./?action=list_types">View/Edit Types</a></p>
    <?php } ?>
    <?php if ($action != "list_classes") { ?>
        <p class="admin-links"><a href="./?action=list_classes">View/Edit Classes</a></p>
    <?php } ?>
</section>

<?php include("../view/footer.php") ?>