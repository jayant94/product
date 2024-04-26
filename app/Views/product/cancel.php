<?= $this->extend('product/layout/main') ?>
<?= $this->section('content') ?>
<div class="container">
    <h3></h3>
    <a href="<?=site_url('/')?>">Home</a> <br>
    <a href="<?=site_url('/clear-cart')?>">clear cart </a>
    <h1>Transaction Cancel </h1>
</div>
<?= $this->endSection() ?>