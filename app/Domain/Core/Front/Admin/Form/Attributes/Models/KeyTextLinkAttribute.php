<?php

namespace App\Domain\Core\Front\Admin\Form\Attributes\Models;
/*
 *  here value is  helper  text
 *
 * **/

class KeyTextLinkAttribute extends KeyTextAttribute
{
    public string $link;

    public static function newLink(string $key, string $value, string $link)
    {
        $object = parent::new($key, $value);
        $object->link = $link;
        return $object;
    }

    public function generateHtml(): string
    {
        return sprintf(
            "<x-helper.text.text_key_link key='%s' value='%s' :link='%s'></x-helper.text.text_key_link>",
            $this->key,
            $this->value,
            sprintf("route(\"download.file\", [\"path\"=> %s])",
                $this->getWithoutScopeAtrVariable($this->link . "->path")),
        );
    }
}
