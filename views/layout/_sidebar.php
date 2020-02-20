<?php declare(strict_types=1);

use Mailery\Menu\Widget\Menu;

/** @var \Yiisoft\View\WebView $this */
/** @var \Psr\Http\Message\ServerRequestInterface $request */
/** @var \Mailery\Menu\Sidebar\SidebarMenuInterface $sidebarMenu */
?><nav class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
        <?= Menu::widget()->options([
            'class' => 'nav flex-column',
        ])->itemOptions([
            'class' => 'nav-item',
        ])->linkTemplate(
            '<a class="nav-link" href="{url}">{label}</a>'
        )->currentPath(
            $request->getUri()->getPath()
        )->activateParents(
            true
        )->items($sidebarMenu->getItems()); ?>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Saved reports</span>
            <a class="d-flex align-items-center text-muted" href="#">
                <span data-feather="plus-circle"></span>
            </a>
        </h6>
        <ul class="nav flex-column mb-2">
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="file-text"></span>
                    Current month
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="file-text"></span>
                    Last quarter
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="file-text"></span>
                    Social engagement
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="file-text"></span>
                    Year-end sale
                </a>
            </li>
        </ul>
    </div>
</nav>
