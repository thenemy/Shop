<?php

namespace App\Domain\Category\Interfaces;

interface CategoryRelationInterface
{
    const CATEGORY_ICON = "icon";
    const CATEGORY_ICON_DATA = self::CATEGORY_ICON . \CR::CR . self::CATEGORY_ICON;
}
