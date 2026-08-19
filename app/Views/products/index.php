<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="container-fluid">


    <!-- =========================================
         PAGE HEADER
    ========================================== -->

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h3 class="fw-bold mb-1">
                Products
            </h3>

            <p class="text-muted mb-0">
                Manage your product catalog
            </p>

        </div>


        <a
            href="<?= base_url('products/create') ?>"
            class="btn btn-primary"
        >

            <i class="bi bi-plus-circle me-2"></i>

            Add Product

        </a>

    </div>


    <!-- =========================================
         SUCCESS MESSAGE
    ========================================== -->

    <?php if (session()->getFlashdata('success')) : ?>

        <div
            class="alert alert-success alert-dismissible fade show"
            role="alert"
        >

            <?= session()->getFlashdata('success') ?>

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert"
            ></button>

        </div>

    <?php endif; ?>


    <!-- =========================================
         PRODUCTS CARD
    ========================================== -->

    <div class="card border-0 shadow-sm">


        <!-- =====================================
             TABLE TOOLBAR
        ====================================== -->

        <div class="card-body border-bottom">


            <div class="row align-items-center g-3">


                <!-- SEARCH -->

                <div class="col-md-6">

                    <div class="input-group">

                        <span class="input-group-text bg-white">

                            <i class="bi bi-search text-muted"></i>

                        </span>


                        <input
                            type="text"
                            id="productTableSearch"
                            class="form-control"
                            placeholder="Search products, SKU, category, supplier..."
                            autocomplete="off"
                        >


                        <button
                            type="button"
                            id="clearProductSearch"
                            class="btn btn-outline-secondary d-none"
                        >

                            <i class="bi bi-x-lg"></i>

                        </button>

                    </div>

                </div>


                <!-- RESULT COUNT -->

                <div class="col-md-6 text-md-end">

                    <span
                        class="text-muted small"
                        id="productResultCount"
                    >

                        <?= !empty($products)
                            ? count($products) . ' products'
                            : '0 products'
                        ?>

                    </span>

                </div>


            </div>

        </div>


        <!-- =====================================
             TABLE
        ====================================== -->

        <div class="card-body">

            <div class="table-responsive">


                <table
                    class="table table-hover align-middle"
                    id="productsTable"
                >


                    <thead class="table-light">

                        <tr>


                            <!-- SKU -->

                            <th
                                class="sortable"
                                data-column="0"
                                style="cursor:pointer;"
                            >

                                <span>
                                    SKU
                                </span>

                                <i class="bi bi-arrow-down-up text-muted ms-1 sort-icon"></i>

                            </th>


                            <!-- PRODUCT -->

                            <th
                                class="sortable"
                                data-column="1"
                                style="cursor:pointer;"
                            >

                                <span>
                                    Product
                                </span>

                                <i class="bi bi-arrow-down-up text-muted ms-1 sort-icon"></i>

                            </th>


                            <!-- CATEGORY -->

                            <th
                                class="sortable"
                                data-column="2"
                                style="cursor:pointer;"
                            >

                                <span>
                                    Category
                                </span>

                                <i class="bi bi-arrow-down-up text-muted ms-1 sort-icon"></i>

                            </th>


                            <!-- SUPPLIER -->

                            <th
                                class="sortable"
                                data-column="3"
                                style="cursor:pointer;"
                            >

                                <span>
                                    Supplier
                                </span>

                                <i class="bi bi-arrow-down-up text-muted ms-1 sort-icon"></i>

                            </th>


                            <!-- BRAND -->

                            <th
                                class="sortable"
                                data-column="4"
                                style="cursor:pointer;"
                            >

                                <span>
                                    Brand
                                </span>

                                <i class="bi bi-arrow-down-up text-muted ms-1 sort-icon"></i>

                            </th>


                            <!-- STOCK -->

                            <th
                                class="sortable"
                                data-column="5"
                                style="cursor:pointer;"
                            >

                                <span>
                                    Stock
                                </span>

                                <i class="bi bi-arrow-down-up text-muted ms-1 sort-icon"></i>

                            </th>


                            <!-- SELLING PRICE -->

                            <th
                                class="sortable"
                                data-column="6"
                                style="cursor:pointer;"
                            >

                                <span>
                                    Selling Price
                                </span>

                                <i class="bi bi-arrow-down-up text-muted ms-1 sort-icon"></i>

                            </th>


                            <!-- STATUS -->

                            <th
                                class="sortable"
                                data-column="7"
                                style="cursor:pointer;"
                            >

                                <span>
                                    Status
                                </span>

                                <i class="bi bi-arrow-down-up text-muted ms-1 sort-icon"></i>

                            </th>


                            <!-- ACTIONS -->

                            <th
                                width="180"
                                class="text-center"
                            >

                                Actions

                            </th>


                        </tr>

                    </thead>


                    <tbody id="productsTableBody">


                        <?php if (!empty($products)) : ?>


                            <?php foreach ($products as $product) : ?>

                                <tr class="product-row">


                                    <!-- SKU -->

                                    <td>

                                        <span
                                            class="fw-semibold text-primary"
                                        >

                                            <?= esc($product['sku']) ?>

                                        </span>

                                    </td>


                                    <!-- PRODUCT -->

                                    <td>

                                        <?= esc($product['name']) ?>

                                    </td>


                                    <!-- CATEGORY -->

                                    <td>

                                        <?= esc(
                                            $product['category_name'] ?? '-'
                                        ) ?>

                                    </td>


                                    <!-- SUPPLIER -->

                                    <td>

                                        <?= esc(
                                            $product['supplier_name'] ?? '-'
                                        ) ?>

                                    </td>


                                    <!-- BRAND -->

                                    <td>

                                        <?= esc(
                                            $product['brand'] ?? '-'
                                        ) ?>

                                    </td>


                                    <!-- STOCK -->

                                    <td
                                        data-sort-value="<?= (float) $product['stock'] ?>"
                                    >

                                        <?php if (
                                            $product['stock']
                                            <=
                                            $product['min_stock']
                                        ) : ?>

                                            <span class="badge bg-danger">

                                                <?= $product['stock'] ?>

                                            </span>

                                        <?php else : ?>

                                            <span class="badge bg-success">

                                                <?= $product['stock'] ?>

                                            </span>

                                        <?php endif; ?>

                                    </td>


                                    <!-- SELLING PRICE -->

                                    <td
                                        data-sort-value="<?= (float) $product['selling_price'] ?>"
                                    >

                                        KES
                                        <?= number_format(
                                            $product['selling_price'],
                                            2
                                        ) ?>

                                    </td>


                                    <!-- STATUS -->

                                    <td>

                                        <?php if (
                                            $product['status']
                                            ===
                                            'Active'
                                        ) : ?>

                                            <span class="badge bg-success">

                                                Active

                                            </span>

                                        <?php else : ?>

                                            <span class="badge bg-secondary">

                                                Inactive

                                            </span>

                                        <?php endif; ?>

                                    </td>


                                    <!-- ACTIONS -->

                                    <td class="text-center">


                                        <a
                                            href="<?= base_url(
                                                'products/show/'
                                                . $product['id']
                                            ) ?>"
                                            class="btn btn-sm btn-info text-white"
                                            title="View"
                                        >

                                            <i class="bi bi-eye"></i>

                                        </a>


                                        <a
                                            href="<?= base_url(
                                                'products/edit/'
                                                . $product['id']
                                            ) ?>"
                                            class="btn btn-sm btn-warning"
                                            title="Edit"
                                        >

                                            <i class="bi bi-pencil"></i>

                                        </a>


                                        <a
                                            href="<?= base_url(
                                                'products/delete/'
                                                . $product['id']
                                            ) ?>"
                                            class="btn btn-sm btn-danger"
                                            title="Delete"
                                            onclick="return confirm('Are you sure you want to delete this product?')"
                                        >

                                            <i class="bi bi-trash"></i>

                                        </a>


                                    </td>


                                </tr>

                            <?php endforeach; ?>


                            <!-- NO SEARCH RESULTS -->

                            <tr
                                id="noProductResults"
                                class="d-none"
                            >

                                <td
                                    colspan="9"
                                    class="text-center py-5"
                                >

                                    <i
                                        class="bi bi-search fs-1 text-muted d-block mb-3"
                                    ></i>

                                    <h5>
                                        No Products Found
                                    </h5>

                                    <p class="text-muted mb-0">

                                        Try changing your search.

                                    </p>

                                </td>

                            </tr>


                        <?php else : ?>


                            <!-- EMPTY DATABASE -->

                            <tr>

                                <td
                                    colspan="9"
                                    class="text-center py-5"
                                >

                                    <i
                                        class="bi bi-box-seam fs-1 text-muted d-block mb-3"
                                    ></i>


                                    <h5>
                                        No Products Found
                                    </h5>


                                    <p class="text-muted mb-3">

                                        Start by creating your first product.

                                    </p>


                                    <a
                                        href="<?= base_url('products/create') ?>"
                                        class="btn btn-primary"
                                    >

                                        <i class="bi bi-plus-circle me-2"></i>

                                        Add Product

                                    </a>


                                </td>

                            </tr>


                        <?php endif; ?>


                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>


