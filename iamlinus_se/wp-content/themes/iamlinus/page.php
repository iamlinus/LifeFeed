<?php get_header();?>
<div id="main">



<div class="row">
		
		<div class="threecol">
			<p>Bild på limpan</p>
		</div>
		
		<div class="ninecol last">
	<!-- <div id="content"> -->
	    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	        <div class="post" id="post-<?php the_ID(); ?>">
           
			      <div class="entry">
              <?php the_content(__('Continue Reading &#187;')); ?>
              <?php wp_link_pages(); ?>
              <?php $sub_pages = wp_list_pages( 'sort_column=menu_order&depth=1&title_li=&echo=0&child_of=' . $id );?>
              <?php if ($sub_pages <> "" ){?>
              <ul>
                <?php echo $sub_pages; ?>
              </ul>
              <?php }?>
            </div>
          </div>
          </div>
<!--      <?php endwhile; else: ?>
          <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
      <?php endif; ?>
      <p align="center"><?php posts_nav_link(' - ','&#171; Prev','Next &#187;') ?></p> -->
	</div>
  <?php get_sidebar();?>
  <?php get_footer();?>