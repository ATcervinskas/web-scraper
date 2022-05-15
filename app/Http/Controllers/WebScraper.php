<?php

namespace App\Http\Controllers;

use App\Models\Scraper;
use App\Library\Goutte\GoutteHandler;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;

/**
 * WebScraper Controller class
 */
class WebScraper extends Controller
{
    /**
     * Renders main view with fetched news
     *
     * @param $siteName
     * @return Factory|View|Application
     */
    public function index($siteName): Factory|View|Application
    {
        $news = [];
        $goutteHandler = new GoutteHandler;
        $scraper = new Scraper();

        $news = $goutteHandler->getNews($siteName);

        DB::table('scrapers')->insert($news);
        $model = $scraper->where('site', $siteName)->latest()->take(9)->get()->toArray();

        return view('webscraper.index', ['model' => $model]);
    }

}
