<?php declare(strict_types=1);

/** @var Yiisoft\View\WebView $this */
/** @var Mailery\Menu\Navbar\NavbarMenu $navbarMenu */

use Mailery\Icon\Icon;
use Mailery\Menu\MenuItem;
use Mailery\Web\Vue\Directive;

$fnMenuItemChildsRenderer = function (MenuItem $menuItem) {
    $lines = [];
    $label = Directive::pre($menuItem->getLabel());
    $childItems = $menuItem->getItems();

    if (empty($childItems)) {
        if (($method = $menuItem->getMethod()) !== null) {
            $lines[] = '<li role="presentation" class="text-nowrap">';
            $lines[] = '<ui-widget-link method="' . $method . '" href="' . ($menuItem->getUrl() ?? 'javascript:void(0);') . '" class="dropdown-item">' . $label . '</ui-widget-link>';
            $lines[] = '</li>';
        } else {
            $lines[] = '<b-dropdown-item href="' . ($menuItem->getUrl() ?? 'javascript:void(0);') . '" class="text-nowrap">' . $label . '</b-dropdown-item>';
        }
    } else {
        $lines[] = '<li role="presentation" class="dropdown-submenu text-nowrap">';
        $lines[] = '<a role="menuitem" href="' . ($menuItem->getUrl() ?? 'javascript:void(0);') . '" class="dropdown-item dropdown-toggle dropdown-toggle-no-caret" data-toggle="dropdown">'
                . $label . ' '
                . Icon::widget()->options(['class' => 'menu-caret'])->name('chevron-right')
                . '</a>';
        $lines[] = '<ul class="dropdown-menu">';

        foreach ($childItems as $childItem) {
            $lines[] = '<li><a href="' . ($childItem->getUrl() ?? 'javascript:void(0);') . '" class="dropdown-item">' . Directive::pre($childItem->getLabel()) . '</a></li>';
        }

        $lines[] = '</ul>';
        $lines[] = '</li>';
    }

    return implode("\n", $lines);
};

$fnMenuItemRenderer = function (MenuItem $menuItem) use ($fnMenuItemChildsRenderer): string {
    $lines = [];
    $label = Directive::pre($menuItem->getLabel());
    $childItems = $menuItem->getItems();

    if (empty($childItems)) {
        $lines[] = '<b-nav-item href="' . ($menuItem->getUrl() ?? 'javascript:void(0);') . '" class="text-nowrap">' . $label . '</b-nav-item>';
    } else {
        $lines[] = '<b-nav-item-dropdown right no-caret>';
        $lines[] = '<template v-slot:button-content>' . $label . ' ' . Icon::widget()->options(['class' => 'menu-arrow'])->name('chevron-down') . '</template>';

        foreach ($childItems as $childItem) {
            $lines[] = $fnMenuItemChildsRenderer($childItem);
        }

        $lines[] = '</b-nav-item-dropdown>';
    }

    return implode("\n", $lines);
};

?><b-navbar class="navbar navbar-dark navbar-expand-lg sticky-top bg-dark flex-md-nowrap p-0">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="/"><?= $brandLabel ?></a>

    <div class="collapse navbar-collapse">
        <b-navbar-nav class="ml-auto"><?php
            foreach ($navbarMenu->getItems() as $menuItem) {
                echo $fnMenuItemRenderer($menuItem);
            }
        ?></b-navbar-nav>
    </div>
</b-navbar>
