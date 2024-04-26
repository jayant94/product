<?= $this->extend('product/layout/main') ?>
<?= $this->section('content') ?>
<div class="container">
    <h3>Cart Page</h3>
    <a href="<?=site_url('/')?>">Home</a> <br>
    <a href="<?=site_url('/clear-cart')?>">clear cart </a>
    <?php   if($productRecord ){ ?>
    <table class="table table-bordered mt-5">
        <thead>
            <tr>
                <th>
                    Product name
                </th>
                <th>
                    Description
                </th>
                <th>
                    Price
                </th>
                <th>
                    qty
                </th>
                <th>
                    amount
                </th>
            </tr>
        </thead>
        <tbody>
            <?php
          
            $total = 0;
            foreach ($productRecord as $key => $value) : ?>
                <tr>
                    <td><?= $value['name'] ?></td>
                    <td><?= $value['description'] ?></td>
                    <td><?= $value['price'] ?></td>
                    <td><?= $value['qty'] ?></td>
                    <td><?= $value['price'] * $value['qty'] ?></td>
                </tr>

                <?php $total = $value['price'] * $value['qty'] + $total; ?>
            <?php endforeach; ?>

        </tbody>
        <tfoot>
            <tr>
                <td colspan="4"></td>
                <td> <?php echo $total; ?></td>
            </tr>
            <tr>
                <td colspan="4"></td>
                <td>
                    <a href="<?= site_url('checkout') ?>" class="btn btn-primary btn-sm">Checkout</a>
                </td>
            </tr>
        </tfoot>
    </table>
    <?php } ?>
</div>
<?= $this->endSection() ?>