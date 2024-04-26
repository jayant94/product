<?= $this->extend('product/layout/main') ?>
<?= $this->section('content') ?>
<div class="container">
    <a href="<?=site_url('cart')?>">View Cart</a> <br>
    <a href="<?=site_url('order')?>">Order List</a>
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
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productRecord as $key => $value) : ?>
                <tr>
                    <td><?=$value['name']?></td>
                    <td><?=$value['description']?></td>
                    <td><?=$value['price']?></td>
                    <td><a href="<?=site_url('add-to-cart/'.$value['id'])?>" class="btn btn-primary btn-sm">add to cart</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?= $this->endSection() ?>