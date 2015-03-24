<?php
namespace FluxCtrl\App\Model\Hose;

use Cake\Collection\Collection;
use Cake\ORM\TableRegistry;
use FluxCtrl\App\Datasource\HoseInterface;
use FluxCtrl\App\Model\Entity\Feed;
use PicoFeed\Parser\Item;
use PicoFeed\PicoFeedException;
use PicoFeed\Reader\Reader;

class PicoHose implements HoseInterface
{
    protected $_Feed;

    public function __construct(Feed $feed)
    {
        $this->_Feed = $feed;
    }

    public function aggregate()
    {
        $feed = $this->_Feed;
        $raw = $this->getFeedParser()->execute();
        $items = (new Collection($raw->getItems()))
            ->map(function ($item) {
                return $this->toFluxCtrlItem($item)
                    ->hiddenProperties([])
                    ->toArray();
            })
            ->toArray();

        $data = compact('items');
        $options = ['associated' => ['Items' => ['accessibleFields' => ['*' => true]]]];

        if ($feed->isNew()) {
            $data += [
                'title' => $raw->title,
                'description' => $raw->description,
                'url' => $raw->feed_url,
                'website' => $raw->site_url,
                'checked' => $raw->date,
                'lang' => $raw->language,
            ];
            $options += ['fieldList' => array_keys($data)];
        }

        return TableRegistry::get('Feeds')->patchEntity($feed, $data, $options);
    }

    public function getFeedParser()
    {
        try {
            $reader = new Reader();
            $resource = $reader->download(
                $this->_Feed->url,
                $this->_Feed->checked,
                $this->_Feed->etag
            );

            $parser = $reader->getParser(
                $resource->getUrl(),
                $resource->getContent(),
                $resource->getEncoding()
            );
        } catch (PicoFeedException $e) {
            throw $e;
        }

        return $parser;
    }

    public function toFluxCtrlItem(Item $item)
    {
        return TableRegistry::get('Items')->newEntity(
            [
                'title' => $item->title,
                'author' => $item->author,
                'url' => $item->url,
                'content' => $item->content,
                'enclosure_url' => $item->enclosure_url,
                'enclosure_type' => $item->enclosure_type,
                'lang' => $item->language,
                'published' => $item->date,
            ],
            [
                'validate' => false,
                'accessibleFields' => ['*' => true]
            ]
        )->accessible('*', false);
    }
}
