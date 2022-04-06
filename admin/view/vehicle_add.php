<?php include("../admin/view/header_admin.php") ?>

<section class="add-vehicles add-form">
    <h2>Add Vehicle</h2>
    <form action="." method="post" class="vehicle-add-form input-form">
        <input type="hidden" name="action" value="add_vehicle">
        <select name="make_id" class="vehicle-inputs" required>
            <option value="" disabled selected hidden>Select Make</option>
            <?php foreach ($makes as $make) : ?>
                <option value="<?= $make["ID"] ?>"><?= $make["Make"] ?></option>
            <?php endforeach ?>
        </select>
        <select name="type_id" class="vehicle-inputs" required>
            <option value="" disabled selected hidden>Select Type</option>
            <?php foreach ($types as $type) : ?>
                <option value="<?= $type["ID"] ?>"><?= $type["Type"] ?></option>
            <?php endforeach ?>
        </select>
        <select name="class_id" class="vehicle-inputs" required>
            <option value="" disabled selected hidden>Select Class</option>
            <?php foreach ($classes as $class) : ?>
                <option value="<?= $class["ID"] ?>"><?= $class["Class"] ?></option>
            <?php endforeach ?>
        </select>
        <input class="vehicle-inputs" type="number" name="year" min="1900" max="2100" step="1" pattern="\d+" value="2022" required>
        <input class="vehicle-inputs" type="text" name="model" maxlength="50" placeholder="Model" required>
        <input class="vehicle-inputs" type="number" name="price" min="0" step="1" pattern="\d+" placeholder="Price" required>
        <button class="submit-button buttons vehicle-inputs">Submit</button>
    </form>
</section>

<?php include("footer_admin.php") ?>