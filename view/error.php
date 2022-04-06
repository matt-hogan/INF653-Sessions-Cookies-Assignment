<?php
    if (basename(getcwd()) == "admin") {
        include("../admin/view/header_admin.php");
    } else {
        include("header.php");
    }
?>

<h2>Error</h2>
<p class="error-message"><?= $error ?></p>
<p class="admin-links"><a href=".">Back to vehicles</a></p>

<?php include("footer.php"); ?>