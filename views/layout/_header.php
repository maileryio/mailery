<?php declare(strict_types=1);

use Mailery\Menu\MenuItem;
use Mailery\Icon\Icon;

$fnMenuItemChildsRenderer = function (MenuItem $menuItem) {
    $lines = [];
    $childItems = $menuItem->getChildItems();

    if (empty($childItems)) {
        $lines[] = '<b-dropdown-item href="' . ($menuItem->getUrl() ?? 'javascript:void(0);') . '" class="text-nowrap">' . $menuItem->getLabel() . '</b-dropdown-item>';
    } else {
        $lines[] = '<li role="presentation" class="dropdown-submenu text-nowrap">';
        $lines[] = '<a role="menuitem" href="' . ($menuItem->getUrl() ?? 'javascript:void(0);') . '" class="dropdown-item dropdown-toggle dropdown-toggle-no-caret" data-toggle="dropdown">'
                . $menuItem->getLabel() . ' '
                . Icon::widget()->options(['class' => 'menu-caret'])->name('chevron-right')
                . '</a>';
        $lines[] = '<ul class="dropdown-menu">';

        foreach ($childItems as $childItem) {
            $lines[] = '<li><a href="' . ($childItem->getUrl() ?? 'javascript:void(0);') . '" class="dropdown-item">' . $childItem->getLabel() . '</a></li>';
        }

        $lines[] = '</ul>';
        $lines[] = '</li>';
    }

    return implode("\n", $lines);
};

$fnMenuItemRenderer = function (MenuItem $menuItem) use($fnMenuItemChildsRenderer): string {
    $lines = [];
    $childItems = $menuItem->getChildItems();

    if (empty($childItems)) {
        $lines[] = '<b-nav-item href="' . ($menuItem->getUrl() ?? 'javascript:void(0);') . '" class="text-nowrap">' . $menuItem->getLabel() . '</b-nav-item>';
    } else {
        $lines[] = '<b-nav-item-dropdown right no-caret>';
        $lines[] = '<template v-slot:button-content>' . $menuItem->getLabel() . ' ' . Icon::widget()->options(['class' => 'menu-arrow'])->name('chevron-down') . '</template>';

        foreach ($childItems as $childItem) {
            $lines[] = $fnMenuItemChildsRenderer($childItem);
        }

        $lines[] = '</b-nav-item-dropdown>';
    }

    return implode("\n", $lines);
};

/** @var \Yiisoft\View\WebView $this */
/** @var \Mailery\Menu\Navbar\NavbarMenuInterface $navbarMenu */
?><b-navbar class="navbar navbar-dark navbar-expand-lg sticky-top bg-dark flex-md-nowrap p-0">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="/">Mailery Platform</a>

    <div class="collapse navbar-collapse">
        <b-navbar-nav class="ml-auto"><?php
            foreach ($navbarMenu->getItems() as $menuItem) {
                echo $fnMenuItemRenderer($menuItem);
            }
        ?></b-navbar-nav>
    </div>
</b-navbar>
