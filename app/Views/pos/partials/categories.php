<div class="category-bar">

    <button
        class="category-pill active"
        data-category="all">

        All Products

    </button>

    <?php foreach ($categories as $category): ?>

        <button
            class="category-pill"
            data-category="<?= $category['id'] ?>">

            <?= esc($category['name']) ?>

        </button>

    <?php endforeach; ?>

</div>