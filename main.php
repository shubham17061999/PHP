<?php require_once "bootstrap.php"; ?>
<?php

$xml = simplexml_load_file('location.xml');

echo '<h1>List of Places to choose from.</h1>';

$list = $xml->record;

for ($i = 0; $i < count($list); $i++) {

    echo '<b>Name of Country</b> ' . $list[$i]->attributes()->man_no .'<br>';

    echo '<b>Name of prominent cities:</b> ' . $list[$i]->name . '<br>';

    echo '<b>Average Cost for 3D/2N:</b> ' . $list[$i]->position . '<br><br>';

}
?>