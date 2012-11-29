<?php get_header();?>
<div id="main">
  <div class="row">
    <div id="logo">
      <a href="/"><h2>iam<span>LINUS</span></h2></a>
    </div>
  </div> <!-- /row logo -->

  <div class="row">
    <div class="twocol">
    </div>
  	<div class="eightcol">
      <div id="content">
  	    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div class="post <?php
          $posttags = get_the_tags();
          if ($posttags) 
          {
            foreach($posttags as $tag) 
            {
              echo $tag->name . ' '; 
            }
          }
          ?>" id="post-<?php the_ID(); ?>">
          
          <h1 class="title"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h1>
  	      <div class="entry">
            <?php the_content(__('Continue Reading &#187;')); ?>
            <?php wp_link_pages(); ?>
          </div>
          <div class="meta">
            <p>Skrivet av  <?php the_author(); ?>   | Postat den <?php the_time('d'); ?> <?php the_time('M'); ?> <?php the_time('Y'); ?> <?php edit_post_link(); ?>
            </p> 
    			</div> <!-- /Meta -->
        </div> <!-- /Post -->
        <?php endwhile; else: ?>
        <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
        <?php endif; ?>
      </div> <!-- /Content -->
    </div>
    <div class="twocol last">
    </div>
  </div> <!-- /Row content -->
  <div class="row">
    <div class="twocol">
    </div>
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>          
      <?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar(footerpost) ) : else : ?>
      <?php endif; ?>
    <div class="twocol last">
    </div>
  </div> <!-- /Row Widget -->
  <?php endwhile; else: ?>
  <?php endif; ?>
  </div>

<?php get_footer();?>