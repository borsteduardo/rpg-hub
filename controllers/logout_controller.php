<?php

session_unset();

session_destroy();

header("Location: /rpg-hub/login");
exit;
?>