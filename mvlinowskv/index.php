<?php get_header(); ?>
<div id="main" class="site-main">
    <div id="content">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div class="box-post">
            <h1 class="h1-post"><?php the_title(); ?></h1>
        <h4>Posted on <?php the_time('F jS, Y') ?></h4>
        <div class="content"><?php the_content(__('(more...)')); ?></div></p>
        </div>
        <?php endwhile; else: ?>
        <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
        <?php endif; ?>
        </div>
        </div>
        <?php get_sidebar(); ?>
        </div>
    
    </div>
</div>

<?php get_footer(); ?>