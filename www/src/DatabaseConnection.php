<?php
$hostname = 'database';
$username = 'root';
$password = 'blabla';
$nom_de_base = 'bibliotheque';

global $LINK;
$LINK = new mysqli("$hostname", "$username", "$password") or die("Could not connect");
$LINK->set_charset('utf8');
$LINK->select_db("$nom_de_base") or die("Could not select database!");
?>