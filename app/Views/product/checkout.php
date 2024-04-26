<?= $this->extend('product/layout/main') ?>
<?= $this->section('content') ?>
<div class="container">
    <h3>Cart Page</h3>

    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">Charge <?php echo '$' . $total; ?> with Stripe</h3>

            <!-- Product Info -->
            <?php
            foreach ($productRecord as $key => $value) : ?>
                <p><b>Item Name:</b><?= $value['name'] ?></p>
            <?php endforeach; ?>

            <p><b>Price:</b> <?php echo '$' . $total; ?></p>
        </div>
        <div class="panel-body">
            <form action="create-checkout-session" method="POST">
                <label for="name">Name:</label><br>
                <input type="text" id="name" name="name" value="test" required><br>
                <label for="email">Email:</label><br>
                <input type="email" id="email" name="email" value="test@gmail.com"  required><br>
                <label for="contact">Contact:</label><br>
                <input type="text" id="contact" name="contact"  value="123456789"  required><br>
                <br>
                <div class="quantity-setter">

                    <input type="hidden" id="quantity-input" name="price" value="<?=$total?>" />
                    <input type="text" id="quantity-input" name="qty" value="1" />
                </div>

                <p>Quantity</p>

                <button id="submit" type="submit">Pay</button>
            </form>
        </div>

    </div>
    <?= $this->endSection() ?>