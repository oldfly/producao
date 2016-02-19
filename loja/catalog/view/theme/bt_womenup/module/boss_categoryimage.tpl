<?php if(!empty($category_images)){ ?>
<div class="container">
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12">
	<div class="boss-category-image">
		<?php if(!empty($heading_title)){ ?>
		<div class="category-image-title"><h3><?php echo $heading_title; ?></h3></div>
		<?php } ?>
		<div id="category_image" class="isotope">
			<?php foreach ($category_images as $category_image) { ?>
				<div class="item<?php echo $category_image['hover_image']?" image-hover":""; ?> <?php echo $category_image['text_css']?$category_image['text_css']:""; ?>" style="width:<?php echo $category_image['image_width']; ?>px;height:<?php echo $category_image['image_height']; ?>px;">
					<img src="<?php echo $category_image['image']; ?>" alt="<?php echo $category_image['name']; ?>">
					<?php if($category_image['show_name']) { ?>
					  <div class="category-name">
						<!-- <a href="<?php echo $category_image['href']; ?>"><?php // echo $category_image['name']; ?>
							<?php echo $category_image['description']; ?>
						</a> -->						
							<?php echo $category_image['description']; ?>
					  </div>
					<?php } ?>
				</div>
			<?php } ?>
		</div>
	</div>
</div>
</div>
</div>
<script type="text/javascript"><!--
$(function() {
  $('.isotope').isotope({
    layoutMode: 'packery',
    itemSelector: '.item'
  });
  
});
//--></script>
<?php } ?>