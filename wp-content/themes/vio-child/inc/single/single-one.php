<?php
/**
 * Template for Blog One
 *
 * @package vio
 */

?>

<?php while ( have_posts() ) : ?>

    <?php // Get post type
    $postType = get_post_type(); ?>

    <div id="primary post-<?php the_ID(); ?>" <?php post_class( 'content-area' ); ?>>
    	<main id="main" class="site-main">
    	    <!-- wraper_blog_banner style-one -->
            <?php if ( has_post_thumbnail() ) { ?>
                <section class="wraper_blog_banner style-one" style="background-image:url( <?php the_post_thumbnail_url(); ?> )">
            <?php } else { ?>
                <section class="wraper_blog_banner style-one">
            <?php } ?>
                <!-- wraper_blog_banner_main -->
                <div class="wraper_blog_banner_main">
                    <div class="container">
        				<!-- blog_banner_main -->
        				<div class="row blog_banner_main">
                            <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 text-center" style="float:none">
                            	<!-- blog_banner_main_item -->
                            	<div class="blog_banner_main_item">
                            	    <!-- entry-header -->
                            	    <header class="entry-header">
                                		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                                	</header>
                                	<!-- entry-header -->
                        	    </div>
                        	    <!-- blog_banner_main_item -->
                    	    </div>
                	    </div>
                	    <!-- blog_banner_main -->
            	    </div>
                </div>
                <!-- wraper_blog_banner_main -->
                <!-- wraper_blog_banner_tags -->
                <div class="wraper_blog_banner_tags">
                    <div class="container">
                        <!-- row -->
        				<div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12" style="float:none">
                            	<!-- blog_banner_tags -->
                				<div class="row blog_banner_tags">
                                    <div class="col-md-6 col-xs-6 text-right">
                                    	<!-- blog_banner_tags_item -->
                                    	<div class="blog_banner_tags_item">
                                    	    <p class="site-meta"><a href="<?php the_permalink();?>"><?php echo get_the_date();?></a></p>
                                	    </div>
                                	    <!-- blog_banner_tags_item -->
                            	    </div>
                            	    <div class="col-md-6 col-xs-6 text-left">
                                    	<!-- blog_banner_tags_item -->
                                    	<div class="blog_banner_tags_item">
                                    	    <p class="site-meta">
                                    	        <?php 
                                                if($postType == "resources") {
                                                    $term = get_field('category');
                                                    echo ucfirst($term);
                                                }
                                                else {
                                                    $category_detail = get_the_category( get_the_id() );
                                        	        foreach ( $category_detail as $item ) {
                                        	        $category_link = get_category_link( $item->cat_ID );
                                        	        ?>
                                        	        <?php echo esc_html( $item->name ); ?>
                                        	        <?php } 
                                                } ?>
                                    	       
                                	        </p>
                                	    </div>
                                	    <!-- blog_banner_tags_item -->
                            	    </div>
                        	    </div>
                        	    <!-- blog_banner_tags -->
                    	    </div>
                    	    <div class="col-lg-6 col-md-6 col-sm-4 col-xs-12"></div>
                	    </div>
                	    <!-- row -->
            	    </div>
                </div>
                <!-- wraper_blog_banner_tags -->
    	    </section>
    	    <!-- wraper_blog_banner style-one -->
    		<!-- wraper_blog_main -->
    		<section class="wraper_blog_main style-one">
    			<div class="container">
    				<!-- row -->
    				<div class="row">
                        <div class="col-lg-2 col-md-2 col-sm-1 col-xs-12"></div>
                        <div class="col-lg-8 col-md-8 col-sm-10 col-xs-12">
                        	<!-- blog_single style-one -->
                        	<div class="blog_single style-one">
                                <?php // If resource, we check if an Hubspot protects the content
                                $contentLocked = "";
                                $hubspot_form = get_field('hubspot_form');
                                $title_form = get_field('title');
                                $text_preview = get_field('text_preview') ?? '';
                                $current_param = isset($_GET['unlock']) ? $_GET['unlock'] : '';

                                if(
                                    $postType == "resources" 
                                    && isset($hubspot_form) 
                                    && $hubspot_form !== ""
                                    && $current_param <> $post->ID
                                ){

                                    if($text_preview !== ""){
                                        echo '<div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                    <div class="textPreview">
                                                    '.$text_preview.'
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">';
                                    }

                                    //echo $hubspot_form;
                                    $contentVisibility = "contentLocked";
                                    echo '<div id="hubspotForm" data-post-id="'.$post->ID.'">';
                                    echo '<h2 class="text-black">'.$title_form.'</h2>';
                                    echo $hubspot_form;
                                    echo '</div>';

                                    if($text_preview !== ""){
                                        echo '</div>
                                            </div>';
                                    }
                                }
                                ?>
                                <div class="<?php echo $contentVisibility ?>">
                                    <?php
                                    the_post(); get_template_part( 'template-parts/content-single-one', get_post_format() );                                
                                    ?>
                                </div>
                    			<?php 
                    			$tags = get_the_tags( $post->ID );
                    			if ( true == vio_global_var( 'display_tags', '', false ) && ( ! empty( $tags ) ) ) : ?>
                            		<!-- post-tags -->
                            		<div class="post-tags">
                            			<?php
                            			/* translators: used between list items, there is a space after the comma */
                            			$tags_list = get_the_tag_list( '', ' ' );
                            			if ( $tags_list ) {
                            				printf(
                            					esc_html( '%1$s' ) .
                            					wp_kses_post( '' ),
                            					wp_kses_post( $tags_list )
                            				);
                            			}
                            			?>
                            		</div>
                            		<!-- post-tags -->
                        		<?php endif; ?>
                        	</div>
                        	<!-- blog_single style-one -->
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-1 col-xs-12"></div>
                    </div>
    				<!-- row -->
    			</div>
    		</section>
    		<!-- wraper_blog_main -->
    		<?php if ( true == vio_global_var( 'display_author_information', '', false ) && get_the_author_meta( 'description' ) ) : ?>
        		<!-- wraper_blog_author style-one -->
                <div class="wraper_blog_author style-one">
        			<div class="container">
        				<!-- row -->
        				<div class="row">
        				    <div class="col-lg-2 col-md-2 col-sm-1 col-xs-12"></div>
                            <div class="col-lg-8 col-md-8 col-sm-10 col-xs-12">
                            	<!-- author-bio -->
                    			<div class="author-bio">
                    				<div class="holder">
                    					<div class="pic">
                    						<?php echo get_avatar( get_the_author_meta( 'email' ), '150' ); ?>
                    					</div><!-- .pic -->
                    					<div class="data">
                    						<p class="title"><?php the_author_link(); ?></p>
                    						<p class="designation"><?php echo radiantthemes_get_author_role(); ?></p>
                    						<?php the_author_meta( 'description' ); ?>
                    					</div><!-- .data -->
                    				</div>
                    			</div>
                    			<!-- author-bio -->
                    	    </div>
                    	    <div class="col-lg-2 col-md-2 col-sm-1 col-xs-12"></div>
                	    </div>
                	    <!-- row -->
            	    </div>
        	    </div>
        	    <!-- wraper_blog_author style-one -->
    	    <?php endif; ?>

            <?php
            if ( vio_global_var( 'display_social_sharing', '', false ) ) {
                ?>
                <div class="wraper_blog_socialmedia style-one">
                    <div class="container">
                        <!-- row -->
                        <div class="row">
                            <div class="col-lg-2 col-md-2 col-sm-1 col-xs-12"></div>
                            <div class="col-lg-8 col-md-8 col-sm-10 col-xs-12">
                                <div class="social-ctas">
                                    <div class="social-label">Share the news</div>
                                    <ul class="sharing-buttons">
                                        <li class="linkedin"><a href="https://www.linkedin.com/shareArticle?mini=true&amp;url=<?php the_permalink(); ?>&amp;title=<?php the_title(); ?>&amp;summary=&amp;source=" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                                        <li class="facebook"><a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                        <li class="twitter"><a href="http://twitter.com/share?text=<?php the_title(); ?>&amp;url=<?php the_permalink(); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>

    		<?php if ( true == vio_global_var( 'display_navigation', '', false ) ) : ?>
        		<!-- wraper_blog_navigation style-one -->
                <div class="wraper_blog_navigation style-one">
        			<div class="container">
        				<!-- row -->
        				<div class="row">
                            <div class="col-lg-2 col-md-2 col-sm-1 col-xs-12"></div>
                            <div class="col-lg-8 col-md-8 col-sm-10 col-xs-12">
                            	<!-- blog_navigation -->
                            	<div class="blog_navigation">
                            	    <!-- row -->
                            	    <div class="row">
                            	        <?php
                        				$prev_post = get_previous_post();
                        				if ( is_a( $prev_post, 'WP_Post' ) ) {
                        					?>
                        					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            					<!-- navigation-link -->
                            					<div class="navigation-link nav-previous">
                            					    <div class="icon">
                            					        <span class="icon-arrow"><i class="fa fa-angle-left"></i></span>
                            					    </div>
                            						<a class="link" rel="prev" href="<?php echo esc_url( get_permalink( $prev_post->ID ) ); ?>" title="<?php echo esc_attr( get_the_title( $prev_post->ID ) ); ?>">
                            						    <?php echo esc_html__( 'Older Post', 'vio' ); ?>
                            						    <strong><?php echo get_the_title( $prev_post->ID ); ?></strong>
                            						</a>
                            					</div>
                            					<!-- navigation-link -->
                        					</div>
                        				<?php } else { ?>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                            </div>
                                        <?php } ?>
                        				<?php
                        				$next_post = get_next_post();
                        				if ( is_a( $next_post, 'WP_Post' ) ) {
                        					?>
                        					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            					<!-- navigation-link -->
                            					<div class="navigation-link nav-next">
                            					    <div class="icon">
                            					        <span class="icon-arrow"><i class="fa fa-angle-right"></i></span>
                            					    </div>
                            						<a class="link" rel="next" href="<?php echo esc_url( get_permalink( $next_post->ID ) ); ?>" title="<?php echo esc_attr( get_the_title( $next_post->ID ) ); ?>">
                            						    <?php echo esc_html__( 'Newer Post', 'vio' ); ?>
                            						    <strong><?php echo get_the_title( $next_post->ID ); ?></strong>
                            						</a>
                            					</div>
                            					<!-- navigation-link -->
                        					</div>
                        				<?php } ?>
                            	    </div>
                            	    <!-- row -->
                        	    </div>
                        	    <!-- blog_navigation -->
                    	    </div>
                    	    <div class="col-lg-2 col-md-2 col-sm-1 col-xs-12"></div>
                	    </div>
                	    <!-- row -->
            	    </div>
        	    </div>
        	    <!-- wraper_blog_navigation style-one -->
    	    <?php endif; ?>
    	    <?php if ( true == vio_global_var( 'display_related_article', '', false ) ) : ?>
    			<!-- wraper_blog_related style-one -->
    			<div class="wraper_blog_related style-one">
    			    <div class="container">
        				<!-- row -->
        				<div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            	<!-- blog_related_title -->
                            	<div class="blog_related_title">
    								<h5 class="title"><?php echo esc_html__( 'Related Articles', 'vio' ); ?></h5>
    							</div>
    							<!-- blog_related_title -->
    							<!-- blog_related_box -->
            					<div class="row blog_related_box">
            						<?php
            						$related = get_posts(
            							array(
            								'category__in' => wp_get_post_categories( $post->ID ),
            								'numberposts'  => 3,
            								'post__not_in' => array( $post->ID ),
            							)
            						);
            						if ( $related ) {
            							foreach ( $related as $post ) {
            								setup_postdata( $post );
            								?>
            									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            										<!-- blog_related_box_item -->
            										<div class="blog_related_box_item">
            											<div class="holder matchHeight">
            												<div class="data">
            													<h6 class="title"><a href="<?php echo esc_url( get_the_permalink() ); ?>" rel="bookmark" title="<?php echo esc_attr( get_the_title() ); ?>"><?php echo esc_html( get_the_title() ); ?></a></h6>
                                                                <p class="date"><i class="fa fa-clock-o"></i><?php echo esc_attr( get_the_date() ); ?></p>
                                                                <p><?php echo wp_kses_post( substr( strip_tags( get_the_excerpt() ), 0, 150 ) . '...' ); ?></p>
                                                                <p><a href="<?php echo esc_url( get_permalink() ) ?>" class="readmore" rel="bookmark">Lire la suite</a></p>
            												</div><!-- .data -->
            											</div>
            										</div>
            										<!-- blog_related_box_item -->
            									</div>
            								<?php
            							}
            						}
            						wp_reset_postdata();
            						?>
            					</div>
            					<!-- blog_related_box -->
                    	    </div>
                	    </div>
                	    <!-- row -->
            	    </div>
    			</div>
    			<!-- wraper_blog_related style-one -->
    		<?php endif; ?>
    		<?php  if ( ( true == vio_global_var( 'blog_comment_display', '', false ) ) && ( comments_open() || get_comments_number() ) ) : ?>
        		<!-- wraper_blog_comments style-one -->
                <div class="wraper_blog_comments style-one">
        			<div class="container">
        				<!-- row -->
        				<div class="row">
        				    <div class="col-lg-2 col-md-2 col-sm-1 col-xs-12"></div>
                            <div class="col-lg-8 col-md-8 col-sm-10 col-xs-12 text-center">
                            	<!-- blog_comments -->
                            	<div class="blog_comments">
                            	    <?php comments_template(); ?>
                        	    </div>
                        	    <!-- blog_comments -->
                    	    </div>
                    	    <div class="col-lg-2 col-md-2 col-sm-1 col-xs-12"></div>
                	    </div>
                	    <!-- row -->
            	    </div>
        	    </div>
        	    <!-- wraper_blog_comments style-one -->
    	    <?php endif; ?>
    	</main><!-- #main -->
    </div><!-- #primary -->

<?php endwhile; // End of the loop. ?>