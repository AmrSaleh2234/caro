<?php
namespace App\Traits;
trait TranslatableTrait
{
    public function getAttribute($key)
    {
        if (isset($this->translatable) && in_array($key, $this->translatable)) {
            return $this->getTranslatedAttribute($key);
        }

        return parent::getAttribute($key);
    }

    protected function getTranslatedAttribute($key)
    {
        $values = $this->getAttributeValue($key);
        $primaryLocale = config('app.locale');
        $fallbackLocale = config('app.fallback_locale');

        if (!$values) {
            return null;
        }
        if (!isset($values[$primaryLocale])) {
            return $values[$fallbackLocale] ?: '';
        }

        return $values[$primaryLocale];
    }

    protected function isJsonCastable($key)
    {
        if (isset($this->translatable) && in_array($key, $this->translatable)) {
            return true;
        }

        return parent::isJsonCastable($key);
    }
}




