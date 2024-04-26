<html>

<head>
    <title>Stripe Payment</title>
</head>

<body>
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">Charge <?php echo '$' . $itemPrice; ?> with Stripe</h3>

            <!-- Product Info -->
            <p><b>Item Name:</b> <?php echo $itemName; ?></p>
            <p><b>Price:</b> <?php echo '$' . $itemPrice . ' ' . $currency; ?></p>
        </div>
        <div class="panel-body">
            <form action="create-checkout-session" method="POST">
                <div class="quantity-setter">
                    <button class="increment-btn" id="subtract" type="button" disabled>
                        -
                    </button>
                    <input type="number" id="quantity-input" name="quantity" min="1" value="1" />
                    <button class="increment-btn" id="add" type="button">+</button>
                </div>

                <p>Number of copies (max 10)</p>

                <button id="submit" type="submit">Pay</button>
            </form>
        </div>

</body>

</html>