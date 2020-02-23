<?php declare(strict_types=1);

use Mailery\Menu\Widget\Menu;

/** @var \Yiisoft\View\WebView $this */
/** @var \Mailery\Menu\Navbar\NavbarMenuInterface $navbarMenu */
?><nav class="navbar navbar-dark navbar-expand-lg sticky-top bg-dark flex-md-nowrap p-0">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Company name</a>
    <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">

    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbar-nav" aria-controls="navbar-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div id="navbar-nav" class="collapse navbar-collapse">
        <?= Menu::widget()->options([
                'class' => 'navbar-nav px-3',
            ])->itemOptions([
                'class' => 'nav-item text-nowrap',
            ])->linkTemplate(
                '<a class="nav-link" href="{url}">{label}</a>'
            )->items($navbarMenu->getItems());
        ?>
    </div>
</nav>
