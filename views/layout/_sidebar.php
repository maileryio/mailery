<?php declare(strict_types=1);

use Mailery\Menu\Widget\Menu;
use Mailery\Web\Vue\Directive;

/** @var Yiisoft\View\WebView $this */
/** @var \Psr\Http\Message\ServerRequestInterface $request */
/** @var Mailery\Menu\Sidebar\SidebarMenu $sidebarMenu */
?><ui-sidebar>
    <nav class="col-lg-2 col-md-3 d-none d-md-block sidebar">
        <div class="sidebar-sticky">
            <?= Menu::widget()->options([
                    'class' => 'nav flex-column',
                ])->itemOptions([
                    'class' => 'nav-item',
                ])->linkTemplate(
                    '<a class="nav-link" href="{url}">' . Directive::pre('{label}') . '</a>'
                )->currentPath(
                    $currentRoute->getUri()->getPath()
                )->activateParents(
                    true
                )->items(
                    $sidebarMenu->getItems()
                );
            ?>
        </div>
    </nav>
</ui-sidebar>
