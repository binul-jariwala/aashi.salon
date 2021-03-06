<?php
/**
 * The template for displaying all single posts.
 * 
 */

get_header(); ?>


<?php  while ( have_posts() ) : the_post(); ?>

	<?php get_template_part( 'content', get_post_format() );  ?>
    
    <section class="space-none-top">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                
                        <!-- Entry Title
                        ========================= -->
                        <?php if( get_post_format() == 'quote' ) { ?>
                            <?php the_title( '<h1 class="h2">', '</h1>' ); ?>
                            <?php get_template_part( 'partials', 'entry_meta' ); ?>   
                        <?php } ?>
                 
                        <!-- Entry Content
                        ========================= -->
                        <div class="entry-content list-normal table-normal">
                        
                            <?php       
                                the_content();
                                wp_link_pages( array(
                                    'before'      => '<div class="page-links">' . shadower_wp_kses( __( 'Pages: ', 'shadower' ) ) . '',
                                    'after'       => '</div>',
                                    'link_before' => '<span>',
                                    'link_after'  => '</span>',
                                ) );
                              ?>
                 
                        </div>
                        <!-- Entry Content  end -->
                        
                        
                        
                        <!-- Tags
                        ========================= -->
                        <?php the_tags( '<div class="tags-box"><strong>'.shadower_wp_kses( __( 'Tags', 'shadower' ) ).': </strong>', '', '</div>' ); ?>
                        
                        
                        
                        <?php edit_post_link( esc_html__( 'Edit', 'shadower' ), '<span class="edit-link">', '</span>' ); ?>
                   
                    
 
                        <!-- Post Navigation
                        ========================= -->
                        <div class="entry-section-top entry-mark">
                           <hr>
                           <div class="row">
                               <div class="col-xs-6 t-l">
                                   <?php previous_post_link( '%link', shadower_wp_kses( __( '&larr; Previous Post', 'shadower' ) ) ); ?>
                               </div>
                               <div class="col-xs-6 t-r">
                                   <?php next_post_link( '%link', shadower_wp_kses( __( 'Next Post &rarr;', 'shadower' ) ) ); ?>
                               </div>                          

                           </div>
                           <hr>
                        </div>	
                        <!-- Post Navigation end -->		
                             

                        <!-- Author bio
                        ========================= -->
						<?php
                            if ( is_single() && get_the_author_meta( 'description' ) ) {
                                get_template_part( 'author-bio' );
							}
                        ?>  
                        
                                
                        <!-- Comments
                        ========================= -->
                        <?php
                            if ( comments_open() || get_comments_number() ) {
                                comments_template();
                            }
                        ?>

                     
                </div>
                <!--  .col-md-9  end -->
                <div class="col-md-3">
                
                        <!-- Sidebar
                        ========================= -->
                        <?php get_sidebar(); ?>
        
                </div>
                <!--  .col-md-3  end --> 
            
            </div>
            <!-- .row  end -->
        
            
        </div>
        <!-- .container end -->

    </section>
               

<?php endwhile; ?>  
    
<?php get_footer(); ?>
