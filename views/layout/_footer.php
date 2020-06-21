<?php declare(strict_types=1);

use Mailery\Icon\Icon;

/** @var Mailery\Web\View\WebView $this */
/** @var \Mailery\Brand\Service\BrandLocatorInterface $brandLocator */
$cssClass = 'ml-sm-auto col-lg-12 pt-3 pb-3 px-4 footer-sticky';
if ($brandLocator->hasBrand()) {
    $cssClass = 'col-md-9 ml-sm-auto col-lg-10 pt-3 pb-3 px-4 footer-sticky';
}
?>
<footer class="<?= $cssClass ?>">
    <div class="d-sm-flex justify-content-center justify-content-sm-between">
        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © <?= date('Y'); ?> <a href="#" target="_blank" class="text-muted">Mailery Platform</a>. All rights reserved.</span>
        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-muted text-center">Hand-crafted &amp; made with <?= Icon::widget()->name('heart-outline')->options(['class' => 'text-primary']); ?></span>
    </div>
</footer>