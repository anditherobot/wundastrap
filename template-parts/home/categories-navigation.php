<section class="categories-navigation py-4 bg-dark text-white">
    <div class="container">
        <div class="d-flex align-items-center mb-3">
            <h2 class="h4 mb-0 fw-bold">🔍 Navigasyon par Kategori</h2>
        </div>
        <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-5 g-2">
            <?php
            $categories = get_categories([
                'orderby' => 'name',
                'order' => 'ASC',
                'hide_empty' => 1
            ]);
            
            if (!empty($categories)): 
                foreach ($categories as $category): ?>
                    <div class="col">
                        <a href="<?php echo esc_url(get_category_link($category->term_id)); ?>" 
                           class="btn btn-light w-100 text-truncate fw-bold">
                            <?php echo esc_html($category->name); ?>
                            <span class="badge bg-primary ms-1"><?php echo $category->count; ?></span>
                        </a>
                    </div>
                <?php endforeach;
            else: ?>
                <div class="col-12">
                    <p class="text-white-50 text-center mb-0">No categories found.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>