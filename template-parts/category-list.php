<?php
/**
 * Template Part: Category List
 *
 * Displays a list of categories as a modern, well-styled navigation.
 */

$categories = get_categories();
$current_category_id = is_category() ? get_queried_object_id() : 0;

if ( $categories ) :
    ?>
    <ul class="nav nav-pills justify-content-center custom-category-list">
        <?php foreach ( $categories as $category ) : 
            $is_current = ($current_category_id === $category->term_id);
            $link_class = $is_current ? 'nav-link current' : 'nav-link';
        ?>
            <li class="nav-item">
                <a class="<?php echo esc_attr($link_class); ?>" 
                   href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>"
                   title="<?php echo esc_attr( sprintf( __( 'View all posts in %s', 'wunderstrap' ), $category->name ) ); ?>"
                   <?php if ($is_current) echo 'aria-current="page"'; ?>>
                    <?php echo esc_html( $category->name ); ?>
                    <?php if ( $category->count > 0 ) : ?>
                        <span class="category-count" aria-label="<?php echo esc_attr( sprintf( __( '%d posts', 'wunderstrap' ), $category->count ) ); ?>">
                            <?php echo esc_html( $category->count ); ?>
                        </span>
                    <?php endif; ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
    <?php
endif;
?>

<style>
/* Category List Section Styles */
.category-list {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    padding: 2rem 1.5rem;
    margin-bottom: 3rem;
    border-radius: 20px;
    box-shadow: 0 10px 40px rgba(102, 126, 234, 0.2);
    position: relative;
    overflow: hidden;
}

.category-list::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"><g fill="none" fill-rule="evenodd"><g fill="rgba(255,255,255,0.03)" fill-opacity="0.1"><circle cx="30" cy="30" r="2"/></g></g></svg>') repeat;
    pointer-events: none;
}

.custom-category-list {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 0.8rem;
    margin: 0;
    padding: 0;
    list-style: none;
    position: relative;
    z-index: 1;
}

.custom-category-list .nav-item {
    margin: 0;
}

.custom-category-list .nav-link {
    font-size: 13px;
    font-weight: 600;
    padding: 0.7rem 1.4rem;
    background: rgba(255, 255, 255, 0.9);
    color: #4a5568;
    border: none;
    border-radius: 30px;
    text-decoration: none;
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    position: relative;
    overflow: hidden;
    letter-spacing: 0.5px;
    text-transform: uppercase;
    font-family: system-ui, -apple-system, sans-serif;
    backdrop-filter: blur(10px);
    border: 2px solid rgba(255, 255, 255, 0.2);
}

.custom-category-list .nav-link::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.6), transparent);
    transition: left 0.6s ease;
}

.custom-category-list .nav-link:hover {
    background: linear-gradient(135deg, #ff6b6b, #ffa726);
    color: #ffffff;
    transform: translateY(-3px) scale(1.02);
    box-shadow: 0 8px 30px rgba(255, 107, 107, 0.4);
    border-color: rgba(255, 255, 255, 0.5);
}

.custom-category-list .nav-link:hover::before {
    left: 100%;
}

.custom-category-list .nav-link:active {
    transform: translateY(-1px) scale(1.0);
    transition: transform 0.1s ease;
}

/* Current category styling */
.custom-category-list .nav-link.current {
    background: linear-gradient(135deg, #4facfe, #00f2fe);
    color: #ffffff;
    transform: translateY(-2px);
    box-shadow: 0 6px 25px rgba(79, 172, 254, 0.4);
    border-color: rgba(255, 255, 255, 0.6);
}

/* Category count badges */
.custom-category-list .category-count {
    display: inline-block;
    background: rgba(0, 0, 0, 0.15);
    color: inherit;
    font-size: 10px;
    font-weight: 700;
    padding: 3px 8px;
    border-radius: 15px;
    margin-left: 8px;
    line-height: 1;
    transition: all 0.3s ease;
    min-width: 20px;
    text-align: center;
    vertical-align: middle;
}

.custom-category-list .nav-link:hover .category-count {
    background: rgba(255, 255, 255, 0.25);
    transform: scale(1.1);
    color: #ffffff;
}

.custom-category-list .nav-link.current .category-count {
    background: rgba(255, 255, 255, 0.2);
    color: #ffffff;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .category-list {
        padding: 1.5rem 1rem;
        margin-bottom: 2rem;
        border-radius: 15px;
    }
    
    .custom-category-list {
        gap: 0.6rem;
    }
    
    .custom-category-list .nav-link {
        font-size: 11px;
        padding: 0.6rem 1.1rem;
        letter-spacing: 0.3px;
    }
    
    .custom-category-list .category-count {
        font-size: 9px;
        padding: 2px 6px;
        margin-left: 6px;
        min-width: 16px;
    }
}

@media (max-width: 576px) {
    .category-list {
        padding: 1.2rem 0.8rem;
        margin-bottom: 1.5rem;
    }
    
    .custom-category-list {
        justify-content: center;
        gap: 0.5rem;
    }
    
    .custom-category-list .nav-link {
        font-size: 10px;
        padding: 0.5rem 1rem;
        letter-spacing: 0.2px;
    }
    
    .custom-category-list .category-count {
        font-size: 8px;
        padding: 2px 5px;
        margin-left: 5px;
        min-width: 14px;
    }
}
</style>