<!-- =========================================
     SEARCH + SORT JAVASCRIPT
========================================== -->

<script>

document.addEventListener('DOMContentLoaded', function () {


    const table =
        document.getElementById('productsTable');

    const searchInput =
        document.getElementById('productTableSearch');

    const clearButton =
        document.getElementById('clearProductSearch');

    const resultCount =
        document.getElementById('productResultCount');

    const noResults =
        document.getElementById('noProductResults');


    if (!table || !searchInput) {
        return;
    }


    const tbody =
        document.getElementById('productsTableBody');


    /*
    =========================================
    SEARCH
    =========================================
    */

    searchInput.addEventListener('input', function () {


        const keyword =
            this.value
                .toLowerCase()
                .trim();


        const rows =
            tbody.querySelectorAll(
                'tr.product-row'
            );


        let visibleCount = 0;


        rows.forEach(function (row) {


            const rowText =
                row.textContent
                    .toLowerCase();


            if (
                keyword === '' ||
                rowText.includes(keyword)
            ) {

                row.style.display = '';

                visibleCount++;

            } else {

                row.style.display = 'none';

            }

        });


        /*
        =====================================
        RESULT COUNT
        =====================================
        */

        resultCount.textContent =
            visibleCount
            +
            (
                visibleCount === 1
                    ? ' product'
                    : ' products'
            );


        /*
        =====================================
        NO RESULTS
        =====================================
        */

        if (noResults) {

            noResults.classList.toggle(
                'd-none',
                visibleCount !== 0
            );

        }


        /*
        =====================================
        CLEAR BUTTON
        =====================================
        */

        clearButton.classList.toggle(
            'd-none',
            keyword === ''
        );

    });


    /*
    =========================================
    CLEAR SEARCH
    =========================================
    */

    clearButton.addEventListener(
        'click',
        function () {

            searchInput.value = '';

            searchInput.dispatchEvent(
                new Event('input')
            );

            searchInput.focus();

        }
    );


    /*
    =========================================
    SORTING
    =========================================
    */

    const headers =
        table.querySelectorAll(
            'th.sortable'
        );


    headers.forEach(function (header) {


        header.addEventListener(
            'click',
            function () {


                const column =
                    parseInt(
                        this.dataset.column
                    );


                const currentDirection =
                    this.dataset.direction
                    || 'none';


                const newDirection =
                    currentDirection === 'asc'
                        ? 'desc'
                        : 'asc';


                /*
                =================================
                RESET OTHER HEADERS
                =================================
                */

                headers.forEach(function (otherHeader) {

                    otherHeader.dataset.direction =
                        'none';


                    const icon =
                        otherHeader.querySelector(
                            '.sort-icon'
                        );


                    if (icon) {

                        icon.className =
                            'bi bi-arrow-down-up text-muted ms-1 sort-icon';

                    }

                });


                /*
                =================================
                SET CURRENT HEADER
                =================================
                */

                this.dataset.direction =
                    newDirection;


                const icon =
                    this.querySelector(
                        '.sort-icon'
                    );


                if (icon) {

                    icon.className =
                        newDirection === 'asc'

                            ? 'bi bi-arrow-up ms-1 sort-icon'

                            : 'bi bi-arrow-down ms-1 sort-icon';

                }


                /*
                =================================
                GET ROWS
                =================================
                */

                const rows =
                    Array.from(
                        tbody.querySelectorAll(
                            'tr.product-row'
                        )
                    );


                /*
                =================================
                SORT ROWS
                =================================
                */

                rows.sort(function (a, b) {


                    const cellA =
                        a.children[column];


                    const cellB =
                        b.children[column];


                    /*
                    Numeric columns
                    */

                    if (
                        column === 5 ||
                        column === 6
                    ) {

                        const valueA =
                            parseFloat(
                                cellA.dataset.sortValue
                                || 0
                            );


                        const valueB =
                            parseFloat(
                                cellB.dataset.sortValue
                                || 0
                            );


                        return newDirection === 'asc'
                            ? valueA - valueB
                            : valueB - valueA;

                    }


                    /*
                    Text columns
                    */

                    const valueA =
                        cellA.textContent
                            .trim()
                            .toLowerCase();


                    const valueB =
                        cellB.textContent
                            .trim()
                            .toLowerCase();


                    return newDirection === 'asc'

                        ? valueA.localeCompare(valueB)

                        : valueB.localeCompare(valueA);

                });


                /*
                =================================
                REBUILD TABLE
                =================================
                */

                rows.forEach(function (row) {

                    tbody.appendChild(row);

                });


                /*
                Keep no-results row at bottom
                */

                if (noResults) {

                    tbody.appendChild(noResults);

                }

            }
        );

    });

});

</script>


<?= $this->endSection() ?>