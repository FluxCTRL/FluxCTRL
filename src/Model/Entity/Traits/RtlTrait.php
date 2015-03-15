<?php
namespace FluxCtrl\Model\Entity\Traits;

use PicoFeed\Parser\Parser;

trait RtlTrait
{
    protected function _getIsRtl()
    {
        return Parser::isLanguageRTL($this->lang);
    }
}
