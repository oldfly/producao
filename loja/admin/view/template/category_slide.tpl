<?php echo $header; ?><?php echo $column_left; ?>
<div id="content">
  <div class="page-header">
		<div class="container-fluid">
		  <div class="pull-right">
			<button type="submit" form="form-featured" data-toggle="tooltip" title="<?php echo $button_save; ?>" class="btn btn-primary"><i class="fa fa-save"></i></button>
			<a href="<?php echo $cancel; ?>" data-toggle="tooltip" title="<?php echo $button_cancel; ?>" class="btn btn-default"><i class="fa fa-reply"></i></a></div>
		  <h1><?php echo $heading_title; ?></h1>
		  <ul class="breadcrumb">
			<?php foreach ($breadcrumbs as $breadcrumb) { ?>
			<li><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a></li>
			<?php } ?>
		  </ul>
		</div>
  </div>
  <div class="container-fluid">	
<?php if ($error_warning) { ?>
	<div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> <?php echo $error_warning; ?>
	<button type="button" class="close" data-dismiss="alert">&times;</button>
		</div>
<?php } ?>
<div class="loading" style="position:fixed;top:50%;left:50%"></div>
<div class="panel panel-default">
	<div class="panel-heading">  		
		<h3 class="panel-title"><i class="fa fa-pencil"></i> <?php echo $heading_title; ?></h3>
	</div>
	<div class="panel-body">
    <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form-boss-gallery" class="form-horizontal">
		<div class="form-group">
            <label class="col-sm-2 control-label" for="input-name"><?php echo $entry_name; ?></label>
            <div class="col-sm-10">
              <input type="text" name="name" value="<?php echo $name; ?>" placeholder="<?php echo $entry_name; ?>" id="input-name" class="form-control" />
              <?php if ($error_name) { ?>
              <div class="text-danger"><?php echo $error_name; ?></div>
              <?php } ?>
            </div>
		</div>		
		<div class="form-group">
            <label class="col-sm-2 control-label" for="input-title"><?php echo $entry_title; ?></label>
            <div class="col-sm-10">
				<?php foreach ($languages as $language) { ?>
					<div class="form-group">
					<div class="col-sm-11"><input name="title[<?php echo $language['language_id']; ?>]" value="<?php echo isset($title[$language['language_id']]) ? $title[$language['language_id']] : ''; ?>" class="form-control" /></div>
					<label class="col-sm-1 control-label"><img src="view/image/flags/<?php echo $language['image']; ?>" title="<?php echo $language['name']; ?>" /></label>
					</div>
				<?php } ?>
            </div>
        </div>
		<div class="form-group">
            <label class="col-sm-2 control-label" for="input-status"><?php echo $entry_status; ?></label>
            <div class="col-sm-10">
              <select name="status" id="input-status" class="form-control large">
                <?php if ($status) { ?>
                <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                <option value="0"><?php echo $text_disabled; ?></option>
                <?php } else { ?>
                <option value="1"><?php echo $text_enabled; ?></option>
                <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                <?php } ?>
              </select>
            </div>
        </div>
		<ul class="nav nav-tabs" id="module_content">
			<li class="active"><a href="#moduletab" data-toggle="tab"><?php echo $module_tab; ?></a></li>
			<li><a href="#modulesetting" data-toggle="tab"><?php echo $module_setting; ?></a></li>
		</ul>
		<div class="tab-content">
		<div id="moduletab" class="tab-pane active">
		<table id="images" class="table table-striped table-bordered table-hover">
          <thead>
            <tr>
			  <td class="text-right">#</td>
			  <td class="left"><?php echo $entry_image; ?></td>
              <td class="left"><?php echo $entry_category; ?></td>
              <td class="left"><?php echo $entry_image_size; ?></td>
              <td></td>
            </tr>
          </thead>
          
          <tbody class="boss_content">
		  <?php $image_row = 0; ?>
		  <?php if(isset($boss_category_images) && !empty($boss_category_images)) { ?>
          <?php foreach ($boss_category_images as $boss_category_image) { ?>
            <tr id="image-row<?php echo $image_row; ?>">
			  <td class="text-right"><?php echo $image_row+1; ?></td>
			  <td class="left"><div class="image">
				  <a href="" id="thumb-image<?php echo $image_row; ?>" data-toggle="image" class="img-thumbnail"><img src="<?php echo isset($boss_category_image['thumb'])?$boss_category_image['thumb']:$placeholder; ?>" alt="" title="" data-placeholder="<?php echo $placeholder; ?>" /></a>
                  <input type="hidden" name="boss_category_image[<?php echo $image_row; ?>][image]" value="<?php echo isset($boss_category_image['image'])?$boss_category_image['image']:''; ?>" id="input-image<?php echo $image_row; ?>" />
                  </div>
			  </td>

			  <td class="left">
				<select name="boss_category_image[<?php echo $image_row; ?>][category_id]" class="form-control">
				  <?php foreach ($categories as $category) { ?>
					<?php if ($category['category_id'] == $boss_category_image['category_id']) { ?>
					  <option value="<?php echo $category['category_id']; ?>" selected="selected"><?php echo $category['name']; ?></option>
					<?php } else { ?>
					  <option value="<?php echo $category['category_id']; ?>"><?php echo $category['name']; ?></option>
					<?php } ?>
				  <?php } ?>
				</select>
			  </td>
			  
              <td class="left">
				<table class="table table-striped table-bordered table-hover">
                  <tr>
					<td><?php echo $entry_image_width; ?></td>
					<td><input type="text" name="boss_category_image[<?php echo $image_row; ?>][image_width]" value="<?php echo $boss_category_image['image_width']; ?>" class="form-control" /></td>
				  </tr>
				  <tr>
					<td><?php echo $entry_image_height; ?></td>
					<td><input type="text" name="boss_category_image[<?php echo $image_row; ?>][image_height]" value="<?php echo $boss_category_image['image_height']; ?>" class="form-control" /></td>
				  </tr>
				</table>
			  </td>
			  
			  <td class="left"><button type="button" onclick="removeModule(<?php echo $image_row; ?>);" data-toggle="tooltip" title="<?php echo $button_remove; ?>" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td>
            </tr>
			<?php $image_row++; ?>
          <?php } } ?>
          </tbody>
          
          <tfoot>
            <tr>
              <td colspan="4"></td>
			   <td class="text-left"><button type="button" onclick="addImage();" data-toggle="tooltip" title="<?php echo $button_add_module; ?>" class="btn btn-primary"><i class="fa fa-plus-circle"></i></button></td>
            </tr>
          </tfoot>
        </table>
		</div>
		<div id="modulesetting" class="tab-pane">
			<ul class="nav nav-tabs" id="setting_tab">
				<?php $image_row = 0; ?>
				<?php if(isset($boss_category_images) && !empty($boss_category_images)) { ?>
				<?php foreach ($boss_category_images as $boss_category_image) { ?>
					<li id="tab_setting_<?php echo $image_row; ?>"><a href="#settingtab<?php echo $image_row; ?>" data-toggle="tab"><?php echo $setting_tab.' '.$image_row; ?></a></li>
					<?php $image_row++; ?>
				<?php } } ?>
			</ul>
			<div class="tab-content" id="setting_tab_content">
			  <?php $image_row = 0; ?>
			  <?php if(isset($boss_category_images) && !empty($boss_category_images)) { ?>
				<?php foreach ($boss_category_images as $boss_category_image) { ?>
				<div id="settingtab<?php echo $image_row; ?>" class="tab-pane active">
				  <table class="table table-striped table-bordered table-hover">
					<tr><td><?php echo $entry_show_name; ?></td>
					  <td class="left">
						<select name="boss_category_image[<?php echo $image_row; ?>][show_name]" id="input-show-name" class="form-control large">
						  <?php if ($boss_category_image['show_name']) { ?>
						  <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
						  <option value="0"><?php echo $text_disabled; ?></option>
						  <?php } else { ?>
						  <option value="1"><?php echo $text_enabled; ?></option>
						  <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
						<?php } ?>
						</select>
					  </td>
					</tr>
					<tr><td><?php echo $entry_hover_image; ?></td>
					  <td class="left">
						<select name="boss_category_image[<?php echo $image_row; ?>][hover_image]" id="input-hover-image" class="form-control large">
						  <?php if ($boss_category_image['hover_image']) { ?>
						  <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
						  <option value="0"><?php echo $text_disabled; ?></option>
						  <?php } else { ?>
						  <option value="1"><?php echo $text_enabled; ?></option>
						  <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
						<?php } ?>
						</select>
					  </td>
					</tr>
					<tr><td><?php echo $entry_text_css; ?></td>
					  <td class="left">
						<textarea class="form-control" name="boss_category_image[<?php echo $image_row; ?>][text_css]" ><?php echo isset($boss_category_image['text_css']) ? $boss_category_image['text_css'] : ''; ?></textarea>
					  </td>
					</tr>
					<tr><td><?php echo $entry_html; ?></td>
					  <td class="left">
						<ul class="nav nav-tabs" id="language_html_<?php echo $image_row; ?>">
							<?php foreach ($languages as $language) { ?>
							<li><a href="#tab-language-html-<?php echo $image_row; ?>-<?php echo $language['language_id']; ?>" data-toggle="tab"><img src="view/image/flags/<?php echo $language['image']; ?>" title="<?php echo $language['name']; ?>" /> <?php echo $language['name']; ?></a></li>
							<?php } ?>
						</ul>
						<div class="tab-content">
							<?php foreach ($languages as $language) { ?>
							<div class="tab-pane" id="tab-language-html-<?php echo $image_row; ?>-<?php echo $language['language_id']; ?>">	
								<textarea name="boss_category_image[<?php echo $image_row; ?>][<?php echo $language['language_id']; ?>][description]" placeholder="<?php echo $entry_description; ?>" id="input_description_<?php echo $image_row; ?>_<?php echo $language['language_id']; ?>" class="form-control"><?php echo isset($boss_category_image[$language['language_id']]['description']) ? $boss_category_image[$language['language_id']]['description'] : ''; ?></textarea>
							</div>
							<?php } ?>
						</div>
					  </td>
					</tr>
				  </table>
				</div>
				<?php $image_row++; ?>
			  <?php } } ?>
			</div>
		</div>
		</div>
      </form>
    </div>
  </div>
