<?php

declare(strict_types=1);

use Mailery\Web\Assets\AppAssetBundle;
use Yiisoft\Html\Html;

/** @var \Yiisoft\View\WebView $this */
/** @var \Yiisoft\Assets\AssetManager $assetManager */
/** @var $content string */

$assetManager->register([
    AppAssetBundle::class,
]);

$this->setCssFiles($assetManager->getCssFiles());
$this->setJsFiles($assetManager->getJsFiles());

$this->beginPage();

?><!DOCTYPE html>
<html lang="<?= $this->getLanguage(); ?>">
<head>
    <meta charset="<?= $this->getEncoding(); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="apple-mobile-web-app-capable" content="yes" />

    <title><?= Html::encode($this->getTitle()); ?></title>
    <?php $this->head(); ?>
</head>
<body>
    <?php $this->beginBody(); ?>

    <div id="app">
        <?= $this->render('_header');?>

        <div class="container-fluid">
            <div class="row">
                <?= $this->render('_sidebar');?>

                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
                    <?= $content; ?>
                </main>

                <?= $this->render('_footer'); ?>
            </div>
        </div>
    </div>

    <?php $this->endBody(); ?>
</body>
</html>
<?php
$this->endPage(true);
