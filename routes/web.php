<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\adminAuth;
use App\Http\Middleware\userAuth;



//sitemap
Route::get('/update-sitemap', function () {
    Artisan::call('app:generate-sitemap');
    $response['success'] = 'success';
    $response['message'] = 'Success! Sitemap Successfully Updated.';
    
    return response()->json($response, 200);
});

//Web 

Route::namespace('App\Http\Controllers\web')->group(function(){
    Route::get('/', 'WebController@index')->name('home');
    Route::get('/collaborate', 'WebController@collaborate')->name('collaborate');
    Route::get('/contact', 'WebController@contact')->name('contact');
    Route::get('/write-for-us', 'WebController@writeForUs')->name('write-for-us');


    Route::prefix('properties')->group(function(){
        Route::get('/', 'PropertyController@index')->name('properties');
        Route::get('/buy', 'PropertyController@buyProperties')->name('properties.buy');
        Route::get('/rent', 'PropertyController@rentProperties')->name('properties.rent');

        Route::get('/search', 'PropertyController@search')->name('properties.search');

        Route::get('/{slug}', 'PropertyController@details');
    });

    Route::prefix('mortgage-calculator')->group(function(){
        Route::get('/', 'CalculatorController@mortgage')->name('calculators.mortgage');
    });

    Route::prefix('about')->group(function(){

        Route::get('/', 'AboutController@index')->name('about');
        Route::get('/ceo-message', 'AboutController@ceoMessage')->name('about.ceo');
        Route::get('/our-team', 'AboutController@ourTeam')->name('about.team');

        Route::prefix('gallery')->group(function(){

            Route::get('/', 'AboutController@gallery')->name('about.gallery');
            Route::get('/podcasts', 'AboutController@galleryPodcast')->name('about.gallery.podcasts');
            Route::get('/reels', 'AboutController@galleryReels')->name('about.gallery.reels');
            Route::get('/images', 'AboutController@galleryImages')->name('about.gallery.images');
            Route::get('/images/{id}', 'AboutController@galleryImagesDetails')->name('about.gallery.images.details');
        });
    });


    //Episodes
    Route::get('/yt-episodes', 'EpisodeController@index')->name('episodes');
    Route::get('/playlist/{slug}', 'EpisodeController@episodePlaylist')->name('episodes.playlist');

    //Newsletter
    Route::post('/subscribe', 'NewsletterController@subscribe')->name('newsletter.subscribe');

    //Enquiry
    Route::post('/enquiry-property', 'EnquiryController@enquiryProperty')->name('property.enquiry.submit');
    Route::post('/enquiry-contact', 'EnquiryController@enquiryContact')->name('contact.enquiry.submit');

    //Aside
    Route::get('/get-aside', 'WebController@getAside');


    //Experience
    Route::get('/experience', 'BlogController@experience')->name('experience');
    
    //Blogs
    Route::get('/blogs', 'BlogController@index')->name('blogs');
    Route::get('/blogs/{cat_slug}', 'BlogController@blogCategory')->name('blogs.category');
    Route::get('/blog/{blog_slug}', 'BlogController@details')->name('blogs.detail');

    Route::get('/blog/search/{val}', 'BlogController@search');


});


//Administration

