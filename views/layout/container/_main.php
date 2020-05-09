<?php declare(strict_types=1);

/** @var \Yiisoft\View\WebView $this */
/** @var $content string */
/** @var $headerContent string */
/** @var $footerContent string */
echo $headerContent;

?><div class="container">
    <div class="row">
        <main role="main" class="col-12 pt-3 px-4">
            <?= $content; ?>
        </main>
        <?= $footerContent; ?>
    </div>
</div>
