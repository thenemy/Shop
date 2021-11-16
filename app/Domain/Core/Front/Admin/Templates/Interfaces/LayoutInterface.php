<?php

namespace App\Domain\Core\Front\Admin\Templates\Interfaces;

interface LayoutInterface
{
    const  INDEX_LAYOUT = "@extends('admin.base.index')";
    const CREATE_LAYOUT = "@extends('admin.base.create')";
    const EDIT_LAYOUT = "@extends('admin.base.edit)";
}
