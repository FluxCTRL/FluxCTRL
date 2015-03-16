<?php
namespace FluxCtrl\Datasource;

use FluxCtrl\Model\Entity\Feed;

interface HoseInterface
{
    /**
     * Feed aggregator.
     *
     * @param array $options Options.
     * @return array Of `Item` entities.
     */
    public function aggregate(Feed $feed);
}
