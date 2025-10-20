<?php
/**
 * Custom search form
 *
 * @package MyPowerly_Store
 */
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
    <label for="search-field" class="sr-only">
        <?php esc_html_e('Search for:', 'mypowerly-store'); ?>
    </label>
    <div class="search-form-wrapper" style="display: flex; gap: 0.5rem;">
        <input 
            type="search" 
            id="search-field"
            class="search-field" 
            placeholder="<?php echo esc_attr_x('Search...', 'placeholder', 'mypowerly-store'); ?>" 
            value="<?php echo get_search_query(); ?>" 
            name="s" 
            style="flex: 1;"
        />
        <button type="submit" class="search-submit button">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="11" cy="11" r="8"></circle>
                <path d="m21 21-4.35-4.35"></path>
            </svg>
            <span class="sr-only"><?php esc_html_e('Search', 'mypowerly-store'); ?></span>
        </button>
    </div>
</form>
