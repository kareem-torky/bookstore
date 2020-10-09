<?php



$session = new Core\Session;

if($session->has("errors")) {
    echo "<div class='alert alert-danger'>";
        foreach ($session->flash("errors") as $error) {
            echo "<p class='mb-0'>$error</p>";
        }
    echo "</div>";
}


?>