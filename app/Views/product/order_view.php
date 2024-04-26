<?= $this->extend('product/layout/main') ?>
<?= $this->section('content') ?>
<h2>Order Details</h2>
<a href="<?=site_url('/')?>">Home</a> <br>
<table class="table table-bordered">
    <tr>
        <th>Customer Name</th>
        <th>Email</th>
        <th>Contact</th>
        <th>Item Name</th>
        <th>Price</th>
        <th>Method</th>
        <th>Status</th>
        <th>Transaction id</th>
    </tr>
    <?php foreach ($orders as $order): ?>
    <tr>
        <td><?= $order['customer_name'] ?></td>
        <td><?= $order['email'] ?></td>
        <td><?= $order['contact'] ?></td>
        <td><?= $order['item_name'] ?></td>
        <td><?= $order['price'] ?></td>
        <td><?= $order['method'] ?></td>
        <td><?= $order['status'] ?></td>
        <td><?= $order['txn'] ?></td>
    </tr>
    <?php endforeach; ?>
</table>
<?= $this->endSection() ?>