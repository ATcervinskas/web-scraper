<?php

namespace App\Library\Goutte;

use Goutte\Client;
use http\Exception\InvalidArgumentException;
use Symfony\Component\DomCrawler\Crawler;

/**
 * GoutteHandler class
 */
class GoutteHandler
{
    /**
     * @var Client
     */
    public Client $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    /**
     * Sends request for data fetch
     *
     * @param $method
     * @param $url
     * @return Crawler
     */
    public function sendRequest($method, $url): Crawler
    {
        return $this->client->request($method, $url);
    }

    /**
     * Gets news from fetched site
     *
     * @param $siteName
     * @return array
     */
    public function getNews($siteName): array
    {
        if ($siteName === '15min') {
            $crawler = $this->sendRequest('GET', 'https://www.15min.lt/naujienos');

            return $crawler->filter('article')->each(function ($node) use ($siteName) {
                return [
                    'site' => $siteName,
                    'item_id' => $node->attr('id'),
                    'title' => $node->filter('h4')->text(),
                    'image' => $node->filter('img')->attr('data-src'),
                    'url' => $node->filter('a')->attr('href'),
                    'created_at' => now()
                ];
            });
        } elseif ($siteName === 'delfi') {

            $crawler = $this->sendRequest('GET', 'https://www.delfi.lt/archive/latest.php');

            return $crawler->filter('.headline')->each(function ($node) use ($siteName) {

                return [
                    'site' => $siteName,
                    'item_id' => 'null',
                    'title' =>  $node->filter('.headline-title a')->text(),
                    'image' => $node->filter('.headline-image a img')->attr('data-src'),
                    'url' => $node->filter('.headline-image a')->attr('href'),
                    'created_at' => now()
                ];
            });
        }
        throw new InvalidArgumentException('Wrong site name');
    }
}


