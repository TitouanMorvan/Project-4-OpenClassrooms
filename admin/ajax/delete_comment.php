<?php
require "../../model/main-functions.php";
$db->exec("DELETE FROM comments WHERE id = {$_POST['id']}");
