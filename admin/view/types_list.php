<?php include("../admin/view/header_admin.php") ?>

<section>
    <h2>Types List</h2>

    <?php if ($types) { ?>
        <section class="scrollable">
            <table class="types-table">
                <thead>
                    <tr class="type-item types-heading">
                        <th colspan="2">Type</th>
                    </tr>
                </thead>
                <tbody class="type-item">
                    <?php foreach ($types as $type) : ?>
                        <tr>
                            <td><?= $type["Type"] ?></td>
                            <td class="list-remove">
                                <form action="." method="POST">
                                    <input type="hidden" name="action" value="delete_type">
                                    <input type="hidden" name="type_id" value="<?= $type["ID"] ?>">
                                    <button class="remove-button buttons">Remove</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </section>
    <?php } else { ?>
        <p class="no-items">No types exist.</p>
    <?php } ?>

    <section class="add-types add-form">
        <h2 class="add-heading">Add Type</h2>
        <form action="." method="post" class="types-add-form input-form">
            <input type="hidden" name="action" value="add_type">
            <input type="text" class="add-input" name="type_name" maxlength="25" placeholder="Type Name" required>
            <button class="submit-button add-inputs buttons">Add</button>
        </form>
    </section>
</section>

<?php include("footer_admin.php") ?>