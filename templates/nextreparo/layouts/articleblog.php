
<article class="uk-article <?php echo $this['config']->get('article', ''); ?>" <?php if ($permalink) echo 'data-permalink="'.$permalink.'"'; ?>>
    <div class="repare-s-blog">

        <?php if ($title) : ?>
                <h1 class="tm-article-title uk-article-title">
                    <?php if ($url && $title_link) : ?>
                        <a href="<?php echo $url; ?>" title="<?php echo $title; ?>"><?php echo $title; ?></a>
                    <?php else : ?>
                        <?php echo $title; ?>
                    <?php endif; ?>
                </h1>
        <?php endif; ?>


        <?php if ($author || $date || $category) : ?>
        <span class="tm-article-meta uk-article-meta">

            <?php

                $author   = ($author && $author_url) ? '<a href="'.$author_url.'">'.$author.'</a>' : $author;
                $date     = ($date) ? ($datetime ? '<time datetime="'.$datetime.'">'.JHtml::_('date', $date, JText::_('DATE_FORMAT_LC3')).'</time>' : JHtml::_('date', $date, JText::_('DATE_FORMAT_LC3'))) : '';
                $category = ($category && $category_url) ? '<a href="'.$category_url.'">'.$category.'</a>' : $category;

                if($author && $date) {
                    printf(JText::_('TPL_WARP_META_AUTHOR_DATE'), $author, $date);
                } elseif ($author) {
                    printf(JText::_('TPL_WARP_META_AUTHOR'), $author);
                } elseif ($date) {
                    printf(JText::_('TPL_WARP_META_DATE'), $date);
                }
                if ($category) {
                    echo ' ';
                    printf(JText::_('TPL_WARP_META_CATEGORY'), $category);
                }
            ?>

        </span>
        <?php endif; ?>
    
        <?php if ($image && $image_alignment == 'right') : ?>     

            <div class="uk-panel tm-article-image">
                <?php if ($url) : ?>
                    <a href="<?php echo $url; ?>" title="<?php echo $image_caption; ?>">
                <?php endif; ?>
                <img class="image-into-blog" src="<?php echo $image; ?>" alt="<?php echo $image_alt; ?>">
                <?php if ($url) : ?>
                    </a>
                <?php endif; ?>
            </div>    

        <?php endif; ?>

    <?php if ($image && $image_alignment != 'none') : ?>
    <div class="uk-grid" data-uk-grid-match="{target:'.uk-panel'}">
    <?php endif; ?>

        <?php if ($image && $image_alignment == 'left') : ?>
        <div>
            <div class="uk-panel tm-article-image" style="background:url(<?php echo $image; ?>) #FFF 50% 50% no-repeat; background-size: cover;">
                <?php if ($url) : ?><a class="uk-position-cover" href="<?php echo $url; ?>" title="<?php echo $image_caption; ?>"><?php endif; ?>
                <img class="uk-invisible" src="<?php echo $image; ?>" alt="<?php echo $image_alt; ?>">
                <?php if ($url) : ?></a><?php endif; ?>
            </div>
        </div>
        <?php endif; ?>

        <?php if ($image && $image_alignment != 'none') : ?>
        <div class="uk-flex uk-flex-center uk-flex-middle">
            <div>
        <?php endif; ?>

                <?php if ($image && $image_alignment == 'none') : ?>

                    <?php if ($url) : ?>
                    <a href="<?php echo $url; ?>" title="<?php echo $title; ?>" class="tm-article-image tm-article-image-large uk-display-block" style="background:url(<?php echo $image; ?>) #FFF 50% 50% no-repeat; background-size: cover;">
                    <?php else : ?>
                    <div class="tm-article-image tm-article-image-large" style="background:url(<?php echo $image; ?>) #FFF 50% 50% no-repeat; background-size: cover;">
                    <?php endif; ?>
                        <img class="uk-invisible" src="<?php echo $image; ?>" alt="<?php echo $image_alt; ?>">
                    <?php if ($url) : ?>
                    </a>
                    <?php else : ?>
                    </div>
                    <?php endif; ?>

                <?php endif; ?>

                <?php echo $hook_aftertitle; ?>

                <?php echo $hook_beforearticle; ?>

                <?php if ($article) : ?>
                <div class="tm-article-content uk-margin">
                    <?php echo $article; ?>
                </div>
                <?php endif; ?>


                <?php if ($tags) : ?>
                    <p><?php echo JText::_('TPL_WARP_TAGS').': '.$tags; ?></p>
                <?php endif; ?>

                <?php if ($more) : ?>
                    <p><a class="uk-button uk-button-small uk-button-primary" href="<?php echo $url; ?>" title="<?php echo $title; ?>"><?php echo $more; ?></a></p>
                <?php endif; ?>

                <?php if ($edit) : ?>
                   <p><?php echo $edit; ?></p>
                <?php endif; ?>

        <?php if ($image && $image_alignment != 'none') : ?>
            </div>
        </div>
        <?php endif; ?>







    <?php if ($image && $image_alignment != 'none') : ?>
    </div>
    <?php endif; ?>

    <?php if ($previous || $next) : ?>
    <ul class="uk-pagination">
        <?php if ($previous) : ?>
        <li class="uk-pagination-previous">
            <a href="<?php echo $previous; ?>"><i class="uk-icon-angle-double-left"></i> <?php echo JText::_('JPREV'); ?></a>
        </li>
        <?php endif; ?>

        <?php if ($next) : ?>
        <li class="uk-pagination-next">
            <a href="<?php echo $next; ?>"><?php echo JText::_('JNEXT'); ?> <i class="uk-icon-angle-double-right"></i></a>
        </li>
        <?php endif; ?>
    </ul>
    <?php endif; ?>

    <?php echo $hook_afterarticle; ?>
    </div>
</article>
