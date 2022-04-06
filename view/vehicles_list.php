<?php
    if (basename(getcwd()) == "admin") {
        include("../admin/view/header_admin.php");
    } else {
        include("header.php");
    }
?>

<section class="vehicles">
    <header class="vehicle-list-filter-container">
        <form action="." method="get" class="vehicle-list-filter input-form">
            <input type="hidden" name="action" value="list_vehicles">
            <select name="make_id" class="vehicle-filter" required>
                <option value="0">View All Makes</option>
                <?php foreach ($makes as $make) : ?>
                    <?php $selected = $make["ID"] ?>
                    <?php if ($make_id == $make["ID"]) { ?>
                        <option value="<?= $make["ID"]?>" selected>
                    <?php } else { ?>
                        <option value="<?= $make["ID"] ?>">
                    <?php } ?>
                    <?= $make["Make"] ?>
                    </option>
                    <?php endforeach ?>
            </select>
            <select name="type_id" class="vehicle-filter" required>
                <option value="0">View All Types</option>
                <?php foreach ($types as $type) : ?>
                    <?php $selected = $type["ID"] ?>
                    <?php if ($type_id == $type["ID"]) { ?>
                        <option value="<?= $type["ID"]?>" selected>
                    <?php } else { ?>
                        <option value="<?= $type["ID"] ?>">
                    <?php } ?>
                    <?= $type["Type"] ?>
                    </option>
                    <?php endforeach ?>
            </select>
            <select name="class_id" class="vehicle-filter" required>
                <option value="0">View All Classes</option>
                <?php foreach ($classes as $class) : ?>
                    <?php $selected = $class["ID"] ?>
                    <?php if ($class_id == $class["ID"]) { ?>
                        <option value="<?= $class["ID"]?>" selected>
                    <?php } else { ?>
                        <option value="<?= $class["ID"] ?>">
                    <?php } ?>
                    <?= $class["Class"] ?>
                    </option>
                    <?php endforeach ?>
            </select>
            <div class="radio-sort-buttons vehicle-filter">
                <label>Sort By:</label>
                <?php if ($order_by == "year") { ?>
                    <input type="radio" id="year" name="order_by" value="year" checked>
                    <label for="year">Year</label>
                    <input type="radio" id="price" name="order_by" value="price">
                    <label for="price">Price</label>
                <?php } else { ?>
                    <input type="radio" id="year" name="order_by" value="year">
                    <label for="year">Year</label>
                    <input type="radio" id="price" name="order_by" value="price" checked>
                    <label for="price">Price</label>
                <?php } ?>
            
            <button class="submit-button vehicle-filter buttons">Submit</button>
            </div>
        </form>
    </header>
    <?php if ($vehicles) { ?>
        <div class="scrollable">
            <table class="vehicles-table">
                <thead>
                    <tr class="vehicle-item vehicle-heading">
                        <th>Year</th>
                        <th>Make</th>
                        <th>Model</th>
                        <th>Type</th>
                        <th>Class</th>
                        <th>Price</th>
                        <?php if (basename(getcwd()) == "admin") { ?>
                            <th></th>
                        <?php } ?>
                    </tr>
                </thead>
                <tbody class="vehicle-items">
                    <?php foreach ($vehicles as $vehicle) : ?>
                        <tr class="vehicle-item">
                            <td><?= $vehicle["Year"] ?></td>
                            <td><?= $makes[$vehicle["Make_ID"]-1]["Make"] ?></td>
                            <td><?= $vehicle["Model"] ?></td>
                            <td><?= $types[$vehicle["Type_ID"]-1]["Type"] ?></td>
                            <td><?= $classes[$vehicle["Class_ID"]-1]["Class"] ?></td>
                            <td><?= "$".number_format($vehicle["Price"]) ?></td>
                            <?php if (basename(getcwd()) == "admin") { ?>
                                <td>
                                    <form action="." method="POST">
                                        <input type="hidden" name="action" value="delete_vehicle">
                                        <input type="hidden" name="vehicle_id" value="<?= $vehicle["ID"] ?>">
                                        <button class="remove-button buttons">X</button>
                                    </form>
                                </td>
                            <?php } ?>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    <?php } else { ?>
        <?php if (count($vehicles)) { ?>
            <p class="no-items">No vehicles with this criteria.</p>
        <?php } else { ?>
            <p class="no-items">No vehicles exist.</p>
        <?php } ?>
    <?php } ?>
</section>

<?php
    if (basename(getcwd()) == "admin") {
        include("../admin/view/footer_admin.php");
    } else {
        include("footer.php");
    }
?>