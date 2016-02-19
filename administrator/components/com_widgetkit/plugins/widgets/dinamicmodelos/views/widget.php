 
<?php

function checkChildren($id){
    $categories = JCategories::getInstance('Content');
    $categoria = $categories->get($id);
    $filhosdap = $categoria->getChildren();
    return $filhosdap;
}

    $app = JFactory::getApplication();
    $option = $app->input->get('option',0,'STRING');
    $view = $app->input->get('view',0,'STRING');
    $catget = $app->input->get('id',0,'INT');

    if($catget && $view == 'category' && $option == 'com_content'){
        $filhosdaps = checkChildren($catget);
    ?>
<div data-uk-grid-margin="" class="uk-grid uk-grid-small">    
<?php
if($filhosdaps){

   foreach($filhosdaps as $k => $cat){ ?>
    
    <?php    
        $subfilhos =  checkChildren($cat->id);
        if(count($subfilhos)){
    ?>
            <div class="uk-width-medium-1-5 uk-row-first">
                <div class="uk-panel uk-panel-box">
                    <div class="uk-panel-teaser">
                        <a href="<?php echo JRoute::_(ContentHelperRoute::getCategoryRoute($cat->id));?>">
                            <?php echo $cat->description ? $cat->description : '<img src="http://lorempixel.com/400/200/sports/" alt="">'; ?>
                        </a>
                    </div>
                    <h3><a href="<?php echo JRoute::_(ContentHelperRoute::getCategoryRoute($cat->id));?>"><?php echo $cat->title ?> </a></h3>
                </div>
             </div>

       
    <?php }else{ ?>
         
            <div class="uk-width-medium-1-5 uk-row-first">
                <div class="uk-panel uk-panel-box">
                    <div class="uk-panel-teaser">
                        <a href="<?php echo JRoute::_(ContentHelperRoute::getCategoryRoute($cat->id));?>">
                            <?php echo $cat->description ? $cat->description : '<img src="http://lorempixel.com/400/200/sports/" alt="">'; ?>
                        </a>
                    </div>
                    <h3><a href="<?php echo JRoute::_(ContentHelperRoute::getCategoryRoute($cat->id));?>"><?php echo $cat->title ?> </a></h3>
                </div>
           </div>
        
    <?php
        }
    }
 } 

?>

</div>

<?php } ?>

