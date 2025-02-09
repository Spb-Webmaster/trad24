<?php

use App\Http\Controllers\AjaxController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\SignInController;
use App\Http\Controllers\Auth\SignUpController;
use App\Http\Controllers\Calendar\CalendarEventController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\Manager\ManagerController;
use App\Http\Controllers\Dashboard\UserArticle\UserArticleController;
use App\Http\Controllers\Dashboard\UserPeoples\People\UserPeopleArticleController;
use App\Http\Controllers\Dashboard\UserPeoples\People\UserPeoplePhotosController;
use App\Http\Controllers\Dashboard\UserPeoples\People\UserPeopleVideosController;
use App\Http\Controllers\Dashboard\UserPeoples\UserPeopleController;
use App\Http\Controllers\Dashboard\UserPhoto\UserPhotoAjaxController;
use App\Http\Controllers\Dashboard\UserPhoto\UserPhotoController;
use App\Http\Controllers\Dashboard\UserVideo\UserVideoController;
use App\Http\Controllers\Family\FamilyCatalogController;
use App\Http\Controllers\Family\FamilyHeadController;
use App\Http\Controllers\Family\FamilyObjectController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Info\InfoController;
use App\Http\Controllers\Pages\PageController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\Video\VideoController;
use App\Http\Middleware\ManagerMiddleware;
use Illuminate\Support\Facades\Route;
use Spatie\Honeypot\ProtectAgainstSpam;

/**
 * страницы
 */
Route::controller(HomeController::class)->group(function () {

    Route::get('/', 'index')
        ->name('home');
});


/**
 * Auth
 */

Route::controller(SignInController::class)->group(function () {

    Route::get('/login', 'page')
        ->middleware('guest')
        ->name('login');
    Route::post('/login', 'handle')
        ->name('login.handle');

});

Route::controller(SignUpController::class)->group(function () {

    Route::get('/sign-up', 'page')
        ->middleware('guest')
        ->name('register');
    Route::post('/sign-up', 'handle')->middleware(ProtectAgainstSpam::class)->name('register.handle');

});

Route::controller(ForgotPasswordController::class)->group(function () {

    Route::get('/forgot-password', 'page')
        ->middleware('guest')
        ->name('forgot');

    Route::post('/forgot-password', 'handle')
        ->middleware('guest')
        ->name('forgot.handel');

});

Route::controller(ResetPasswordController::class)->group(function () {

    Route::get('/reset-password/{token}', 'page')
        ->middleware('guest')
        ->name('password.reset');

    Route::post('/reset-password', 'handle')
        ->middleware('guest')
        ->name('password.handle');

});

Route::controller(LogoutController::class)->group(function () {

    Route::post('/logout', 'page')->name('logout');

});
/**
 *  Auth
 */

/**
 *  DashboardController - общее
 */
Route::controller(DashboardController::class)->group(function () {

    Route::get('/cabinet', 'page')
        ->middleware('auth.published')
        ->name('cabinet');


    /** свой профиль подробно, без редактирования */

    Route::get('/cabinet/profile', 'profile')
        ->middleware('auth.published')
        ->name('cabinet.profile');

    Route::get('/cabinet/profile/photos', 'profile_photos')
        ->middleware('auth.published')
        ->name('cabinet.profile_photos');

    Route::get('/cabinet/profile/videos', 'profile_videos')
        ->middleware('auth.published')
        ->name('cabinet.profile_videos');

    Route::get('/cabinet/profile/videos/{user_id}/video/{id}', 'profile_video')
        ->middleware('auth.published')
        ->name('cabinet.profile_video');

    Route::get('/cabinet/profile/articles', 'profile_articles')
        ->middleware('auth.published')
        ->name('cabinet.profile_articles');

    Route::get('/cabinet/profile/articles/{user_id}/article/{id}', 'profile_article')
        ->middleware('auth.published')
        ->name('cabinet.profile_article');

    /** свой профиль подробно, без редактирования */


    Route::get('/cabinet-blocked', 'blocked')
        ->middleware('auth.blocked')
        ->name('blocked');


    Route::post('/cabinet/setting.handel', 'settingHandel')
        ->middleware('auth.published')
        ->name('setting.handel');

    Route::post('/cabinet/setting-password.handel', 'settingPasswordHandel')
        ->middleware('auth.published')
        ->name('setting.password.handel');

});

Route::controller(UserPhotoAjaxController::class)->group(function () {

    /** удаление фото - кабинет user */
    Route::post('/cabinet/photo-delete', 'deletePhoto')
        ->middleware('auth.published');


});


/**
 *  //////DashboardController - общее
 */

/**
 *  UserPhotoController - фото
 */
Route::controller(UserPhotoController::class)->group(function () {

    Route::get('/cabinet/photos/{user_id}', 'page')
        ->middleware('auth.published')
        ->name('cabinet.photos');


    Route::post('/cabinet/photos/{id}/upload', 'upload')
        ->middleware('auth.published')
        ->name('cabinet.photos.upload');

});


