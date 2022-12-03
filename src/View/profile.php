<?php
require_once var_dump(__DIR__ . '/../../vendor/autoload.php');
exit();
use Leader\UserApi\user;
$test = new user;
$$test->getUserByEmail($_SESSION['username']);
echo $searchUser;
?>
<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
