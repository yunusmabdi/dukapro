<div class="card">

    <div class="card-body">

        <div class="row">

            <div class="col-md-6 mb-3">

                <label>SKU</label>

                <input
                    type="text"
                    name="sku"
                    class="form-control"
                    value="<?= $product['sku'] ?? '' ?>"
                    readonly
                >

            </div>

            <div class="col-md-6 mb-3">

                <label>Barcode</label>

                <input
                    type="text"
                    name="barcode"
                    class="form-control"
                    value="<?= $product['barcode'] ?? '' ?>"
                    readonly
                >

            </div>

            <div class="col-md-6 mb-3">

                <label>Product Name</label>

                <input
                    type="text"
                    name="name"
                    class="form-control"
                    value="<?= $product['name'] ?? '' ?>"
                    required
                >

            </div>

            <div class="col-md-6 mb-3">

                <label>Category</label>

                <input
                    type="text"
                    name="category"
                    class="form-control"
                    value="<?= $product['category'] ?? '' ?>"
                >

            </div>

            <div class="col-md-6 mb-3">

                <label>Brand</label>

                <input
                    type="text"
                    name="brand"
                    class="form-control"
                    value="<?= $product['brand'] ?? '' ?>"
                >

            </div>

            <div class="col-md-6 mb-3">

                <label>Unit</label>

                <input
                    type="text"
                    name="unit"
                    class="form-control"
                    value="<?= $product['unit'] ?? 'Piece' ?>"
                >

            </div>

            <div class="col-md-6 mb-3">

                <label>Cost Price</label>

                <input
                    type="number"
                    step="0.01"
                    name="cost_price"
                    class="form-control"
                    value="<?= $product['cost_price'] ?? '' ?>"
                >

            </div>

            <div class="col-md-6 mb-3">

                <label>Selling Price</label>

                <input
                    type="number"
                    step="0.01"
                    name="selling_price"
                    class="form-control"
                    value="<?= $product['selling_price'] ?? '' ?>"
                >

            </div>

            <div class="col-md-6 mb-3">

                <label>Stock</label>

                <input
                    type="number"
                    name="stock"
                    class="form-control"
                    value="<?= $product['stock'] ?? 0 ?>"
                >

            </div>

            <div class="col-md-6 mb-3">

                <label>Minimum Stock</label>

                <input
                    type="number"
                    name="min_stock"
                    class="form-control"
                    value="<?= $product['min_stock'] ?? 5 ?>"
                >

            </div>

            <div class="col-md-6 mb-4">

                <label>Status</label>

                <select
                    name="status"
                    class="form-control"
                >

                    <option
                        value="Active"
                        <?= (($product['status'] ?? '') == 'Active') ? 'selected' : '' ?>
                    >
                        Active
                    </option>

                    <option
                        value="Inactive"
                        <?= (($product['status'] ?? '') == 'Inactive') ? 'selected' : '' ?>
                    >
                        Inactive
                    </option>

                </select>

            </div>

        </div>

        <button class="btn btn-primary">

            Save Product

        </button>

        <a
            href="<?= base_url('products') ?>"
            class="btn btn-secondary"
        >

            Cancel

        </a>

    </div>

</div>