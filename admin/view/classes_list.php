<?php include("../admin/view/header_admin.php") ?>

<section>
    <h2>Classes List</h2>

    <?php if ($classes) { ?>
        <section class="scrollable">
            <table class="classes-table">
                <thead>
                    <tr class="class-item classes-heading">
                        <th colspan="2">Class</th>
                    </tr>
                </thead>
                <tbody class="class-items">
                    <?php foreach ($classes as $class) : ?>
                        <tr class="class-item">
                            <td><?= $class["Class"] ?></td>
                            <td class="list-remove">
                                <form action="." method="POST">
                                    <input type="hidden" name="action" value="delete_class">
                                    <input type="hidden" name="class_id" value="<?= $class["ID"] ?>">
                                    <button class="remove-button buttons">Remove</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </section>
    <?php } else { ?>
        <p class="no-items">No classes exist.</p>
    <?php } ?>

    <section class="add-classes add-form">
        <h2 class="add-heading">Add Class</h2>
        <form action="." method="post" class="classes-add-form input-form">
            <input type="hidden" name="action" value="add_class">
            <input type="text" class="add-input" name="class_name" maxlength="25" placeholder="Class Name" required>
            <button class="submit-button add-inputs buttons">Add</button>
        </form>
    </section>
</section>

<?php include("footer_admin.php") ?>