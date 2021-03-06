<?php get_header();?>
	<div class="container">
		<div class="row">
			<div class="fourcol">
				<div class="widget">
					<h2>Senaste från bloggen</h2>
					<ul>
					<?php
						$args = array( 'numberposts' => 2, 'category' => 4, 'post_status' => 'publish,' );
						$recent_posts = wp_get_recent_posts( $args );
						foreach( $recent_posts as $recent ){
							echo '<li><a href="' . get_permalink($recent["ID"]) . '" title="Look '.esc_attr($recent["post_title"]).'" >' .   $recent["post_title"].'</a> </li> ';
						}
					?>
					</ul>
				</div>
			</div>
			<div class="fourcol">
				<div class="widget">
					<h2>Jag lyssnar på</h2>
					<iframe src="https://embed.spotify.com/?uri=spotify:user:iamlinus:starred" width="330" height="110" frameborder="0" allowtransparency="true"></iframe>
				</div>
			</div>
			<div class="fourcol last">
				<div class="widget">
				<h2>@iamlinus på Twitter</h2>
				<?php
					$args = array( 'numberposts' => 1, 'category' => 9, 'post_status' => 'publish,' );
					$recent_posts = wp_get_recent_posts( $args );
					foreach( $recent_posts as $recent ){
						echo '<p>' .   $recent["post_content"].'</p> ';
					}
				?>
				</div>
			</div>
		</div> <!-- /Row upper widgets -->

		<div class="row">
			<div id="logo">
				<h1>iam<span>LINUS</span></h1>
			</div>
		</div> <!-- /Row logo -->

		<div class="row startpage">
				<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar(startpage) ) : else : ?>
				<?php endif; ?>
		</div> <!-- /Row lower widgets-->

		<div class="row">
			<div class="twelvecol">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			    <div class="post" id="post-<?php the_ID(); ?>">
					<div class="limpan"></div>
			        <div class="entry">
					  <?php the_content(__('Continue Reading &#187;')); ?>
		              <?php wp_link_pages(); ?>
		              <?php $sub_pages = wp_list_pages( 'sort_column=menu_order&depth=1&title_li=&echo=0&child_of=' . $id );?>
		              <?php if ($sub_pages <> "" ){?>
		              <?php }?>
		            </div>
	            </div>
	        </div>
	    </div> <!-- /Row  Post -->
	<?php endwhile; else: ?>
	<?php endif; ?>
<?php get_footer();?>