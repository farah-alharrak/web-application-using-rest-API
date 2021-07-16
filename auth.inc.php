
<?php
session_start();
if (!$_SESSION['loginOK']) {
header('Location: /laradeel/connexion.php');
}
?> 