/**
 *  UserPeopleController список дюдей (пользователи)
 */
Route::controller(UserPeopleController::class)->group(function () {

    Route::get('/cabinet/peoples', 'peoples')
        ->middleware('auth.published')
        ->name('cabinet.peoples');

});

/**
 *  UserPeoplePhotosController photos
 */
Route::controller(UserPeoplePhotosController::class)->group(function () {

    Route::get('/cabinet/peoples/people/photos/{user_id}', 'people_photos')
        ->middleware('auth.published')
        ->name('cabinet.people_photos');
});
/**
 *  UserPeopleVideosController videos
 */
Route::controller(UserPeopleVideosController::class)->group(function () {

    Route::get('/cabinet/peoples/people/videos/{user_id}', 'people_videos')
        ->middleware('auth.published')
        ->name('cabinet.people_videos');

    Route::get('/cabinet/peoples/people/videos/{user_id}/video/{id}', 'people_video')
        ->middleware('auth.published')
        ->name('cabinet.people_video');
});

/**
 *  UserPeopleArticleController article
 */
Route::controller(UserPeopleArticleController::class)->group(function () {

    Route::get('/cabinet/peoples/people/articles/{user_id}', 'people_articles')
        ->middleware('auth.published')
        ->name('cabinet.people_articles');

    Route::get('/cabinet/peoples/people/articles/{user_id}/article/{id}', 'people_article')
        ->middleware('auth.published')
        ->name('cabinet.people_article');
});


/**
 *  ///////UserPhotoController
 */

/**
 *  UserArticleController - статьи
 */
Route::controller(UserArticleController::class)->group(function () {

    Route::get('/cabinet/articles/{user_id}', 'articles')
        ->middleware('auth.published')
        ->name('cabinet.articles');

    Route::get('/cabinet/articles/{user_id}/{id}', 'article')
        ->middleware('auth.published')
        ->name('cabinet.article');

    Route::get('/cabinet/articles/{user_id}/{id}/edit', 'edit')
        ->middleware('auth.published')
        ->name('cabinet.article.edit');


    Route::post('/cabinet/create-articles', 'articleCreate')
        ->middleware('auth.published')
        ->name('cabinet.article.create');

    Route::post('/cabinet/delete-articles', 'articleDelete')
        ->middleware('auth.published')
        ->name('cabinet.article.delete');

    Route::post('/cabinet/update-articles', 'articleUpdate')
        ->middleware('auth.published')
        ->name('cabinet.article.update');


});

/**
 *  ///////UserArticleController - статьи
 */

/**
 *  UserVideoController - видео
 */
Route::controller(UserVideoController::class)->group(function () {

    Route::get('/cabinet/videos/{user_id}', 'videos')
        ->middleware('auth.published')
        ->name('cabinet.videos');

    Route::get('/cabinet/videos/{user_id}/{id}', 'video')
        ->middleware('auth.published')
        ->name('cabinet.video');

    Route::get('/cabinet/videos/{user_id}/{id}/edit', 'edit')
        ->middleware('auth.published')
        ->name('cabinet.video.edit');


    Route::post('/cabinet/create-videos', 'videoCreate')
        ->middleware('auth.published')
        ->name('cabinet.video.create');

    Route::post('/cabinet/delete-videos', 'videoDelete')
        ->middleware('auth.published')
        ->name('cabinet.video.delete');

    Route::post('/cabinet/update-videos', 'videoUpdate')
        ->middleware('auth.published')
        ->name('cabinet.video.update');


});

/**
 *  ///////UserArticleController - статьи
 */

/**
 *  livewire3
 */

//Route::post('/posts/save', Comment::class);
/*Livewire::setScriptRoute(function ($handle) {
    return Route::get('/custom/livewire/livewire.js', $handle);
});*/
/**
 *  ///////livewire3
 */

/**
 * менеджеры
 */

