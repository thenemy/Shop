<?php

namespace App\Domain\Core\Front\Admin\Form\Traits;

trait AttributeGetVariable
{
    protected function getAttributeVariable($value): string
    {
        return sprintf('{{%s}}', $this->getWithoutScopeAtrVariable($value));
    }

    protected function getWithoutScopeAtrVariable($value): string
    {
        return sprintf('%s->%s', $this->getEntityVariable(), $value);
    }

    protected function getEntityVariable()
    {
        return '$entity';
    }
}
