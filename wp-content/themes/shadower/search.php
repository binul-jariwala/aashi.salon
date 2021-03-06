<?php
/**
 * The template for displaying search results pages.
 * 
 */

get_header(); ?>


    <section class="space-sm">
        <div class="container t-c">
                <div class="row">
                    <div class="col-md-12 transition">
                        <form class="form-merge no-labels" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
                                <label for="search"><?php printf( esc_html__( 'Search Results for: %s', 'shadower' ), '<span>' . get_search_query() . '</span>' ); ?></label>
                                <input id="s" name="s" class="col-md-8 col-sm-6 controls-custom-merge" value="" placeholder="<?php echo esc_attr__( 'Enter your search term...', 'shadower' ); ?>" type="search" required />
                                <button type="submit" class="col-md-4 col-sm-6 controls-custom-merge button-bg-primary"><?php echo shadower_wp_kses( __( 'Search', 'shadower' ) ); ?></button>
                        </form>
                    </div>
                </div>
                <!-- .row end -->
        </div>
        <!-- .container end -->

    </section>


    <section class="space-none-top">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
        
                
                        <?php 
                            if ( have_posts() ) { 
                            
                                while ( have_posts() ) : the_post();
                                
                                    get_template_part( 'content', 'search' );
                                    
                                endwhile;
                            
                            } else { 
                            
                                get_template_part( 'content', 'none' ); 
                            
                            } 
                         ?>            
                
                              
                        <div class="pagination-container t-c transition">
                            <?php
                                if ( get_theme_mod( 'custom_pagination', true ) ) {
                                    //Use numeric Paginate
									the_posts_pagination( array(
										'type'               => 'list',
										'mid_size'           => 3,
										'prev_text'          => '<i class="fa fa-angle-left"></i>',
										'next_text'          => '<i class="fa fa-angle-right"></i>',
									) ); 	 
                                } else {
                                    //Only "next" and "previous" button
									the_posts_navigation( array(
										'prev_text'          => '<i class="fa fa-angle-left"></i>',
										'next_text'          => '<i class="fa fa-angle-right"></i>',
									) ); 

                                }
                            ?>
                        </div> 
                        <!-- .pagination-container  end -->

                </div>
                <!--  .col-md-9  end -->
                <div class="col-md-3">
                
                    <?php get_sidebar(); ?>
                
                </div>
                <!--  .col-md-3  end --> 
            
            </div>
            <!-- .row  end -->
           
            
        </div>
        <!-- .container end -->

    </section>
    
    
<?php get_footer(); ?>

