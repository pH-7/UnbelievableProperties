<?php
/**
 * @author  Pierre-Henry Soria <pierrehenrysoria@gmail.com>
 */
require '_user.inc.php';
$sHashTag = Library::hashTag($data->user->id);
?>
<div style="text-align:center">
<p>Hello <strong><?php echo $_SESSION['name'] ?>!</strong></p>
<p>Your Personal Property Hashtag is: <strong>#<?php echo $sHashTag ?></strong></p>

<p>Ready? Go for <a href="?p=pics" class="btn btn-lg btn-primary">Properties Pics!!</a></p>

</div>