</div>
</div>
<script type="text/javascript"><!--
$('#module_content li:first-child a').tab('show');
$('#setting_tab li:first-child a').tab('show');

<?php if(isset($boss_category_images) && !empty($boss_category_images)) { ?>
	<?php foreach ($boss_category_images as $key => $boss_category_image) { ?>
		$('#language_html_<?php echo $key; ?> a:first').tab('show');
		<?php foreach ($languages as $language) { ?>
		$('#input_description_<?php echo $key; ?>_<?php echo $language['language_id']; ?>').summernote({height: 300});
		<?php } ?>
	<?php } ?>
<?php } ?>

var image_row = <?php echo $image_row; ?>;
function addImage() {
    
	html = '<tr id="image-row' + image_row + '">';
	html += '<td class="text-right">' + image_row + '</td>';
    
	html += '<td class="text-left"><div class="image">';
	html += '<a href="" id="thumb-image' + image_row + '" data-toggle="image" class="img-thumbnail"><img src="<?php echo $placeholder; ?>" alt="" title="" data-placeholder="<?php echo $placeholder; ?>" /></a>';
    html += '<input type="hidden" name="boss_category_image[' + image_row + '][image]" value="" id="input-image' + image_row + '" />';
	html +='</div></td>';
	
	html +='<td class="left">';
	html +='<select name="boss_category_image[' + image_row + '][category_id]" class="form-control">';
	<?php foreach ($categories as $category) { ?>
	html += '      <option value="<?php echo $category['category_id']; ?>"><?php echo $category['name']; ?></option>';
	 <?php } ?>
    html += '    </select></td>';
	
	html +='<td class="left"><table class="table table-striped table-bordered table-hover">';
    html +='<tr><td><?php echo $entry_image_width; ?></td>';
	html +='<td><input type="text" name="boss_category_image[' + image_row + '][image_width]" value="80" class="form-control" /></td></tr>';
	html +='<tr><td><?php echo $entry_image_height; ?></td>';
	html +='<td><input type="text" name="boss_category_image[' + image_row + '][image_height]" value="80" class="form-control" /></td></tr>';
	html +='</table></td>';
	
	html += '    <td class="text-left"><button type="button" onclick="removeModule(' + image_row + ');" data-toggle="tooltip" title="<?php echo $button_remove; ?>" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td>';
	html += '</tr>';
	
	$('.boss_content').append(html);
	
	html = '<li id="tab_setting_'+ image_row+'"><a href="#settingtab'+ image_row +'" data-toggle="tab"><?php echo $setting_tab; ?> '+ image_row +'</a></li>';
	
	$('#setting_tab').append(html);
	
	html = '<div id="settingtab'+ image_row+'" class="tab-pane active">';
	html += '<table class="table table-striped table-bordered table-hover">';
	html += '<tr><td><?php echo $entry_show_name; ?></td>';
	html += '<td class="left"><select name="boss_category_image['+image_row+'][show_name]" id="input-show-name" class="form-control large">';
	html += '<option value="1" selected="selected"><?php echo $text_enabled; ?></option>';
	html += '<option value="0"><?php echo $text_disabled; ?></option></select></td></tr>';
	html += '<tr><td><?php echo $entry_hover_image; ?></td>';
	html += '<td class="left"><select name="boss_category_image['+image_row+'][hover_image]" id="input-hover-image" class="form-control large">';
	html += '<option value="1" selected="selected"><?php echo $text_enabled; ?></option>';
	html += '<option value="0"><?php echo $text_disabled; ?></option></select></td></tr>';
	html += '<tr><td><?php echo $entry_html; ?></td>';
	html += '<td class="left">';
	html += '<ul class="nav nav-tabs" id="language_html_'+image_row+'">';
	<?php foreach ($languages as $language) { ?>
	html += '<li><a href="#tab-language-html-'+image_row+'-<?php echo $language['language_id']; ?>" data-toggle="tab"><img src="view/image/flags/<?php echo $language['image']; ?>" title="<?php echo $language['name']; ?>" /> <?php echo $language['name']; ?></a></li>';
	<?php } ?>
	html += '</ul>';
	html += '<div class="tab-content">';
	<?php foreach ($languages as $language) { ?>
	html += '<div class="tab-pane" id="tab-language-html-'+image_row+'-<?php echo $language['language_id']; ?>">';
	html += '<textarea name="boss_category_image['+image_row+'][<?php echo $language['language_id']; ?>][description]" placeholder="<?php echo $entry_description; ?>" id="input_description_'+image_row+'_<?php echo $language['language_id']; ?>" class="form-control"><?php echo isset($boss_category_image[$language['language_id']]['description']) ? $boss_category_image[$language['language_id']]['description'] : ''; ?></textarea></div>';
	<?php } ?>
	html += '</div></td></tr></table>';
	html += '<script type="text/javascript">';
	html += '$(\'#language_html_'+image_row+' a:first\').tab(\'show\');';
	<?php foreach ($languages as $language) { ?>
	html += '$(\'#input_description_'+image_row+'_<?php echo $language['language_id']; ?>\').summernote({height: 300});';
	<?php } ?>
	html += '</script></div>';
	
	$('#setting_tab_content').append(html);
	
	image_row++;
}

function removeModule(img_row){
	$('#image-row'+img_row).remove();
	$('#tab_setting_'+img_row).remove();
	$('#settingtab'+img_row).remove();
}
//--></script>

<?php echo $footer; ?>