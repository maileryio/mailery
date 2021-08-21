<?php

declare(strict_types=1);

use Mailery\Web\Assets\AppAssetBundle;
use Yiisoft\Html\Html;

/** @var \Yiisoft\View\WebView $this */
/** @var \Yiisoft\Assets\AssetManager $assetManager */
/** @var \Mailery\Brand\Service\BrandLocatorInterface $brandLocator */
/** @var $content string */
$headerContent = $this->render('_header', compact('brandLabel'));
$footerContent = $this->render('_footer');

if ($brandLocator->hasBrand()) {
    $sidebarContent = $this->render('_sidebar');
    $content = $this->render('container/_brand', compact('content', 'headerContent', 'footerContent', 'sidebarContent'));
} else {
    $content = $this->render('container/_main', compact('content', 'headerContent', 'footerContent'));
}

$assetManager->register([
    AppAssetBundle::class,
]);

$this->addCssFiles($assetManager->getCssFiles());
$this->addJsFiles($assetManager->getJsFiles());
$this->addJsStrings($assetManager->getJsStrings());
$this->addJsVars($assetManager->getJsVars());

$this->beginPage();

?><!DOCTYPE html>
<html lang="<?= $language ?>">
<head>
    <meta charset="<?= $encoding ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="apple-mobile-web-app-capable" content="yes" />

    <title><?= Html::encode($this->getTitle()); ?></title>
    <?php $this->head(); ?>
</head>
<body>
    <?php $this->beginBody(); ?>

    <ui-app id="app">
        <?= $content; ?>
    </ui-app>

    <?php $this->endBody(); ?>
</body>
</html>
<?php
$this->endPage(true);
