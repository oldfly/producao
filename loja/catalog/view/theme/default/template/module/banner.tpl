<?php if (count($banners) > 1 ) : ?>

<div id="banner<?php echo $module; ?>" class="owl-carousel">
  <?php foreach ($banners as $banner) { ?>
  <div class="item">
    <?php if ($banner['link']) { ?>
    <a href="<?php echo $banner['link']; ?>"><img src="<?php echo $banner['image']; ?>" alt="<?php echo $banner['title']; ?>" class="img-responsive" /></a>
    <?php } else { ?>
    <img src="<?php echo $banner['image']; ?>" alt="<?php echo $banner['title']; ?>" class="img-responsive" />
    <?php } ?>
  </div>
  <?php } ?>
</div>
<!--
<script type="text/javascript">
$('#banner<?php echo $module; ?>').owlCarousel({
	items: 6,
	autoPlay: 3000,
	singleItem: true,
	navigation: false,
	pagination: false,
	transitionStyle: 'fade'
});
</script>
-->

<?php elseif(count($banners) == 1) : ?>
<?php 
  $background  = "background-image: url('".$banners[0]['image']."');";
  $background .= "background-size: contain;";
  $background .= "background-repeat: no-repeat;";
?>
  <div id="banner<?php echo $module; ?>" style="margin: 50px auto 0; display: block; position: relative;" >
    <a href="<?php echo $banners[0]['link']; ?>">
      <img width="100%" src="http://lorempixel.com/942/100/nightlife/?>" />
    </a>
  </div>
<?php endif;?>
