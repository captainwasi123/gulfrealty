<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use App\Models\Services;
use App\Models\Categories;
use App\Models\Blogs;
use App\Models\BlogTags;
use App\Models\Playlists;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:generate-sitemap';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Automatically Generate an XML Sitemap';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        
        //Base URLs

            $sitmap = Sitemap::create();
            $sitmap->add(Url::create("/")->setPriority(1)->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)->setLastModificationDate(Carbon::now()));
            $sitmap->add(Url::create("/collaborate")->setPriority(0.80)->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)->setLastModificationDate(Carbon::now()));
            $sitmap->add(Url::create("/about-us")->setPriority(0.80)->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)->setLastModificationDate(Carbon::now()));
            $sitmap->add(Url::create("/blogs")->setPriority(0.80)->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)->setLastModificationDate(Carbon::now()));
            $sitmap->add(Url::create("/reach-out")->setPriority(0.80)->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)->setLastModificationDate(Carbon::now()));
            $sitmap->add(Url::create("/yt-episodes")->setPriority(0.80)->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)->setLastModificationDate(Carbon::now()));
            $sitmap->add(Url::create("/experience")->setPriority(0.80)->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)->setLastModificationDate(Carbon::now()));
            $sitmap->add(Url::create("/write-for-us")->setPriority(0.80)->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)->setLastModificationDate(Carbon::now()));

        //Playlists
            Playlists::get()->each(function (Playlists $pl) use ($sitmap) {
                if(count($pl->episodes) > 0){
                    $sitmap->add(Url::create("/playlist/".$pl->slug)->setPriority(0.51)->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)->setLastModificationDate(Carbon::now()));
                }
            });

        //Categories
            Categories::get()->each(function (Categories $cat) use ($sitmap) {
                if(count($cat->blogs) > 0){
                    $sitmap->add(Url::create("/blogs/".$cat->slug)->setPriority(0.51)->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)->setLastModificationDate(Carbon::now()));
                }
            });

        //Blogs
            Blogs::where('status', '1')->get()->each(function (Blogs $blog) use ($sitmap) {
                $sitmap->add(Url::create("/blog/".$blog->slug)->setPriority(0.64)->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)->setLastModificationDate(Carbon::now()));
            });


            /*BlogTags::select('tag')->distinct()->get()->each(function (BlogTags $tags) use ($sitmap) {
                if(!empty($tags->data->id)){
                    $sitmap->add(Url::create("/tag/".$tags->data->slug)->setPriority(0.80)->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)->setLastModificationDate(Carbon::now()));
                }
            });*/

            $sitmap->writeToFile(base_path('/sitemap.xml'));
    }
}
