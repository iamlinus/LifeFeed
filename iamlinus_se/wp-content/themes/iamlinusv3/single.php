<?php get_header();?>
<div id="main">
<div class="row">
<div id="logo">
<a href="/"><h2>iam<span>LINUS</span></h2></a>
</div>
</div>

<div class="row">
<div class="onecol"></div>
	<div class="sixcol">
	<div id="content">
	    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	        <div class="post <?php
$posttags = get_the_tags();
if ($posttags) {
  foreach($posttags as $tag) {
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
		<p>Skrivet av  <?php the_author(); ?>   | Postat den 
			<?php the_time('d') ?>
              <?php the_time('M') ?>
              <?php the_time('Y') ?>
 | Taggat med <?php
$posttags = get_the_tags();
if ($posttags) {
  foreach($posttags as $tag) {
    echo $tag->name . ' '; 
  }
}
?>  <?php edit_post_link(); ?></p> 
      			</div>
   
</div>
<?php endwhile; else: ?>
<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>
</div>
</div>
<div class="oncol"></div>
<div class="fourcol last">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>          
<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar(1) ) : else : ?>
<?php endif; ?>
<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar(2) ) : else : ?>
<?php endif; ?>
<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar(3) ) : else : ?>
<?php endif; ?>
</div>
          </div>
     <?php endwhile; else: ?>
      <?php endif; ?>
	</div>
</div>
<?php get_footer();?>