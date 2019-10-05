<?php get_header(); ?>
            <section id="post" class="wrapper bg-i" data-bg="<?php echo the_post_thumbnail_url()?>" width = '1000px'>
				<div class="inner eroor" >
                <style>
                    .error{
                        font-size: 200px;
                        text-aligin: center;
                    }
                </style>
                    <h1 class='error'>404 ERROR..</h1>
				</div>
            </section>
<?php get_footer(); ?>