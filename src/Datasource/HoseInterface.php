<?php
namespace FluxCtrl\App\Datasource;

use FluxCtrl\App\Model\Entity\Feed;

interface HoseInterface
{
    /**
     * Constructor.
     *
     * @param \FluxCtrl\Model\Entity\Feed $feed Feed entity.
     * @return void
     */
    public function __construct(Feed $feed);

    /**
     * Feed aggregator.
     *
     * @return \FluxCtrl\Model\Entity\Feed Updated feed entity.
     */
    public function aggregate();
}
