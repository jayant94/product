

    <?= $this->extend('product/layout/main') ?>
<?= $this->section('content') ?>
<div class="container">
    <a href="<?=site_url('/')?>">Back to home page</a>
    <h2>Payment Details</h2>
    <table>
        <tr>
            <th>Transaction ID</th>
            <th>Customer ID</th>
            <th>Payment Method</th>
            <th>Status</th>
        </tr>
        <tr>
            <td><?php echo $transaction_id; ?></td>
            <td><?php echo $customer_id; ?></td>
            <td><?php echo $method; ?></td>
            <td><?php echo $status; ?></td>
        </tr>
    </table>
</div>
<?= $this->endSection() ?>