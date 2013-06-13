<?php
 /*
 * Template Name: pluginame-Blogposts
 */
 
get_header(); ?>
    <?php
    $mypost = array( 'post_type' => 'pluginame', );
    $loop = new WP_Query( $mypost );
    ?>
    <?php while ( $loop->have_posts() ) : $loop->the_post();?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="row">
              <div class="span8">
                <div class="row">
                  <div class="span2">
                    <a href="#" class="thumbnail">
                        <?php
                        // Must be inside a loop.

                        if ( has_post_thumbnail() ) {
                            the_post_thumbnail();
                        }
                        else {
                            echo '<img src="http://placehold.it/260x180&text=missing+thumbnail" alt="">';
                        }
                        ?>
                    </a>
                  </div>
                  <div class="span6">      
                    <h4 style="margin-top:0px;"><strong><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></strong></h4>
                    <p><?php the_excerpt(); ?></p>
                  </div>
                </div>
              </div>
            </div>
        </article>
        <hr />
    <?php endwhile; ?>
<?php wp_reset_query(); ?>
<?php get_footer(); ?>