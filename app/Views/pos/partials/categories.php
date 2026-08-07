<div class="category-bar">

    <button
        type="button"
        class="category-pill active"
        data-category="all">

        All Products

    </button>

    <?php foreach ($categories as $category): ?>

        <button
            type="button"
            class="category-pill"
            data-category="<?= $category['id'] ?>">

            <?= esc($category['name']) ?>

        </button>

    <?php endforeach; ?>

</div>