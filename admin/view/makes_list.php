<?php include("../admin/view/header_admin.php") ?>

<section>
    <h2>Makes List</h2>

    <?php if ($makes) { ?>
        <div class="scrollable">
            <table class="makes-table">
                <thead>
                    <tr class="make-item makes-heading">
                        <th colspan="2">Make</th>
                    </tr>
                </thead>
                <tbody class="make-items">
                    <?php foreach ($makes as $make) : ?>
                        <tr class="make-item">
                            <td><?= $make["Make"] ?></td>
                            <td class="list-remove">
                                <form action="." method="POST">
                                    <input type="hidden" name="action" value="delete_make">
                                    <input type="hidden" name="make_id" value="<?= $make["ID"] ?>">
                                    <button class="remove-button buttons">Remove</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    <?php } else { ?>
        <p class="no-items">No makes exist.</p>
    <?php } ?>

    <section class="add-makes add-form">
        <h2 class="add-heading">Add Make</h2>
        <form action="." method="post" class="makes-add-form input-form">
            <input type="hidden" name="action" value="add_make">
            <input type="text" class="add-input" name="make_name" maxlength="25" placeholder="Make Name" required>
            <button class="submit-button add-input buttons">Add</button>
        </form>
    </section>
</section>

<?php include("footer_admin.php") ?>