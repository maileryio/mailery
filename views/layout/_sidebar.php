<?php declare(strict_types=1);

use Mailery\Menu\Widget\Menu;
use Mailery\Menu\Sidebar\SidebarMenuDecorator;

/** @var \Yiisoft\View\WebView $this */
/** @var \Psr\Http\Message\ServerRequestInterface $request */
/** @var \Mailery\Menu\Sidebar\SidebarMenuInterface $sidebarMenu */
?><ui-sidebar>
    <nav class="col-md-2 d-none d-md-block bg-light sidebar">
        <div class="sidebar-sticky">
            <?= Menu::widget()->options([
                    'class' => 'nav flex-column',
                ])->itemOptions([
                    'class' => 'nav-item',
                ])->linkTemplate(
                    '<a class="nav-link" href="{url}">{label}</a>'
                )->currentPath(
                    $currentUrl
                )->activateParents(
                    true
                )->items(
                    (new SidebarMenuDecorator(
                        array_map(
                            fn ($item) => $item->toArray(),
                            $sidebarMenu->getItems()
                        )
                    ))->getItems()
                );
            ?>
        </div>
    </nav>
</ui-sidebar>
