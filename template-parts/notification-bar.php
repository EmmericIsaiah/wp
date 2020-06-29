<div class="row notification-bar">
					<?php 
							$args = array( 'post_type' => 'notifications', 'posts_per_page' => 10 );
							$the_query = new WP_Query( $args ); 
					?>
					<?php if ( $the_query->have_posts() ) : $the_query->the_post(); ?>
				<div class="col-md-3">
						<h2 id="notification-title"><?php the_title(); ?></h2>
				</div>

				<div class="col-md-8">
					<div class="notification-text"><?php the_content(); ?></div>
					<?php wp_reset_postdata(); ?>
					<?php else:  ?>
					<p>
						<?php _e( 'Sorry, no posts matched your criteria.' ); ?>
					</p>
					<?php endif; ?>
				</div>

				<div class="col-md-1">
					<div class="closing-notification">
						<a href="#" id="cross-notification">
							X
						</p>
					</div>
				</div>
</div>