Route::controller(ManagerController::class)->group(function () {

    /** работа с user */
    Route::get('/m_users', 'users')
        ->name('m_users')
        ->middleware(ManagerMiddleware::class);

    Route::get('/m_users/user/{user_id}', 'user')
        ->name('m_user')
        ->middleware(ManagerMiddleware::class);

    Route::get('/m_users/user/{user_id}/photos', 'm_user_photos')
        ->name('m_user_photos')
        ->middleware(ManagerMiddleware::class);

    Route::get('/m_users/user/{user_id}/videos', 'm_user_videos')
        ->name('m_user_videos')
        ->middleware(ManagerMiddleware::class);

    Route::get('/m_users/user/{user_id}/videos/video/{id}', 'm_user_video')
        ->name('m_user_video')
        ->middleware(ManagerMiddleware::class);

    Route::get('/m_users/user/{user_id}/articles', 'm_user_articles')
        ->name('m_user_articles')
        ->middleware(ManagerMiddleware::class);

    Route::get('/m_users/user/{user_id}/articles/article/{id}', 'm_user_article')
        ->name('m_user_article')
        ->middleware(ManagerMiddleware::class);


});
    /**
     * /////менеджеры
     */

    Route::controller(InfoController::class)->group(function () {

        Route::get('/' . config('links.link.news'), 'infos')
            ->name('infos');
        Route::get('/' . config('links.link.news') . '/{slug}', 'info')
            ->name('info');
    });

    Route::controller(VideoController::class)->group(function () {

        Route::get('/' . config('links.link.video'), 'videos')
            ->name('videos');
        Route::get('/' . config('links.link.video') . '/{slug}', 'video')
            ->name('video');
    });

    /**
     * страницы
     */

    /**
     * каталог
     */


    Route::controller(AjaxController::class)->group(function () {
        /** подставка в input в поиске */
        Route::post('/search/big_autocomplete', 'bigAutocomplete');
        Route::post('/search/top_autocomplete', 'topAutocomplete');
        /** загрузка аватара*/
        Route::post('/cabinet/upload-avatar', 'uploadAvatar')->name('uploadAvatar');
        /** удаление */
        Route::post('/cabinet/object-delete', 'deleteObject')->name('deleteObject')->middleware(ManagerMiddleware::class);
        /** удаление только одного */
        Route::post('/cabinet/object-one-delete', 'deleteOneObject')->name('deleteOneObject')->middleware(ManagerMiddleware::class);
        /** публикация или блокировка */
        Route::post('/cabinet/published_user', 'publishedUser')->name('publishedUser')->middleware(ManagerMiddleware::class);

    });


    /**
     * каталог
     */


    /**
     *
     * фамилии
     */

    /**
     * категория - фамилии
     */
    Route::controller(FamilyCatalogController::class)->group(function () {

        Route::get('/family/last-names', 'familyCategory')->name('familyCategory');
        /** search */

        Route::post('/search/top-search', 'topSearch')
            ->name('form.search.top_search');

        /** //search */
    });


    /**
     * гланая фамилии - Глава фамилии - выпадает
     */
    Route::controller(FamilyObjectController::class)->group(function () {


        /**
         *  фамилии
         */
        Route::get('/family/last-names/{slug}/main', 'family')->name('family');
        /**
         * Глава фамилии
         */
        Route::get('/family/last-names/{family_slug}/main/{slug}', 'family_main')->name('family_main');

        /**
         * Новости  фамилии
         */
        Route::get('/family/last-names/{family_slug}/news', 'family_news')->name('family_news');

        Route::get('/family/last-names/{family_slug}/news/{slug}', 'family_new')->name('family_new');

        /**
         * Категороия  - Фотогалереи  фамилии
         */
        Route::get('/family/last-names/{family_slug}/galleries', 'family_galleries')->name('family_galleries');

        Route::get('/family/last-names/{family_slug}/galleries/{slug}', 'family_gallery')->name('family_gallery');

        /**
         * медиа
         */
        Route::get('/family/last-names/{family_slug}/media/{slug}', 'family_media')->name('family_media');


        /**
         * Глава Благотоворительность
         */
        Route::get('/family/last-names/{family_slug}/charity', 'family_charity')->name('family_charity');
        /**
         * Люди
         */
        Route::get('/family/last-names/{family_slug}/people', 'family_peoples')->name('family_peoples');
        Route::get('/family/last-names/{family_slug}/people/{slug}', 'family_people')->name('family_people');

        /**
         * Люди - герои (подкатегория)
         */
        Route::get('/family/last-names/{family_slug}/people/v/hero', 'family_heroes')->name('family_heroes');
        Route::get('/family/last-names/{family_slug}/people/hero/v/{slug}', 'family_hero')->name('family_hero');

        /**
         * Культурное наследие
         */
        Route::get('/family/last-names/{family_slug}/culture', 'family_cultures')->name('family_cultures');
        Route::get('/family/last-names/{family_slug}/culture/{slug}', 'family_culture')->name('family_culture');


        /**
         * Страницы в левое меню
         */
        Route::get('/family/last-names/{family_slug}/page/{slug}', 'family_page')->name('family_page');

    });


// familyObjects

    Route::controller(FamilyHeadController::class)->group(function () {

        Route::get('/head-family-name', 'head_familyname')->name('head_familyname');

    });

    /**
     * * /////////// фамилии
     */

    Route::controller(TestController::class)->group(function () {

/*        Route::get('/test', 'test')->name('test');
        Route::post('/test', 'upload')->name('test');
        Route::post('/cabinet/upload_v', 'upload_v')->name('upload_v');*/


    });

    Route::controller(CalendarEventController::class)->group(function () {

        Route::get('/calendar-events', 'calendarEvents')->name('calendarEvents');
        Route::get('/calendar-events/{slug}', 'calendarEvent')->name('calendarEvent');

    });

    /**
     * страницы
     */

    Route::controller(PageController::class)->group(function () {

        Route::get('{page:slug}', 'page')->name('page');
        Route::get('/religion/religion-list', 'religionList')->name('religion.list');

    });

/**
 * страницы
 */


