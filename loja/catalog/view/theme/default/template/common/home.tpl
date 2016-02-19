<?php echo $header; ?>
<?php echo $top_slideshow; ?>
<div class="container" style="width: 960px; box-shadow: 0px 0px 5px 1px #989898; padding-top: 15px;">
  <ul class="breadcrumb">
    <?php foreach ($breadcrumbs as $breadcrumb) { ?>
    <li><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a></li>
    <?php } ?>
  </ul>
  <div class="row" ><?php echo $column_left; ?>
    
    <?php if ($column_left && $column_right) { ?>
    <?php $class = 'col-sm-6'; ?>
    <?php } elseif ($column_left || $column_right) { ?>
    <?php $class = 'col-sm-9'; ?>
    <?php } else { ?>
    <?php $class = 'col-sm-12'; ?>
    <?php } ?>
    
    <div id="content" class="<?php echo $class; ?>">
    <?php echo $content_top; ?>
    <?php echo $content_bottom; ?>
    </div>
    <?php echo $column_right; ?></div>
</div>
<?php echo $footer; ?>