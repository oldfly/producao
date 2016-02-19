<?php if(!empty($category_images)){ ?>

	<?php $width = count($category_images); ?>
	<div class="boss-category-image">
		<?php if(!empty($heading_title)){ ?>
		<div class="category-image-title"><h3><?php echo $heading_title ?></h3></div>
		<?php } ?>
		<div class="main-category"  >
			<?php $i = 1; ?>
			<?php foreach ($category_images as $category_image) { ?>
			<?php 
				if (!empty($category_image['image'])){
					$background  = "background-image: url('".$category_image['image']."');";
					$background .= "background-repeat: no-repeat; background-size: cover;";
				}
			?>
			<?php if ($i % 2 == 0){ ?>
			<a href="<?php echo $category_image['href']; ?>">
			<div class="store cat-right catitem<?php echo $category_image['hover_image']?" image-hover":""; ?> <?php echo $category_image['text_css']?$category_image['text_css']:""; ?>" style="<?php echo $background; ?>" alt="<?php echo $category_image['name']; ?>" />
				<!--
					<h3> 
						<?php if($category_image['show_name']) { ?>
						  <div class="category-name">
							<?php echo $category_image['name']; ?>
						  </div>
						<?php } ?>
					</h3>
					<p><?php echo strip_tags($category_image['description']); ?></p>
				-->
			</div>
			</a>
			<?php }else {?>
			<a  href="<?php echo $category_image['href']; ?>">
			<div class="store cat-left catitem<?php echo $category_image['hover_image']?" image-hover":""; ?> <?php echo $category_image['text_css'] ? $category_image['text_css']:""; ?>" style="<?php echo $background ?>">
				<!--
					<h3>				
						<?php if($category_image['show_name']) { ?>
							<?php // echo $category_image['name']; ?>
						<?php } ?>
					</h3>
					<p><?php echo strip_tags($category_image['description']); ?></p>
				-->
			</div>
			</a>

			<?php } $i++; ?>
			<?php } ?>
		</div>
		<?php 
		
		$items = ceil(count($category_images) / 2);
		if ($items > 1) : 
		?>
		<div class="navBulletsWrapper">
			<?php for ($i=1; $i <= $items; $i++) { ?>
			<div class="" rel="<?php echo $i; ?>"><?php echo $i; ?></div>
			<?php } ?>
		</div>
		<?php endif; ?>
		</div>





<script type="text/javascript"><!--
$(function() {
  $('.isotope').isotope({
    layoutMode: 'packery',
    itemSelector: '.item'
  });

  var items = $('.store').length;
  var width = ($('.store').width()+50) * items;

 $('.main-category').width(width);
 $('.navBulletsWrapper').find('div').first().addClass('active');
 $('.navBulletsWrapper').find('div').each(function(){
 	$(this).bind('click', function(ev) {
 		if (!$(this).hasClass('active')){
 			ev.preventDefault();
 			console.log($(this).index() * ($('.store').width()+50) );
 			$('.main-category').css("transform","translateX("+$(this).index() * -($('.store').width()+50)+"px)");
 			$('.navBulletsWrapper').find('.active').removeClass('active');
 			$(this).addClass('active');
 		}
 	});
 });
  
});
--></script>
<?php } ?>