<?php
namespace FluxCtrl\App\Model\Entity\Traits;

use PicoFeed\Parser\Parser;

trait RtlTrait
{

    /**
     * Tells if an entity's language is RTL.
     *
     * @return bool True if entity's language is RTL.
     */
    protected function _getIsRtl()
    {
        return Parser::isLanguageRTL($this->lang);
    }
}
