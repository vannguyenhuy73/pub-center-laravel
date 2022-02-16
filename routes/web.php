<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/register-ajax', 'Auth\RegisterController@registerAjax')->name('register-ajax');
Route::post('/add-user-ajax', 'Auth\RegisterController@createAjax')->name('add-user-ajax');
Route::post('/api/auth', 'Auth\LoginAPIController@index')->name('login.api');
Route::post('/login', 'Auth\LoginController@login');
Route::get('step-2', function() {
    return view('auth.step2');
});

Route::get('/reset-password', 'Auth\ResetController@index')->name('reset');
Route::post('/reset-password', 'Auth\ResetController@handle')->name('reset.post');
Route::get('/reset-password/confirm', 'Auth\ResetController@confirm')->name('reset.confirm');

Route::post('/new-password', 'Auth\ResetController@updateNewPassword')->name('new-password');

Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::get('/register/confirm', 'Auth\RegisterController@confirm')->name('register.confirm');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/resend-confirm', 'Auth\RegisterController@resendConfirmMail')->name('resend_confirm');
Route::post('/handle-resend-confirm', 'Auth\RegisterController@handleResendConfirmMail')->name('resend_confirm.handle');

Route::get('login/facebook', 'Auth\SocialController@FaceBookLogin')->name('facebook.login');
Route::get('login/google', 'Auth\SocialController@googleLogin')->name('google.login');
Route::get('login/facebook/callback', 'Auth\SocialController@handleFacebook')->name('facebook.handle');
Route::get('login/google/callback', 'Auth\SocialController@handleGoogle')->name('google.handle');

Route::post('/logout', 'Auth\LoginController@logout')->name('auth.logout');


