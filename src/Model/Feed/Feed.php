<?php
namespace FluxCtrl\Model\Feed;

use Cake\Collection\Collection;
use Cake\ORM\TableRegistry;
use FluxCtrl\Datasource\FeedInterface;
use FluxCtrl\Model\Entity\Feed as FeedEntity;
use PicoFeed\Parser\Item;
use PicoFeed\PicoFeedException;
use PicoFeed\Reader\Reader;

class Feed implements FeedInterface
{
    public function aggregate(FeedEntity $feed)
    {
        $raw = $this->getFeedParser($feed)->execute();
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
                'title' => $feed->title,
                'description' => $feed->description,
                'url' => $feed->feed_url,
                'website' => $feed->site_url,
                'checked' => $feed->date,
                'lang' => $feed->language,
            ];
            $options += ['fieldList' => array_keys($data)];
        }

        return TableRegistry::get('Feeds')->patchEntity($feed, $data, $options);
    }

    public function getFeedParser(FeedEntity $feed)
    {
        try {
            $reader = new Reader();
            $resource = $reader->download(
                $feed->url,
                $feed->checked,
                $feed->etag
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
