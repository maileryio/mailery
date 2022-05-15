<?php

declare(strict_types=1);

/**
 * @var \Yiisoft\Router\UrlGeneratorInterface $url
 */

use Yiisoft\Html\Html;
?>

<div class="card p-5 m-5">
    <div class="card-body text-center ">
        <h1 class="card-title display-1 fw-bold">404</h1>
        <p class="card-text"><?= sprintf(
            'The page %s could not be found.',
            Html::span(
                Html::encode($currentRoute->getUri()->getPath()),
                ['class' => 'text-muted']
            )
        ); ?></p>

        <p><?= Html::a(
            'Go back home',
            $url->generate('/default/index'),
            ['class' => 'btn btn-outline-primary mt-5']
        ); ?></p>
    </div>
</div>