Route::group(['middleware' => ['auth', 'auth.switch']], function () {
    // Route::get('dashboard', 'HomeController@index')->name('home');
    Route::get('/', 'NewpubController@index')->name('home');
	
	Route::post('/avatar-update', 'NewpubUserController@updateAvatar')->name('avatar_update');

    // Route::get('chart/click/{month}', 'HomeController@getClick')->where('month', '[0-9]{2}')->name('chart.click');
    // Route::get('chart/revenue/{month}', 'HomeController@getRevenue')->where('month', '[0-9]{2}')->name('chart.revenue');

    // Route::get('switch-site/{affiliate_id}', 'HomeController@switchSite')->where('affiliate_id', 'A[0-9]{9}')->name('switch_site');

    Route::get('newpub/switch-site/{affiliate_id}', 'NewpubController@switchSite')->where('affiliate_id', 'A[0-9]{9}')->name('newpub.switch_site');

    // Route::group(['prefix' => 'mail', 'as' => 'mail.'], function () {
    //     Route::get('/', 'MailController@index')->name('index');
    //     Route::get('/create', 'MailController@create')->name('create');
    //     Route::post('/store', 'MailController@store')->name('store');
    //     Route::get('/sent', 'MailController@sent')->name('sent');
    //     Route::get('/save', 'MailController@save')->name('save');
    //     Route::get('/view/{id}', 'MailController@show')->name('show')->where('id', '[0-9]{1,12}');
    //     Route::get('/destroy/{id}/{type}', 'MailController@destroy')->name('destroy')->where('id', '[0-9]{1,12}')->where('type', '(i|s)');
    //     Route::post('/destroy', 'MailController@destroyList')->name('destroy.list');
    //     Route::post('/save', 'MailController@saveList')->name('save.list');
    // });

    // Route::group(['prefix' => 'api', 'as' => 'api.'], function () {
    //     Route::get('coupon', 'ApiController@coupon')->name('coupon');
    //     Route::get('deeplink', 'ApiController@deeplink')->name('deeplink');
    // });

    // Route::get('postback', 'PostBackController@index')->name('postback');
    // Route::post('postback', 'PostBackController@store')->name('postback');

    // Route::post('short-link', 'OfferController@shortLink')->name('shortlink');

    // Route::resource('offer', 'OfferController');
    // Route::get('offer/page/{id}', 'OfferController@index')->name('offer.index.page')->where('id', '[0-9]{1,2}');
    // Route::get('/my-offer', 'OfferController@listApproval')->name('offer.myoffer');
    // Route::get('/my-offer/page/{id}', 'OfferController@listApproval')->name('offer.myoffer.page')->where('id', '[0-9]{1,2}');

    // Route::get('report', 'ReportController@index')->name('report');
    // Route::post('report', 'ReportController@getConversion')->name('report.ajax');

    // Route::get('report/detail', 'ReportController@detail')->name('report.detail');
    // Route::post('report/detail', 'ReportController@getDetail')->name('report.detail.ajax');
    // Route::post('report/summary', 'ReportController@getSummary')->name('report.detail.summary');

    Route::get('notice', 'NoticeController@index')->name('notice.index');
    Route::get('notice/detail/{id}', 'NoticeController@show')->name('notice.show')->where('id', '[0-9]{1,5}');

    // Route::get('event', 'EventController@index')->name('event.index');
    // Route::get('event/detail/{id}', 'EventController@show')->name('event.show')->where('id', '[0-9]{1,6}');

    // Route::get('board', 'BoardController@index')->name('board.index');
    // Route::get('board/detail/{id}', 'BoardController@show')->name('board.show')->where('id', '[0-9]{1,5}');

    //===========================================

    // Route::get('academy', 'AcademyController@index')->name('academy.index');

    Route::get('academy/admincp/academy-rank', 'AcademyController@adminRank')->name('academy.admin.rank');
    Route::get('academy/admincp/rank-edit', 'AcademyController@getRankById')->name('academy.admin.editRank');
    Route::post('academy/admincp/rank-update', 'AcademyController@updatetRank')->name('academy.admin.updateRank');
    Route::post('academy/admincp/rank-insert', 'AcademyController@insertRank')->name('academy.admin.insertRank');

    Route::get('academy/admincp/academy-online-event', 'AcademyController@adminOnlineEvent')->name('academy.admin.academy_online_event');
    Route::get('academy/admincp/online-event-edit', 'AcademyController@getOnlineEventById')->name('academy.admin.editOnlineEvent');
    Route::post('academy/admincp/online-event-update', 'AcademyController@updatetOnlineEvent')->name('academy.admin.updateOnlineEvent');
    Route::post('academy/admincp/online-event-insert', 'AcademyController@insertOnlineEvent')->name('academy.admin.insertOnlineEvent');
    Route::post('academy/admincp/online-event-delete', 'AcademyController@deleteOnlineEvent')->name('academy.admin.deleteOnlineEvent');

    Route::get('academy/admincp/academy-offline-event', 'AcademyController@adminOfflineEvent')->name('academy.admin.academyOfflineEvent');
    Route::get('academy/admincp/offline-event-edit', 'AcademyController@getOfflineEventById')->name('academy.admin.editOfflineEvent');
    Route::post('academy/admincp/offline-event-update', 'AcademyController@updateOfflineEvent')->name('academy.admin.updateOfflineEvent');
    Route::post('academy/admincp/offline-event-insert', 'AcademyController@insertOfflineEvent')->name('academy.admin.insertOfflineEvent');
    Route::post('academy/admincp/offline-event-delete', 'AcademyController@deleteOfflineEvent')->name('academy.admin.deleteOfflineEvent');

    Route::get('academy/admincp/academy-section', 'AcademyController@adminSection')->name('academy.admin.section');
    Route::get('academy/admincp/section-edit', 'AcademyController@getSectionById')->name('academy.admin.getSectionById');
    Route::post('academy/admincp/section-update', 'AcademyController@updateSection')->name('academy.admin.updateSection');
    Route::post('academy/admincp/section-insert', 'AcademyController@insertSection')->name('academy.admin.insertSection');
    Route::post('academy/admincp/section-delete', 'AcademyController@deleteSection')->name('academy.admin.deleteSection');

    Route::get('academy/admincp/academy-qa', 'AcademyController@adminQA')->name('academy.admin.qa');
    Route::get('academy/admincp/qa-edit', 'AcademyController@getqaById')->name('academy.admin.getqaById');
    Route::post('academy/admincp/qa-update', 'AcademyController@updateQA')->name('academy.admin.updateQA');
    Route::post('academy/admincp/qa-insert', 'AcademyController@insertQA')->name('academy.admin.insertQA');
    Route::post('academy/admincp/qa-delete', 'AcademyController@deleteQA')->name('academy.admin.deleteQA');

    Route::get('academy/admincp/academy-incentive', 'AcademyController@adminIncentive')->name('academy.admin.incentive');
    Route::get('academy/admincp/incentive-edit', 'AcademyController@getIncentiveById')->name('academy.admin.getIncentiveById');
    Route::post('academy/admincp/incentive-update', 'AcademyController@updateIncentive')->name('academy.admin.updateIncentive');
    Route::post('academy/admincp/incentive-insert', 'AcademyController@insertIncentive')->name('academy.admin.insertIncentive');
    Route::post('academy/admincp/incentive-delete', 'AcademyController@deleteIncentive')->name('academy.admin.deleteIncentive');

    Route::get('academy/admincp/academy-right', 'AcademyController@adminRight')->name('academy.admin.right');
    Route::post('academy/admincp/right-change-value', 'AcademyController@updateRightValue')->name('academy.admin.updateRightValue');

    Route::get('academy/admincp', 'AcademyController@adminDashboard')->name('academy.admin');

    Route::get('academy/admincp/academy-bonus', 'AcademyController@adminBonus')->name('academy.admin.bonus');
    Route::get('academy/admincp/bonus-edit', 'AcademyController@getBonusById')->name('academy.admin.getBonusById');
    Route::post('academy/admincp/bonus-update', 'AcademyController@updateBonus')->name('academy.admin.updateBonus');
    Route::post('academy/admincp/bonus-insert', 'AcademyController@insertBonus')->name('academy.admin.insertBonus');
    Route::post('academy/admincp/bonus-delete', 'AcademyController@deleteBonus')->name('academy.admin.deleteBonus');

    //===========================================

    // Route::get('discount', 'DiscountController@index')->name('discount.index');
    // Route::get('discount/download', 'DiscountController@download')->name('discount.download');

    Route::get('subscribe/{merchantID}', 'SubscriptController@subscribe')->name('subscript')->where('merchantID', '[0-9a-z-_]+');

    // Route::get('user', 'UserController@index')->name('user.index');
    // Route::post('user/update', 'UserController@update')->name('user.update');
    // Route::post('user/update-identity', 'UserController@updateIdentity')->name('user.updateidentity');
    // Route::post('site-info', 'UserController@getSite')->name('user.siteinfo');
    // Route::post('site-update', 'UserController@updateSite')->name('user.siteupdate');
    // Route::post('site-add', 'UserController@addSite')->name('user.siteadd');
    // Route::post('site-delete', 'UserController@deleteSite')->name('user.sitedelete');
    // Route::post('change-password', 'UserController@changePassword')->name('user.change_password');
    // Route::post('user/checkpoint', 'UserController@checkInfo')->name('user.checkpoint');
    // Route::get('user', 'UserController@index')->name('user.index');

    // Route::group(['middleware' => 'referral', 'as' => 'referral.', 'prefix' => 'referral'], function () {
    //     Route::get('/','ReferralController@index')->name('index');
    //     Route::get('/getlink','ReferralController@getLink')->name('getlink');
    //     Route::get('/report','ReferralController@report')->name('report');
    //     Route::post('/report/summary','ReferralController@getSummary')->name('report.summary');
    //     Route::post('/report/account','ReferralController@getAccount')->name('report.getaccount');
    //     Route::post('/report/byday','ReferralController@getConversionSum')->name('report.byday');
    //     Route::get('/report/detail','ReferralController@reportDetail')->name('report.detail');
    //     Route::post('/report/detail','ReferralController@handleReportDetail')->name('report.detail.handle');
    // });

    // Route::group(['prefix' => 'tool', 'as' => 'tool.'], function () {
    //     Route::get('/adpia-deeplink', 'ToolController@deepLink')->name('deeplink');
    //     Route::get('/roll-banner','RollingBannerController@createBanner')->name('roll-banner');
    //     Route::get('/size-banner','RollingBannerController@getSize')->name('size-banner');
    //     Route::get('/get-banner','RollingBannerController@getBanner')->name('get-banner');
    //     Route::get('/smart-carousel','RollingBannerController@createCarousel')->name('smart-carousel');
    //     Route::get('/get-carousel','RollingBannerController@getCarousel')->name('get-carousel');
    // });

    Route::get('billing', 'BillingController@index')->name('billing.history');
    // Route::get('billing/request', 'BillingController@request')->name('billing.request');
    // Route::post('billing/request', 'BillingController@handleRequest')->name('billing.request.handle');

    // Route::get('get-mail', 'MailController@getMailAJax')->name('mail-ajax');

    // Route::get('notice-list','NoticeController@getNoticeAjax')->name('notice-ajax');

    Route::post('api-video', 'VideoController@getIframeApi')->name('api-video');

    Route::get('huong-dan','GuideController@index')->name('huong-dan');
    Route::get('huong-dan/{id}','GuideController@getContentApi')->name('huong-dan-ajax');

    // Route::get('banner-product','RollingBannerController@bannerProduct')->name('banner-product');
    Route::get('minishop','MinishopController@index')->name('register-minishop');
    Route::post('minishop','MinishopController@addInfor')->name('add-minishop');

    // Route::get('list-link','HistoryLinkController@getLinkByAuth')->name('link-history');
    // Route::post('insert-link','HistoryLinkController@insertLinkAjax')->name('insert-link-ajax');

    Route::get('event-banner', 'EventBannerController@index')->name('banner-event');

    Route::post('render-code-mail', 'ActiveMailContactController@genderCode');
    Route::post('check-code-active', 'ActiveMailContactController@checkCode');
    Route::get('re-sent-code', 'ActiveMailContactController@reSentCode');
    Route::get('changer-email', 'ActiveMailContactController@changeContactMail');
    Route::get('ranking', 'RankingController@index');
    Route::get('demo-cache','DemoCacheController@index');

    //=================================================================================================

    Route::get('newpub','NewpubController@index')->name('newpub.home');
    Route::resource('newpub/offer_list','NewpubOfferController');
    Route::get('newpub/offer_list/page/{id}', 'NewpubOfferController@index')->name('newpub.offer.paging')->where('id', '[0-9]{1,2}');
    Route::get('newpub/offer_list/ajax/ajax-banner','NewpubOfferController@getBannerWithSize')->name('newpub.offer.ajax.banner');

    Route::group(['prefix' => 'newpub/mail', 'as' => 'newpub.mail.'], function () {
        Route::get('/', 'NewpubMailController@index')->name('index');
        Route::get('/create', 'NewpubMailController@create')->name('create');
        Route::post('/store', 'NewpubMailController@store')->name('store');
        Route::get('/sent', 'NewpubMailController@sent')->name('sent');
        Route::get('/save', 'NewpubMailController@save')->name('save');
        Route::get('/view/{id}', 'NewpubMailController@show')->name('show')->where('id', '[0-9]{1,12}');
        Route::get('/destroy/{id}/{type}', 'NewpubMailController@destroy')->name('destroy')->where('id', '[0-9]{1,12}')->where('type', '(i|s)');
        Route::post('/destroy', 'NewpubMailController@destroyList')->name('destroy.list');
        Route::post('/save', 'NewpubMailController@saveList')->name('save.list');
    });

    Route::get('newpub/get-mail', 'NewpubMailController@getMailAJax')->name('newpub.mail-ajax');
    Route::get('newpub/notice-list','NewpubNoticeController@getNoticeAjax')->name('newpub.notice-ajax');

    Route::get('newpub/list-link','NewpubHistoryLinkController@getLinkByAuth')->name('newpub.link-history');
    Route::post('newpub/insert-link','NewpubHistoryLinkController@insertLinkAjax')->name('newpub.insert-link-ajax');
    Route::get('newpub/multipart-link','NewpubHistoryLinkController@getMultiparLink')->name('newpub.multipart-link');
    Route::post('newpub/insert-multipart-link','NewpubHistoryLinkController@insertMultiLink')->name('newpub.insert-multipart-link');

    Route::get('newpub/academy', 'NewpubAcademyController@index')->name('newpub.academy.index');

    Route::group(['prefix' => 'newpub/api', 'as' => 'api.'], function () {
        Route::get('coupon', 'NewpubApiController@coupon')->name('newpub.coupon');
        Route::get('deeplink', 'NewpubApiController@deeplink')->name('newpub.deeplink');
    });

    Route::get('newpub/billing/request', 'NewpubBillingController@request')->name('newpub.billing.request');
    Route::post('newpub/billing/request', 'NewpubBillingController@handleRequest')->name('newpub.billing.request.handle');
	Route::get('newpub/billing/report-net-by-page', 'NewpubBillingController@getReportNetByPage')->name('newpub.billing.report_net_by_page');

    Route::get('newpub/board', 'NewpubBoardController@index')->name('newpub.board.index');
    Route::get('newpub/board/detail/{id}', 'NewpubBoardController@show')->name('newpub.board.show')->where('id', '[0-9]{1,5}');

    Route::get('newpub/discount', 'NewpubDiscountController@index')->name('newpub.discount.index');
    Route::get('newpub/discount/download', 'NewpubDiscountController@download')->name('newpub.discount.download');
    Route::get('newpub/get-discount-codes-shopee-origin', 'NewpubDiscountController@getDiscountCodesShopeeOrigin')->name('newpub.discount.discount_codes_shopee_origin');
    Route::get('newpub/get-discount-codes-multi-origin', 'NewpubDiscountController@getDiscountCodesMultiOrigin')->name('newpub.discount.discount_codes_multi_origin');
	Route::get('newpub/get-discount-codes-from-redis', 'NewpubDiscountController@getPromoCodeFromRedis')->name('newpub.discount.discount_codes_from_redis');
	Route::post('newpub/set-discount-codes-to-redis', 'NewpubDiscountController@setPromoCodeToRedis')->name('newpub.discount.discount_codes_to_redis');
	Route::get('newpub/remove-discount-codes-from-redis', 'NewpubDiscountController@removePromoCodeFromRedis')->name('newpub.discount.remove_discount_codes_from_redis');
    Route::post('newpub/export-xml', 'NewpubDiscountController@exportXML')->name('newpub.discount.export_xml');

    Route::get('newpub/event', 'NewpubEventController@index')->name('newpub.event.index');
    Route::get('newpub/event/detail/{id}', 'NewpubEventController@show')->name('newpub.event.show')->where('id', '[0-9]{1,6}');

    Route::get('newpub/postback', 'NewpubPostBackController@index')->name('newpub.postback');
    Route::post('newpub/postback', 'NewpubPostBackController@store')->name('newpub.postback');

    Route::get('newpub/report', 'NewpubReportController@index')->name('newpub.report');
    Route::post('newpub/report', 'NewpubReportController@getConversion')->name('newpub.report.ajax');

    Route::get('newpub/report/detail', 'NewpubReportController@detail')->name('newpub.report.detail');
    Route::post('newpub/report/detail', 'NewpubReportController@getDetail')->name('newpub.report.detail.ajax');
    Route::post('newpub/report/summary', 'NewpubReportController@getSummary')->name('newpub.report.detail.summary');
    Route::post('newpub/report/bonus', 'NewpubReportController@getPubBonus')->name('newpub.report.detail.bonus');

    Route::group(['prefix' => 'newpub/tool', 'as' => 'newpub.tool.'], function () {
        Route::get('/adpia-deeplink', 'NewpubToolController@deepLink')->name('deeplink');
        Route::get('/roll-banner','NewpubRollingBannerController@createBanner')->name('roll-banner');
        Route::get('/size-banner','NewpubRollingBannerController@getSize')->name('size-banner');
        Route::get('/get-banner','NewpubRollingBannerController@getBanner')->name('get-banner');
        Route::get('/smart-carousel','NewpubRollingBannerController@createCarousel')->name('smart-carousel');
        Route::get('/get-carousel','NewpubRollingBannerController@getCarousel')->name('get-carousel');
		Route::get('/smart-url','NewpubToolController@smartUrl')->name('smart-url');
		Route::get('/promo-code','NewpubToolController@promoCode')->name('promo-code');
        Route::get('/generate-multipart-link','NewpubToolController@generateMultipartLink')->name('generate-multipart-link');
    });

    Route::post('newpub/short-link', 'NewpubOfferController@shortLink')->name('newpub.shortlink');

    Route::post('newpub/chart/click', 'NewpubController@getClick')->name('newpub.chart.click');
    Route::post('newpub/chart/revenue', 'NewpubController@getRevenue')->name('newpub.chart.revenue');

    Route::get('newpub/user', 'NewpubUserController@index')->name('newpub.user.index');
    Route::post('newpub/user/update', 'NewpubUserController@update')->name('newpub.user.update');
    Route::post('newpub/user/update-identity', 'NewpubUserController@updateIdentity')->name('newpub.user.updateidentity');
    Route::post('newpub/site-info', 'NewpubUserController@getSite')->name('newpub.user.siteinfo');
    Route::post('newpub/site-update', 'NewpubUserController@updateSite')->name('newpub.user.siteupdate');
    Route::post('newpub/site-add', 'NewpubUserController@addSite')->name('newpub.user.siteadd');
    Route::post('newpub/site-delete', 'NewpubUserController@deleteSite')->name('newpub.user.sitedelete');
    Route::post('newpub/change-password', 'NewpubUserController@changePassword')->name('newpub.user.change_password');
    Route::post('newpub/user/checkpoint', 'NewpubUserController@checkInfo')->name('newpub.user.checkpoint');
    Route::get('newpub/user', 'NewpubUserController@index')->name('newpub.user.index');

    Route::get('newpub/minishop', 'NewpubMinishopController@index')->name('newpub.minishop.index');
    Route::get('newpub/minishop/preview', 'NewpubMinishopController@preview')->name('newpub.minishop.preview');
    Route::post('newpub/minishop/register-shop', 'NewpubMinishopController@registerShop')->name('newpub.minishop.register_shop');
    Route::post('newpub/minishop/register-code', 'NewpubMinishopController@registerCode')->name('newpub.minishop.register_code');
    Route::post('newpub/minishop/check-shop-name', 'NewpubMinishopController@checkShopNameIsset')->name('newpub.minishop.check_shop_name');
    Route::post('newpub/minishop/clear-session-shop-name', 'NewpubMinishopController@clearShopNameSession')->name('newpub.minishop.clear_session_shop_name');
    Route::get('newpub/minishop/check-apr-merchant', 'NewpubMinishopController@checkAprMerchant')->name('newpub.minishop.check_apr_merchant');
    Route::get('newpub/minishop/get-user-custom-products', 'NewpubMinishopController@getUserCustomProducts')->name('newpub.minishop.get_user_custom_products');
    Route::post('newpub/minishop/remove-user-custom-products', 'NewpubMinishopController@removeUserCustomProducts')->name('newpub.minishop.remove_user_custom_products');
    Route::post('newpub/minishop/change-status-user-custom-products', 'NewpubMinishopController@changeStatusUserCustomProducts')->name('newpub.minishop.change_status_user_custom_products');
    Route::post('newpub/minishop/set-user-custom-products', 'NewpubMinishopController@setUserCustomProducts')->name('newpub.minishop.set_user_custom_products');
    Route::post('newpub/minishop/update-user-custom-products', 'NewpubMinishopController@updateUserCustomProducts')->name('newpub.minishop.update_user_custom_products');
    Route::post('newpub/minishop/check-merchant-approve-by-url', 'NewpubMinishopController@checkMerchantApproveByUrl')->name('newpub.minishop.check_merchant_approve_by_url');
});

Route::get('/get-video', 'VideoController@renderIframeYoutube')->name('video');
// Route::get('/get-product-random/{id}/{cate}', 'BannerProductController@getProductRandom')->name('product');
Route::get('thu-nhap-khung-khong-can-dau-tu-von'.'.html', 'LandingRegisterController@index');
Route::get('thu-nhap-thu-dong-khong-rui-ro'.'.html', 'LandingRegisterController@landingSecond');
Route::get('xu-huong-kiem-tien-2020'.'.html', 'LandingRegisterController@landingThird');
Route::get('check-readmail','CronlogController@index');