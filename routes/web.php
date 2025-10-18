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
    Route::get('/reach-out', 'WebController@contact')->name('reach-out');
    Route::get('/write-for-us', 'WebController@writeForUs')->name('write-for-us');


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
    Route::post('/enquiry', 'EnquiryController@enquiry')->name('enquiry.submit');
    Route::post('/enquiry-collab', 'EnquiryController@enquiryCollab')->name('enquiry.collab.submit');

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


    //Users
    Route::prefix('user')->namespace('App\Http\Controllers\user')->group(function () {
        Route::post('create', 'UserController@create')->name('user.create');

        Route::post('login', 'UserController@login')->name('user.login');

        Route::post('forgotPassword', 'UserController@forgotPassword')->name('user.forgotPassword');
        Route::get('resetPassword/{id}/{email}', 'UserController@resetPassword')->name('user.resetPassword');
        Route::post('updatePassword', 'UserController@updatePassword')->name('user.updatePassword');

        Route::get('logout', 'UserController@logout')->name('user.logout');

        Route::get('/google', 'GoogleLoginController@redirectToGoogle')->name('auth.google');
        Route::get('/google/callback', 'GoogleLoginController@handleGoogleCallback');


        Route::middleware([userAuth::class])->group(function () {

            Route::get('dashboard', 'UserController@index')->name('user.dashboard');

            //Blogs
            Route::prefix('articles')->group(function () {

                Route::get('/', 'BlogController@index')->name('user.blog');
                Route::get('/load', 'BlogController@load')->name('user.blog.load');
                Route::get('/search/{val}', 'BlogController@search');
                Route::post('/create', 'BlogController@create')->name('user.blog.create');
                Route::get('/delete/{id}', 'BlogController@delete');
                Route::get('/edit/{id}', 'BlogController@edit');
                Route::post('/update', 'BlogController@update_blog')->name('user.blog.update');

            });

            // Route::get('profile', 'UserController@profile')->name('user.profile');
            Route::post('verify_email', 'UserController@verify_email')->name('user.verify_email');

            Route::prefix('claim-cashback')->group(function () {
                Route::get('/', 'UserController@claimCashback')->name('user.claimCashback');
                Route::post('/request', 'UserController@claimCashbackRequest')->name('user.claimCashback.request');
            });


            Route::prefix('settings')->group(function () {
                Route::get('/', 'UserController@settings')->name('user.settings');
                Route::post('/update', 'UserController@settings_update')->name('user.settings.update');
                Route::post('/bank_details', 'UserController@bank_details')->name('user.settings.bank_details');
            });
        });
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