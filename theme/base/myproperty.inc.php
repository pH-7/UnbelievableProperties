<div style="text-align:center">
	<?php if (!empty($_SESSION['property']) && (!empty($_GET['id']) && $_GET['id'] == $_SESSION['property']['adid'])): ?>
	    <?php foreach($_SESSION['property'] as $sKey => $aPicAd): ?>
	        <?php if(isset($aPicAd['title'], $aPicAd['city'], $aPicAd['price'], $aPicAd['img_name'], $aPicAd['id'])): ?>
	            <h1><?php echo Library::escape($aPicAd['title'] . ', ' . $aPicAd['city']) ?></h1>
	            <h2>&euro;<?php echo Library::escape($aPicAd['price']) ?></h2>
                <p><img src="<?php echo $aPicAd['img_name'] ?>" height="400px" width="400px" alt="Pic" /></p>
                <p>URL of your Advert:<br /> <input type="url" name="share" value="<?php echo Config::URL . '?p=myproperty&id=' . $_SESSION['property']['adid'] ?>"  style="width:400px" readonly="readonly" onclick="this.select()" /></p>
	        <?php endif ?>
	    <?php endforeach ?>
	<?php else: ?>
        <p>There is no property set for the this ID.</p>
	<?php endif; ?>
</div>
