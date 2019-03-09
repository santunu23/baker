<?php
require("../db/db.php");
$volentierid=filter_input(INPUT_POST,'volentierid');
$DB->query("DELETE FROM volunteer_list WHERE volentierid = ?", array($volentierid));
?>