<?php get_header();?>
<div class="container">

<div class="row">
<div class="fourcol">
<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar(1) ) : else : ?>
<?php endif; ?>
</div>

<div class="fourcol">
<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar(2) ) : else : ?>
<?php endif; ?>
</div>

<div class="fourcol last">
<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar(3) ) : else : ?>
    <?php endif; ?>
</div>
</div>
<div class="row">
<div id="logo">
<h1>404<span> not found</span></h1>
</div>
</div>

<div class="row">
<div class="fourcol">
<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar(4) ) : else : ?>
<?php endif; ?>
</div>

<div class="fourcol">
<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar(5) ) : else : ?>
<?php endif; ?>
</div>

<div class="fourcol last">
<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar(6) ) : else : ?>
    <?php endif; ?>
</div>
</div>





<div class="row">
		<div class="fourcol">
			<div class="limpan"></div>
		</div>
		
		<div class="sevencol last"><div class="entry">
	<p>Ajaj, något har gått snett och sidan kan inte hittas. Gå till <a href="http://www.iamlinus.se">startsidan</a> eller <a href="mailto:hello@iamlinus.se">kontakta mig</a>!</p>
            </div>
          </div>
          </div>
          </div>
	</div>
  <?php get_footer();?>