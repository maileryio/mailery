<?php

/** @var \Yiisoft\View\WebView $this */
/** @var $content string */
/** @var $headerContent string */
/** @var $footerContent string */
/** @var $sidebarContent string */

echo $headerContent;

?><div class="container-fluid">
    <div class="row">
        <?= $sidebarContent ?>

        <main role="main" class="<?= $sidebarContent ? 'col-md-9 ml-sm-auto col-lg-10' : 'col-12' ?> pt-3 px-4">
            <?= $content; ?>
        </main>

        <?= $footerContent ?>
    </div>
</div>
