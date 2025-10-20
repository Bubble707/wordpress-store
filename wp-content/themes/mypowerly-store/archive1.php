<?php
/**
 * The template for displaying archive pages
 *
 * @package MyPowerly_Store
 */

get_header();
?>

<main id="primary" class="site-main">
    <div class="container">
        <?php if (have_posts()) : ?>

            <header class="page-header">
                <?php
                the_archive_title('<h1 class="page-title">', '</h1>');
                the_archive_description('<div class="archive-description">', '</div>');
                ?>
            </header>

            <div class="posts-grid">
                <?php
                while (have_posts()) :
                    the_post();
                    get_template_part('template-parts/content', get_post_type());
                endwhile;
                ?>
            </div>

            <?php
            the_posts_navigation(array(
                'prev_text' => '<span class="nav-subtitle">' . esc_html__('Previous', 'mypowerly-store') . '</span>',
                'next_text' => '<span class="nav-subtitle">' . esc_html__('Next', 'mypowerly-store') . '</span>',
            ));

        else :
            get_template_part('template-parts/content', 'none');
        endif;
        ?>
    </div>
</main>

<style>
.posts-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 2rem;
    margin-top: 2rem;
}

.page-header {
    text-align: center;
    margin-bottom: 3rem;
}

.page-title {
    font-size: 2.5rem;
    color: var(--gray-900);
    margin-bottom: 1rem;
}

.archive-description {
    font-size: 1.125rem;
    color: var(--gray-600);
    max-width: 700px;
    margin: 0 auto;
}
</style>

<?php
get_footer();
?>