Route::prefix('admin/panel')->namespace('App\Http\Controllers\admin')->group(function () {

    //Authentication
    Route::get('/login', 'LoginController@index')->name('admin.login');
    Route::post('/login', 'LoginController@authenticate');
    Route::get('/logout', 'LoginController@logout')->name('admin.logout');


    //Authenticated
    Route::middleware([adminAuth::class])->group(function () {
        Route::get('/', 'MainController@index')->name('admin.dashboard');


        
        //Blogs
        Route::prefix('blogs')->group(function () {

            Route::get('/', 'BlogController@index')->name('admin.blog');
            Route::get('/load', 'BlogController@load')->name('admin.blog.load');
            Route::get('/search/{val}', 'BlogController@search');
            Route::post('/create', 'BlogController@create')->name('admin.blog.create');
            Route::get('/delete/{id}', 'BlogController@delete');
            Route::get('/edit/{id}', 'BlogController@edit');
            Route::post('/update', 'BlogController@update_blog')->name('admin.blog.update');

        });


        Route::prefix('author')->group(function () {

            Route::get('/', 'AuthorController@index')->name('admin.author');
            Route::post('/create', 'AuthorController@create')->name('admin.author.create');
            Route::get('/load', 'AuthorController@load')->name('admin.author.load');
            Route::get('/edit/{id}', 'AuthorController@edit');
            Route::get('/delete/{id}', 'AuthorController@delete');
        });



        //Real Estate
        Route::prefix('realestate')->group(function(){

            Route::prefix('properties')->group(function () {

                Route::get('/', 'PropertyController@index')->name('admin.realestate.properties');
                Route::get('/load', 'PropertyController@load')->name('admin.realestate.properties.load');
                Route::get('/search/{val}', 'PropertyController@search');
                Route::post('/create', 'PropertyController@create')->name('admin.realestate.properties.create');
                Route::get('/delete/{id}', 'PropertyController@delete');
                Route::get('/edit/{id}', 'PropertyController@edit');
                Route::post('/update', 'PropertyController@update_blog')->name('admin.realestate.properties.update');

            });


            Route::prefix('locations')->group(function () {

                Route::get('/', 'LocationController@index')->name('admin.realestate.locations');
                Route::get('/load', 'LocationController@load')->name('admin.realestate.locations.load');
                Route::get('/search/{val}', 'LocationController@search');
                Route::post('/create', 'LocationController@create')->name('admin.realestate.locations.create');
                Route::get('/delete/{id}', 'LocationController@delete');
                Route::get('/edit/{id}', 'LocationController@edit');
                Route::post('/update', 'LocationController@update_blog')->name('admin.realestate.locations.update');

            });

        });


        //Gallery
        Route::prefix('team')->group(function(){

            Route::prefix('agents')->group(function () {

                Route::get('/', 'AgentController@index')->name('admin.team.agents');
                Route::get('/load', 'AgentController@load')->name('admin.team.agents.load');
                Route::get('/search/{val}', 'AgentController@search');
                Route::post('/create', 'AgentController@create')->name('admin.team.agents.create');
                Route::get('/delete/{id}', 'AgentController@delete');
                Route::get('/edit/{id}', 'AgentController@edit');
                Route::post('/update', 'AgentController@update_blog')->name('admin.team.agents.update');

            });

            Route::prefix('staff')->group(function () {

                Route::get('/', 'StaffController@index')->name('admin.team.staff');
                Route::get('/load', 'StaffController@load')->name('admin.team.staff.load');
                Route::get('/search/{val}', 'StaffController@search');
                Route::post('/create', 'StaffController@create')->name('admin.team.staff.create');
                Route::get('/delete/{id}', 'StaffController@delete');
                Route::get('/edit/{id}', 'StaffController@edit');
                Route::post('/update', 'StaffController@update_blog')->name('admin.team.staff.update');

            });
        });

        
        //Gallery
        Route::prefix('gallery')->group(function(){

            Route::prefix('videos')->group(function () {

                Route::get('/', 'VideoController@index')->name('admin.gallery.videos');
                Route::get('/load', 'VideoController@load')->name('admin.gallery.videos.load');
                Route::get('/search/{val}', 'VideoController@search');
                Route::post('/create', 'VideoController@create')->name('admin.gallery.videos.create');
                Route::get('/delete/{id}', 'VideoController@delete');
                Route::get('/edit/{id}', 'VideoController@edit');
                Route::post('/update', 'VideoController@update_blog')->name('admin.gallery.videos.update');

            });

            Route::prefix('reels')->group(function () {

                Route::get('/', 'ReelController@index')->name('admin.gallery.reels');
                Route::get('/load', 'ReelController@load')->name('admin.gallery.reels.load');
                Route::get('/search/{val}', 'ReelController@search');
                Route::post('/create', 'ReelController@create')->name('admin.gallery.reels.create');
                Route::get('/delete/{id}', 'ReelController@delete');
                Route::get('/edit/{id}', 'ReelController@edit');
                Route::post('/update', 'ReelController@update_blog')->name('admin.gallery.reels.update');

            });

            Route::prefix('images')->group(function () {

                Route::get('/', 'ImageController@index')->name('admin.gallery.images');
                Route::get('/load', 'ImageController@load')->name('admin.gallery.images.load');
                Route::get('/search/{val}', 'ImageController@search');
                Route::post('/create', 'ImageController@create')->name('admin.gallery.images.create');
                Route::get('/delete/{id}', 'ImageController@delete');
                Route::get('/edit/{id}', 'ImageController@edit');
                Route::post('/update', 'ImageController@update_blog')->name('admin.gallery.images.update');

            });
        });



        //SEO Tools
        Route::prefix('seo')->group(function () {
            Route::prefix('meta')->group(function () {
                Route::get('/', 'SeoController@meta')->name('admin.seo.meta');
                Route::post('/check', 'SeoController@meta_check')->name('admin.seo.meta.check');
                Route::post('/update', 'SeoController@meta_update')->name('admin.seo.meta.update');
            });
            Route::prefix('snippet')->group(function () {
                Route::get('/', 'SeoController@snippet')->name('admin.seo.snippet');
                Route::get('/load', 'SeoController@snippet_load')->name('admin.seo.snippet.load');
                Route::post('/create', 'SeoController@snippet_create')->name('admin.seo.snippet.create');
                Route::get('/delete/{id}', 'SeoController@snippet_delete');
                Route::get('/edit/{id}', 'SeoController@snippet_edit');
                Route::post('/update', 'SeoController@snippet_update')->name('admin.seo.snippet.update');
            });
        });


        //Newsletter
        Route::prefix('newsletter')->group(function () {
            Route::get('/', 'NewsletterController@index')->name('admin.newsletter');
            Route::get('/load', 'NewsletterController@load')->name('admin.newsletter.load');
            Route::post('/filter', 'NewsletterController@user_filter')->name('admin.newsletter.filter');
            Route::post('/export', 'NewsletterController@user_export')->name('admin.newsletter.export');
        });
    });
});