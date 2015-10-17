<div class="center">
<?php
require '_user.inc.php';
$sHashTag = Library::hashTag($data->user->id);

 $oInstagram->setAccessToken($data);
  $media = $oInstagram->getTagMedia($sHashTag, 8);
  if (empty($media->data)) {
      echo '<h3>Any photos of your Instagram match with the hashtag.</h3>';
  } else {
      foreach ($media->data as $data) {
          echo '<img src="' . $data->images->standard_resolution->url . '" height="400px" width="400px" alt="Pic" /><br />
          <form action="" method="post">
          <input type="hidden" name="path" value="' . $data->images->standard_resolution->url . '" />
          <input type="hidden" name="city" value="' . Geo::getCity() . '" />
          <input type="text" name="name" placeholder="Title" required="required" /><br />
          <input type="text" value="' . Geo::getCity() . '" disabled="disabled" /><br />
          <small>(The city has been taken from your IP, for security reason you can\'t change it)</small><br /><br />
          <input type="number" step="0.01" name="price" placeholder="How much it costs?" required="required" /><br />
          <input class="btn btn-lg btn-primary" type="submit" name="save" value="Save It!!" /></p>
          </form>';
      }
  }
?>
<p>&nbsp;</p>

<form action="" method="post">
   <input class="btn btn-lg btn-primary" type="submit" name="go" value="Go to my &quot;Home&quot; Page!!" /></p>
</form>

<?php
if (!empty($_POST['save'])) {
    $img = file_get_contents($_POST['path']);
    $sPicId = md5($_POST['path']);
    $_SESSION['property'][$sPicId]['id'] = $sPicId;
    $_SESSION['property'][$sPicId]['title'] = $_POST['name'];
    $_SESSION['property'][$sPicId]['city'] = $_POST['city'];
    $_SESSION['property'][$sPicId]['price'] = $_POST['price'];
    $_SESSION['property'][$sPicId]['img_name'] = '/uploads/' . $sPicId . '.jpg';
    file_put_contents(dirname(dirname(__DIR__)) . $_SESSION['property'][$sPicId]['img_name'], $img);
}

if (!empty($_POST['go'])) {
    $_SESSION['property']['adid'] = $sHashTag;
    header('Location: ?p=myproperty&id=' . $sHashTag);
    exit;
}
?>
<p>&nbsp;</p>
</div>
