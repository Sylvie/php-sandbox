<?php
$hostname = 'database';
$username = 'root';
$password = 'blabla';
$nom_de_base = 'bibliotheque';

global $LINK;
$LINK = mysqli_connect("$hostname", "$username", "$password") or die("Could not connect");
mysqli_set_charset($LINK, 'utf8');
mysqli_select_db($LINK, "$nom_de_base") or die("Could not select database!");
echo $LINK->host_info . "\n";


$result = mysqli_query($LINK, "Select * from user") or die('Error while fetching data.');
var_dump(mysqli_fetch_array($result));
echo  "\n---<br/>";
echo " A la prochaine!";
echo "Bye!";
?>