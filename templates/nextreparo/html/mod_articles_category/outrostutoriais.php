<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_category
 *
 * @copyright   Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>
<ul class="category-module<?php echo $moduleclass_sfx; ?>">
<?php if ($grouped) : ?>
	<?php foreach ($list as $group_name => $group) : ?>
	<li>
		<ul id="lista-home">
			<?php foreach ($group as $item) : ?>
				<li>
					<?php if ($params->get('link_titles') == 1) : ?>
						<a class="mod-articles-category-title <?php echo $item->active; ?>" href="<?php echo $item->link; ?>">
						<?php echo $item->title; ?>
						</a>
					<?php else : ?>
						<?php echo $item->title; ?>
					<?php endif; ?>

					<?php if ($item->displayHits) : ?>
						<span class="mod-articles-category-hits">
						(<?php echo $item->displayHits; ?>)  </span>
					<?php endif; ?>

					<?php if ($params->get('show_author')) :?>
						<span class="mod-articles-category-writtenby">
						<?php echo $item->displayAuthorName; ?>
						</span>
					<?php endif;?>

					<?php if ($item->displayCategoryTitle) :?>
						<span class="mod-articles-category-category">
						(<?php echo $item->displayCategoryTitle; ?>)
						</span>
					<?php endif; ?>

					<?php if ($item->displayDate) : ?>
						<span class="mod-articles-category-date"><?php echo $item->displayDate; ?></span>
					<?php endif; ?>

					<?php if ($params->get('show_introtext')) :?>
						<p class="mod-articles-category-introtext">
							<?php echo $item->displayIntrotext; ?>
						</p>
					<?php endif; ?>

					<?php if ($params->get('show_readmore')) :?>
						<p class="mod-articles-category-readmore">
						<a class="mod-articles-category-title <?php echo $item->active; ?>" href="<?php echo $item->link; ?>">
						<?php if ($item->params->get('access-view') == false) :
							echo JText::_('MOD_ARTICLES_CATEGORY_REGISTER_TO_READ_MORE');
						elseif ($readmore = $item->alternative_readmore) :
							echo $readmore;
							echo JHtml::_('string.truncate', $item->title, $params->get('readmore_limit'));
								if ($params->get('show_readmore_title', 0) != 0) :
									echo JHtml::_('string.truncate', ($this->item->title), $params->get('readmore_limit'));
									endif;
						elseif ($params->get('show_readmore_title', 0) == 0) :
							echo JText::sprintf('MOD_ARTICLES_CATEGORY_READ_MORE_TITLE');
						else :
							echo JText::_('MOD_ARTICLES_CATEGORY_READ_MORE');
							echo JHtml::_('string.truncate', ($item->title), $params->get('readmore_limit'));
						endif; ?>
						</a>
						</p>
					<?php endif; ?>
				</li>
			<?php endforeach; ?>
		</ul>
	</li>
	<?php endforeach; ?>
<?php else : ?>
	<?php  foreach ($list as $item) : $imagem_intro = json_decode($item->images); ?>
		<li>
		 <div class="uk-grid-new">
		 	<p class="uk-clearfix">

				<?php if ($params->get('link_titles') == 1) : ?>

					<?php if(isset($imagem_intro->image_intro)): ?>

				<a href="<?php echo $item->link; ?>">
					<img height="auto" width="120px" class="uk-align-medium-left" src="<?php  echo  $imagem_intro->image_intro; ?>" />
				</a>

				<?php endif; ?>
		
		
			<?php if ($params->get('show_author')) :?>
				<span class="title-autor-col" style="color:#333;">
					<?php echo $item->displayAuthorName; ?>
				</span>
			<?php endif;?>
			

			<?php if ($item->displayCategoryTitle) :?>
				<span class="title-autor-topsm mod-articles-category-category">
				<?php echo $item->displayCategoryTitle; ?>
				</span>
			<?php endif; ?>

			
				
					<a class="mod-articles-category-title <?php echo $item->active; ?>" href="<?php echo $item->link; ?>">
					<?php
					$titulo = $item->title;
					if (strlen($titulo) >= 60) {
					echo substr($titulo, 0,  60)."...";	
					}
					else{
						echo $titulo;
					}
					 ?>

				</a>
			</p>
			
			<?php else : ?>
				<?php echo $item->title; ?>
			<?php endif; ?>

			<?php if ($item->displayHits) :?>
				<span class="mod-articles-category-hits">
				(<?php echo $item->displayHits; ?>)  </span>
			<?php endif; ?>

			<?php if ($item->displayDate) : ?>
				<span class="mod-articles-category-date"><?php echo $item->displayDate; ?></span>
			<?php endif; ?>

			<?php if ($params->get('show_introtext')) :?>
				<p class="mod-articles-category-introtext catid<?php echo $item->catid;?>">
				<a href="<?php echo $item->link; ?>"><?php echo $item->displayIntrotext; ?></a>
				</p>
			<?php endif; ?>

			<?php if ($params->get('show_readmore')) :?>
				<p class="mod-articles-category-readmore">
				<a class="mod-articles-category-title <?php echo $item->active; ?>" href="<?php echo $item->link; ?>">
					<?php if ($item->params->get('access-view') == false) :
						echo JText::_('MOD_ARTICLES_CATEGORY_REGISTER_TO_READ_MORE');
					elseif ($readmore = $item->alternative_readmore) :
						echo $readmore;
						echo JHtml::_('string.truncate', $item->title, $params->get('readmore_limit'));
					elseif ($params->get('show_readmore_title', 0) == 0) :
						echo JText::sprintf('MOD_ARTICLES_CATEGORY_READ_MORE_TITLE');
					else :
						echo JText::_('MOD_ARTICLES_CATEGORY_READ_MORE');
						echo JHtml::_('string.truncate', $item->title, $params->get('readmore_limit'));
					endif; ?>
				</a>
				</p>
			<?php endif; ?>
			</div>
		</li>
	<?php endforeach; ?>
<?php endif; ?>
</ul>
