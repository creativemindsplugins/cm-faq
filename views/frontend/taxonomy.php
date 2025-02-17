<div class="cmfaq cmfaq-one-column" id="cmfaq">

    <?php
    /*
     * Searchbox
     */
    CMFAQ_Frontend::the_search();
    ?>

    <div class="cmfaq-main">

        <?php if (CMFAQ_Base::$wp_query_taxonomy->have_posts()) : ?>

            <div class="cmfaq-tax">

                <?php
                /*
                 * Breadcrumb
                 */
                CMFAQ_Frontend::the_taxonomy_breadcrumb();
                ?>

                <?php while (CMFAQ_Base::$wp_query_taxonomy->have_posts()) : CMFAQ_Base::$wp_query_taxonomy->the_post(); ?>

                    <?php 
                    $cmfaq_main_category_id = false;//get_post_meta(get_the_ID(), 'cmfaq_main_category_id', true);
                    ?>

                    <?php if(!$cmfaq_main_category_id || $cmfaq_main_category_id == CMFAQ_Base::$wp_query_taxonomy->queried_object_id): ?>

                        <div class="cmfaq-tax-post">

                            <h3 class="cmfaq-tax-post-title"><a class="cmfaq-tax-post-title-link" href="<?php esc_attr(the_permalink()); ?>"><?php the_title(); ?></a></h3>

                            <div class="cmfaq-tax-post-content">

                                <?php the_content(); ?>

                            </div>

                        </div>

                    <?php endif; ?>

                <?php endwhile; ?>

            </div>

            <?php wp_reset_query(); ?>

        <?php else: ?>

            <div class="cmfaq-tax-no-posts">

                <?php echo \CM\CMFAQ_Settings::get('cmfaq_label_search_no_results', 'Sorry, but nothing found.'); ?>

            </div>

        <?php endif; ?>

    </div>

</div>