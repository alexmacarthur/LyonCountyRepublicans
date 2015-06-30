<!DOCTYPE html>
<html style="margin-top:0!important;">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />
	<title><?php bloginfo('title')?></title>
	<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico" type="/image/x-icon"/>
	
	<?php wp_head()?>

	<!-- Google Analytics -->
	<script>

	</script>

</head>

<body class="no-js">

	<div class="wrapper">

	<nav>

		<div class="logo-holder">
			<?php get_template_part('img/inline', 'logo.svg'); ?>
		</div>

		<?php 
			$defaults = array(
				'theme_location'  => '',
				'menu'            => '',
				'container'       => 'div',
				'container_class' => 'nav-links-holder',
				'container_id'    => '',
				'menu_class'      => 'menu',
				'menu_id'         => '',
				'echo'            => true,
				'fallback_cb'     => 'wp_page_menu',
				'before'          => '',
				'after'           => '',
				'link_before'     => '',
				'link_after'      => '',
				'items_wrap'      => '<ul class="nav-links">%3$s</ul>',
				'depth'           => 0,
				'walker'          => ''
				);

			wp_nav_menu($defaults); 
		?>
			
	</nav>

	<div class="hero-banner">

		<div class="background"></div>

	</div>