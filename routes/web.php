<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

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



Route::match(['get','post'],"AdminController\AdminController@test");
Route::get("/","Front\FrontController@index");
//Admin login
Route::get('/admin/login', function () {
    if(Session::has("admin_login")){
        return redirect("/admin/index");
    }
    else{
        return view('admin.login');
    }
});
Route::match(['get','post'],"/admin/profile-data","AdminController\AdminController@create");

Route::match(['get','post'],"/admin/login-data","AdminController\AdminController@login_data");

Route::match(['get','post'],"/admin/logout","AdminController\AdminController@logout");


//end amdin login

Route::group(['middleware'=>"admin"],function(){
    //admin profile //
    Route::get("/admin/settings","AdminController\AdminController@settings");
    Route::post("admin/edit_admin_email/{id}","AdminController\AdminController@edit_admin_email");
    Route::post("/admin/edit_admin_profile/{id}","AdminController\AdminController@edit_admin_profile");
    Route::post("/admin/change_admin_password/{id}","AdminController\AdminController@hange_admin_password");

    //end admin profile//


  //customer
    Route::get("/admin/user-list","AdminController\AdminController@user_list");
    Route::get("/admin/user/delete/{id}","AdminController\AdminController@user_delete");
    //end customer
    //user list
    Route::get("/admin/all-user","AdminController\AdminController@user_list");
    Route::get("/admin/user-update-status/{id}","AdminController\AdminController@user_status");
    //end user list

    //customer query
    Route::get("/admin/customer-query","AdminController\AdminController@customer_query");
    Route::get("/admin/customer-query-delete/{id}","AdminController\AdminController@delete_customer_query");
      Route::get("/admin/user/plan/{id}","AdminController\\AdminController@userPlan");
    //end customer query
    //admin profile
     Route::match(['get','post'],"/admin/profile","AdminController\AdminController@profile");
    //end admin profiles
    Route::get("/admin/index","AdminController\AdminController@index");
    //banner page routing start
Route::get("/admin/banner","AdminController\BannerController@index");
Route::match(['get','post'],"/admin/banner-create","AdminController\BannerController@create_banner");
Route::match(['get','post'],"/admin/banner-delete","AdminController\BannerController@delete");
Route::match(['get','post'],"/admin/banner-status","AdminController\BannerController@status_change");
Route::match(['get','post'],"/admin/banner-update","AdminController\BannerController@banner_change");
Route::match(['get','post'],"/admin/banner-order-change","AdminController\BannerController@order_change");

//end coding of banner page routing

//about us page routing start
Route::get("/admin/about","AdminController\AboutUsController@index");
Route::match(['get','post'],"/admin/about-data","AdminController\AboutUsController@create_about");
Route::get("/admin/about-us-show","AdminController\AboutUsController@view_about");
Route::get("/admin/about-edit","AdminController\AboutUsController@update");
Route::match(['get','post'],"/admin/about-update-data","AdminController\AboutUsController@update_data");
Route::get("/admin/about-delete/{id}","AdminController\AboutUsController@delete");
//end coding of about oage


//contact page routing start
Route::get("/admin/contact","AdminController\ContactUsController@index");
Route::match(['get','post'],"/admin/contact-data","AdminController\ContactUsController@create_contact");
Route::get("/admin/view-contact-us","AdminController\ContactUsController@viewContact");
Route::get("/admin/contact-us-edit","AdminController\ContactUsController@update");
Route::match(['get','post'],"//admin/update-contact-data","AdminController\ContactUsController@update_data");
Route::get("/admin/contact-us-delete/{id}","AdminController\ContactUsController@delete");
//end coding of contact page routing

//policy page routing start
Route::get("/admin/cookie-policy","AdminController\CookiePolicyController@index");
Route::match(['get','post'],"/admin/cookie-policy-data","AdminController\CookiePolicyController@create_cookie_policy");
Route::get("/admin/view-cookie-policy","AdminController\CookiePolicyController@view");
Route::get("/admin/cookie-policy-edit","AdminController\CookiePolicyController@update");
Route::match(['get','post'],"/admin/cookie-policy-update-data","AdminController\CookiePolicyController@update_data");
Route::get("/admin/cookie-policy-delete/{id}","AdminController\CookiePolicyController@delete");
//end coding of policy page

//copyright page routing start
Route::get("/admin/copy-right","AdminController\CopyRightController@index");
Route::match(['get','post'],"/admin/copyright-data","AdminController\CopyRightController@create_copyright");
Route::get("/admin/view-copy-right","AdminController\CopyRightController@view");
Route::get("/admin/copy-right-edit","AdminController\CopyRightController@update");
Route::match(['get','post'],"/admin/copyright-update-data","AdminController\CopyRightController@update_data");
Route::get("/admin/copyright-policy-delete/{id}","AdminController\CopyRightController@delete");
//end coding of copyright page routing

//FAQ page routing start
Route::get("/admin/faq","AdminController\FAQController@index");
Route::match(['get','post'],"/admin/faq-data","AdminController\FAQController@create_faq");
Route::get("/admin/faq-show","AdminController\FAQController@view");
Route::get("/admin/faq-edit","AdminController\FAQController@update");
Route::match(['get','post'],"/admin/faq-update-data","AdminController\FAQController@update_data");
Route::get("/admin/faq-delete/{id}","AdminController\FAQController@delete");
//end coding of FAQ page routing

//Term page routing start
Route::get("/admin/terms","AdminController\TermController@index");
Route::match(['get','post'],"/admin/term-data","AdminController\TermController@create_term");
Route::get("/admin/view-terms","AdminController\TermController@view");
Route::get("/admin/terms-edit","AdminController\TermController@update");
Route::match(['get','post'],"/admin/term-update-data","AdminController\TermController@update_data");
Route::get("/admin/terms-delete/{id}","AdminController\TermController@delete");
//end coding of Term page routing

//Privacy Policy page routing coding start
Route::get("/admin/policy","AdminController\PrivacyController@index");
Route::match(['get','post'],"/admin/privacy-data","AdminController\PrivacyController@create");
Route::get("/admin/privacy-policy-edit","AdminController\PrivacyController@update");
Route::get("/admin/view-policy","AdminController\PrivacyController@view");
Route::match(['get','post'],"/admin/privacy-update-data","AdminController\PrivacyController@update_data");
Route::get("/admin/privacy-policy-delete/{id}","AdminController\PrivacyController@delete");

//end coding of privacy page routing

//language page routing
Route::get("/admin/language","AdminController\LanguageController@index");
Route::match(['get','post'],"/admin/create-lang","AdminController\LanguageController@create");
Route::match(['get','post'],"/admin/update-lang","AdminController\LanguageController@update");
Route::match(['get','post'],"/admin/update-status","AdminController\LanguageController@update_status");
Route::match(['get','post'],"/admin/delete-lang/{id}","AdminController\LanguageController@delete");




//end language page routing

//currency page routing
Route::get("/admin/currency","AdminController\CurrencyController@index");
Route::match(['get','post'],"/admin/add-currency","AdminController\CurrencyController@create");
Route::match(['get','post'],"/admin/currency-update","AdminController\CurrencyController@update");
Route::match(['get','post'],"/admin/currency-status-update/update-status/{id}","AdminController\CurrencyController@update_status");
Route::match(['get','post'],"/admin/delete-currency","AdminController\CurrencyController@delete");




//end currency page routing



//Activity page routing start
Route::get("/admin/add-activity","AdminController\ActivityController@index");
Route::match(['get','post'],"/admin/activity-data","AdminController\ActivityController@create_activity");
Route::get("/admin/view-activity","AdminController\ActivityController@activity_list");
Route::get("/admin/activity-edit/{id}","AdminController\ActivityController@update_activity");
Route::match(['get','post'],"/admin/activity-update-data","AdminController\ActivityController@update_activity_data");
Route::match(['get','post'],"/admin/delete-activity","AdminController\ActivityController@update_activity_data");
Route::get("/admin/add-gallery-photo","AdminController\ActivityController@gallery");
Route::match(['get','post'],"/admin/activity-gallery-data","AdminController\ActivityController@gallery_data");

Route::match(['get','post'],"/admin/get-city-for-activity","AdminController\ActivityController@fetch_city");

Route::get("/admin/view-gallery-photo","AdminController\ActivityController@view_gallery");
Route::match(['get','post'],"/admin/show-activity-gallery","AdminController\ActivityController@show_gallery_list");
Route::match(['get','post'],"/admin/update-activity-gallery-status","AdminController\ActivityController@change_activity_gallery_status");
Route::match(['get','post'],"/admin/delete-activity-gallery","AdminController\ActivityController@delete_activity_gallery");
Route::get("/admin/edit-activity-gallery/{id}","AdminController\ActivityController@edit_activity_gallery");
Route::match(['get','post'],"/admin/activity-gallery-update-data","AdminController\ActivityController@updated_activity_gallery_data");

//end coding of Activity page routing

//thing to do page routing
Route::get("/admin/thing-to-do","AdminController\ThingToDoController@index");
Route::match(['get','post'],"/admin/thing-to-do-data","AdminController\ThingToDoController@create");
Route::get("/admin/view-thing-to-do","AdminController\ThingToDoController@view");
Route::get("/admin/thing-to-do/delete/{id}","AdminController\ThingToDoController@delete");
Route::get("/admin/thing-to-do/status/{id}","AdminController\ThingToDoController@status");
Route::get("/admin/thing-to-do/edit/{id}","AdminController\ThingToDoController@edit_thing");
Route::match(['get','post'],"/admin/thing-to-do-update-data","AdminController\ThingToDoController@edit_data");
Route::get("/admin/thing-to-do/view/{id}","AdminController\ThingToDoController@details");
//fetch city
Route::match(['get','post'],"/admin/fetch_city","AdminController\ThingToDoController@fetch_city");
//end fetch city
//region or city
Route::get("/admin/view-region","AdminController\ThingToDoController@region");
Route::get("/admin/view-region-city","AdminController\ThingToDoController@viewcity");
Route::match(['get','post'],"/admin/view-city-list","AdminController\ThingToDoController@city_list");
//end region or city

//gallery 

Route::get("/admin/add-thing-to-do-gallery","AdminController\ThingToDoController@gallery");
Route::match(['get','post'],"/admin/thing-to-do-gallery-data","AdminController\ThingToDoController@gallery_data");

Route::get("/admin/thing-gallery-photo","AdminController\ThingToDoController@view_gallery");
Route::match(['get','post'],"/admin/show-thing-gallery","AdminController\ThingToDoController@show_gallery_list");
Route::match(['get','post'],"/admin/update-thing-gallery-status","AdminController\ThingToDoController@change_activity_gallery_status");
Route::match(['get','post'],"/admin/delete-thing-gallery","AdminController\ThingToDoController@delete_thing_gallery");
Route::get("/admin/edit-thing-gallery/{id}","AdminController\ThingToDoController@edit_thing_gallery");
Route::match(['get','post'],"/admin/thing-gallery-update-data","AdminController\ThingToDoController@updated_thing_gallery_data");
Route::match(['get','post'],"/admin/thing-to-do/get-sub-category/{id}","AdminController\ThingToDoController@getSubCategory");

//end thing to do page routing



//why triplooky use page routing
Route::get("/admin/why-triplooky","AdminController\WhyUseTriplookyController@index");
Route::match(['get','post'],"/admin/triplooky-data","AdminController\WhyUseTriplookyController@create");
Route::get("/admin/view-triplooy-use","AdminController\WhyUseTriplookyController@view");
Route::get("/admin/why-triplooky/delete/{id}","AdminController\WhyUseTriplookyController@delete");
Route::get("/admin/why-triplooky/status/{id}","AdminController\WhyUseTriplookyController@status");
Route::get("/admin/why-triplooky/edit/{id}","AdminController\WhyUseTriplookyController@edit");
Route::match(['get','post'],"/admin/why-triplooky-update-data","AdminController\WhyUseTriplookyController@edit_data");
Route::get("/admin/why-triplooky/view/{id}","AdminController\WhyUseTriplookyController@details");

//end why triplooky use page routing



//how to video page routing
Route::get("/admin/add-video","AdminController\HowToVideoController@index");
Route::match(['get','post'],"/admin/add-video-data","AdminController\HowToVideoController@create");
Route::get("/admin/view-video","AdminController\HowToVideoController@view");
Route::get("/admin/video/edit/{id}","AdminController\HowToVideoController@edit");
Route::post("/admin/update-video-link","AdminController\HowToVideoController@edit_data");
Route::get("/admin/video/delete/{id}","AdminController\HowToVideoController@delete");
Route::get("/admin/video/view/{id}","AdminController\HowToVideoController@details");
Route::get("/admin/video/status/{id}","AdminController\HowToVideoController@update_status");

//how to video page routing

//travel looking partner
Route::get("/admin/add-travel-looking-partner","AdminController\TravelLookingPartnerController@index");
Route::match(['get','post'],"/admin/add-trave-looking-partner-data","AdminController\TravelLookingPartnerController@create");
Route::get("/admin/view-travel-looking-partner","AdminController\TravelLookingPartnerController@view");
Route::match(['get','post'],"/admin/trave-looking-partner-status","AdminController\TravelLookingPartnerController@edit_status");
Route::match(['get','post'],"/admin/delete-travel-looking-parter","AdminController\TravelLookingPartnerController@delete");
Route::get("/admin/edit-travel-looking-partner/{id}","AdminController\TravelLookingPartnerController@edit");
Route::match(['get','post'],"/admin/update-travel-looking-partner-data","AdminController\TravelLookingPartnerController@update");
Route::match(['get','post'],"/admin/details-travel-looking-partner/{id}","AdminController\TravelLookingPartnerController@details");

//end travel looking partner



//city routing
Route::get("/admin/add-city","AdminController\CityController@index");
Route::match(['get','post'],"/admin/add-city-data","AdminController\CityController@create");
Route::get("/admin/view-city","AdminController\CityController@view_city");
Route::match(['get','post'],"/admin/update-city-status","AdminController\CityController@status");
Route::match(['get','post'],"/admin/city/delete-city/{id}","AdminController\CityController@delete");
Route::get("/admin/city/edit-city/{id}","AdminController\CityController@edit");
Route::match(['get','post'],"/admin/city/update-city-data","AdminController\CityController@edit_data");
Route::match(['get','post'],"/admin/city/update-city-order","AdminController\\CityController@updateOrder");

//add more image
Route::get("/admin/city/city-image/{id}","AdminController\\CityController@showMultiImage");
Route::get("/admin/city/city-image/status-change/{id}","AdminController\\CityController@cityImageStatusChange");
Route::get("/admin/city/city-image/delete/{id}","AdminController\\CityController@cityImageDelete");
Route::get("/admin/city/edit-city-image/{id}","AdminController\\CityController@edit_image");
Route::post("/admin/city/edit-city-image-data","AdminController\\CityController@editCityImageData");
Route::get("/admin/city/add-city-image/{id}","AdminController\\CityController@addMoreImage");
Route::post("/admin/city/add-city-image-data","AdminController\\CityController@addMoreImageData");
//end more image
//end city routing



//region routing
Route::get("/admin/add-region","AdminController\RegionController@index");
Route::match(['get','post'],"/admin/add-region-data","AdminController\RegionController@create");
Route::get("/admin/view-city","AdminController\CityController@view_city");
Route::match(['get','post'],"/admin/update-city-status","AdminController\CityController@status");
Route::match(['get','post'],"/admin/delete-city","AdminController\CityController@delete");
Route::get("/admin/edit-city/{id}","AdminController\CityController@edit");
Route::match(['get','post'],"/admin/update-city-data","AdminController\CityController@edit_data");

//end city routing

//category routing
Route::get("/admin/add-catgory","AdminController\CategoryController@index");
Route::match(['get','post'],"/admin/add-category-data","AdminController\CategoryController@create");
Route::get("/admin/view-category","AdminController\CategoryController@view_category");
Route::match(['get','post'],"/admin/update-category-status","AdminController\CategoryController@status");
Route::get("/admin/edit-category/{id}","AdminController\CategoryController@edit");
Route::match(['get','post'],"/admin/delete-city","AdminController\CategoryController@delete");
Route::get("/admin/edit-city/{id}","AdminController\CategoryController@edit");
Route::match(['get','post'],"/admin/update-category-data","AdminController\CategoryController@edit_data");
Route::match(['get','post'],"/admin/delete-category","AdminController\CategoryController@delete");

//category page 
//end category page


// ************** SUB CATEGORY PAGE ROUTING START ********************//
Route::get("/admin/add-sub-categeory","AdminController\SubCategoryController@index");
Route::match(['get','post'],"/admin/add-sub-categeory-data","AdminController\SubCategoryController@store");

Route::get("/admin/view-sub-category","AdminController\SubCategoryController@show");
Route::get("/admin-sub-category-status-change/{id}","AdminController\SubCategoryController@status_change");
Route::get("/admin/edit-sub-category/{id}","AdminController\SubCategoryController@edit");

Route::match(['get','post'],"/admin/update-sub-categeory-data","AdminController\SubCategoryController@edit_data");
Route::get("/admin/delete-sub-category/{id}","AdminController\SubCategoryController@delete");


// ************** END SUB CATEGORY PAGE ROUTING END ******************//


// ************** PLACE PAGE ROUTING START ********************//
Route::get("/admin/add-place","AdminController\PlaceController@index");
Route::get("/admin/place/get-city/{region_id}","AdminController\PlaceController@getCity");
Route::match(['get','post'],"/admin/add-place-data","AdminController\PlaceController@store");

Route::get("/admin/view-place-list","AdminController\PlaceController@show");
Route::get("/admin-place-status-change/{id}","AdminController\PlaceController@status_change");
Route::get("/admin/edit-place/{id}","AdminController\PlaceController@edit");

Route::match(['get','post'],"/admin/update-place-data","AdminController\PlaceController@edit_data");
Route::get("/admin/delete-place/{id}","AdminController\PlaceController@delete");
Route::get("/admin/view-place-details/{id}","AdminController\PlaceController@details");


// ************** END PLACE PAGE ROUTING END ******************//



//------------------- CMS OF ACCOMODATION -----------------------------------//
Route::get("/admin/cms/accomodation/add","AdminController\\CMS\\CMSAccomodationController@index");
Route::post("/admin/cms/accomodation/add-data","AdminController\\CMS\\CMSAccomodationController@create");
Route::get("/admin/cms/accomodation/list","AdminController\\CMS\\CMSAccomodationController@show");
Route::get("/admin/cms/accomodation/status-change/{id}","AdminController\\CMS\\CMSAccomodationController@status_change");
Route::get("/admin/cms/accomodation/edit/{id}","AdminController\\CMS\\CMSAccomodationController@edit");
Route::post("/admin/cms/accomodation/edit-data","AdminController\\CMS\\CMSAccomodationController@edit_data");
Route::get("/admin/cms/accomodation/delete/{id}","AdminController\\CMS\\CMSAccomodationController@delete");
//-------------------- END CMS OF ACCOMODATION ------------------------------//


//------------------- CMS OF TRANSPORTATION -----------------------------------//
Route::get("/admin/cms/transportation/add","AdminController\\CMS\\CMSTransportationController@index");
Route::post("/admin/cms/transportation/add-data","AdminController\\CMS\\CMSTransportationController@create");
Route::get("/admin/cms/transportation/list","AdminController\\CMS\\CMSTransportationController@show");
Route::get("/admin/cms/transportation/status-change/{id}","AdminController\\CMS\\CMSTransportationController@status_change");
Route::get("/admin/cms/transportation/edit/{id}","AdminController\\CMS\\CMSTransportationController@edit");
Route::post("/admin/cms/transportation/edit-data","AdminController\\CMS\\CMSTransportationController@edit_data");
Route::get("/admin/cms/transportation/delete/{id}","AdminController\\CMS\\CMSTransportationController@delete");
//-------------------- END CMS OF ACCOMODATION ------------------------------//


//------------------- CMS OF FOOD AND DRINK -----------------------------------//
Route::get("/admin/cms/food-and-drink/add","AdminController\\CMS\\CMSFoodAndDrinkController@index");
Route::post("/admin/cms/food-and-drink/add-data","AdminController\\CMS\\CMSFoodAndDrinkController@create");
Route::get("/admin/cms/food-and-drink/list","AdminController\\CMS\\CMSFoodAndDrinkController@show");
Route::get("/admin/cms/food-and-drink/status-change/{id}","AdminController\\CMS\\CMSFoodAndDrinkController@status_change");
Route::get("/admin/cms/food-and-drink/edit/{id}","AdminController\\CMS\\CMSFoodAndDrinkController@edit");
Route::post("/admin/cms/food-and-drink/edit-data","AdminController\\CMS\\CMSFoodAndDrinkController@edit_data");
Route::get("/admin/cms/food-and-drink/delete/{id}","AdminController\\CMS\\CMSFoodAndDrinkController@delete");
//-------------------- END CMS OF ACCOMODATION ------------------------------//


//------------------- CMS OF TOUR AND ACTIVITY -----------------------------------//
Route::get("/admin/cms/tour-and-activity/add","AdminController\\CMS\\CMSTourAndActivityController@index");
Route::post("/admin/cms/tour-and-activity/add-data","AdminController\\CMS\\CMSTourAndActivityController@create");
Route::get("/admin/cms/tour-and-activity/list","AdminController\\CMS\\CMSTourAndActivityController@show");
Route::get("/admin/cms/tour-and-activity/status-change/{id}","AdminController\\CMS\\CMSTourAndActivityController@status_change");
Route::get("/admin/cms/tour-and-activity/edit/{id}","AdminController\\CMS\\CMSTourAndActivityController@edit");
Route::post("/admin/cms/tour-and-activity/edit-data","AdminController\\CMS\\CMSTourAndActivityController@edit_data");
Route::get("/admin/cms/tour-and-activity/delete/{id}","AdminController\\CMS\\CMSTourAndActivityController@delete");
//-------------------- END CMS OF ACCOMODATION ------------------------------//






// map page routing 
Route::get("/admin/add-map","AdminController\MapController@index");
Route::match(['get','post'],"/admin/add-map-data","AdminController\MapController@create");
Route::get("/admin/view-map","AdminController\MapController@view_map");
Route::get("/admin/map-status/{id}","AdminController\MapController@status");
Route::get("/admin/map-delete/{id}","AdminController\MapController@delete");
//end map page routing


// *************** TOUR PAGE ROUTING CODING START ********************* //

Route::get("/admin/add-tour","AdminController\TourController@index");
Route::get("/admin/tour/get-sub-category/{category_id}","AdminController\TourController@getSubCategory");
Route::match(['get','post'],"/admin/tour/add-tour-data","AdminController\TourController@store");
Route::get("/admin/view-tour-list","AdminController\TourController@showTour");
Route::get("/admin/tour/status-change/{id}","AdminController\TourController@status_change");
Route::get("admin/tour/edit-tour/{id}","AdminController\TourController@edit");
Route::match(['get','post'],"/admin/tour/update-tour-data","AdminController\TourController@edit_data");
Route::get("/admin/tour/delete-tour/{id}","AdminController\TourController@delete");

// *************** END CODING OF TOUR PAGE ROUTING ********************//



// *************** HOTEL PAGE ROUTING CODING START ********************* //

Route::get("/admin/hotel/add-hotel","AdminController\HotelController@index");
Route::match(['get','post'],"/admin/hotel/get-city/{region_id}","AdminController\HotelController@getCity");
Route::get("/admin/hotel/view-hotel","AdminController\HotelController@show");
Route::match(['get','post'],"/admin/hotel/add-hotel-data","AdminController\HotelController@store");
Route::get("/admin/view-tour-list","AdminController\TourController@showTour");
Route::get("/admin/hotel/status-change/{id}","AdminController\HotelController@status_change");
Route::get("/admin/hotel/edit/{id}","AdminController\HotelController@edit");
Route::match(['get','post'],"/admin/hotel/update-hotel-data","AdminController\HotelController@edit_data");
Route::get("/admin/hotel/delete/{id}","AdminController\HotelController@delete");
Route::get("/admin/hotel/image/{id}","AdminController\HotelController@view_image");
Route::match(['get','post'],"/admin/hotel/add-more-image","AdminController\HotelController@add_more_image");
Route::match(['get','post'],"/admin/hotel/update--more-image","AdminController\HotelController@update_more_image");
Route::get("/admin/hotel/multiple_image/delete/{id}","AdminController\HotelController@delete_multiple_image");

// *************** END CODING OF HOTEL PAGE ROUTING ********************//



// *************** APPARTMENT PAGE ROUTING CODING START ****************//
Route::get("/admin/add-appartment","AdminController\AppartmentController@index");
Route::match(['get','post'],"/admin/appartment/get-city/{id}","AdminController\AppartmentController@getCity");

Route::match(['get','post'],"/admin/appartment/add-appartment-data","AdminController\AppartmentController@store");
Route::get("/admin/view-appartment","AdminController\AppartmentController@show");
Route::get("/admin/appartment/status-change/{id}","AdminController\AppartmentController@status");
Route::get("/admin/appartment/edit/{id}","AdminController\AppartmentController@edit");

Route::match(['get','post'],"/admin/appartment/update-appartment-data","AdminController\AppartmentController@edit_data");
Route::get("/admin/appartment/image/{id}","AdminController\AppartmentController@view_image");
Route::match(['get','post'],"/admin/appartment/update-more-image","AdminController\AppartmentController@update_multi_image");
Route::match(['get','post'],"/admin/appartment/add-more-image","AdminController\AppartmentController@add_more_image");
Route::get("/admin/appartment/multiple_image/delete/{id}","AdminController\AppartmentController@delete_more_image");
// *************** END APPARTMENT PAGE   ROUTING CODING *************//



//**************** PRIVATE DRIVER PAGE ROUTING *********************//
Route::get("/admin/driver/add-private-driver","AdminController\PrivateDriverController@index");
Route::match(['get','post'],"/admin/private-driver/get-city/{id}","AdminController\PrivateDriverController@getCity");
Route::match(['get','post'],"/admin/driver/add-private-driver-data","AdminController\PrivateDriverController@store");
Route::get("/admin/driver/view-driver-list","AdminController\PrivateDriverController@show");
Route::get("/admin/driver/status-change/{id}","AdminController\PrivateDriverController@status_change");
Route::get("/admin/driver/edit/{id}","AdminController\PrivateDriverController@edit");
Route::match(['get','post'],"/admin/driver/update-private-driver-data","AdminController\PrivateDriverController@edit_data");
Route::get("/admin/driver/delete/{id}","AdminController\PrivateDriverController@delete");
//**************** END PRIVATE DRIVER PAGE ROUTING *****************//



//***************** CAR RENTAL PAGE ROUTING **********************//
Route::get("/admin/add-car-rental","AdminController\CarRentalController@index");
Route::match(['get','post'],"/admin/private-driver/get-city/{id}","AdminController\CarRentalController@getCity");
Route::match(['get','post'],"/admin/car-rental/add-car-rental-data","AdminController\CarRentalController@store");
Route::get("/admin/view-car-rental","AdminController\CarRentalController@view_car");
Route::get("/admin/car-rental/status-change/{id}","AdminController\CarRentalController@status_change");
Route::get("/admin/car-rental/delete/{id}","AdminController\CarRentalController@delete");
Route::get("/admin/car-rental/edit/{id}","AdminController\CarRentalController@edit");
Route::match(['get','post'],"/admin/car-rental/update-car-rental-data","AdminController\CarRentalController@edit_data");
Route::get("/admin/car-rental/image/{id}","AdminController\CarRentalController@multiple_image");
Route::get("/admin/car-rental/multi-image/delete/{id}","AdminController\CarRentalController@delete_multiple_image");
Route::match(['get','post'],"/admin/car-rental/add-more-image","AdminController\CarRentalController@add_more_image");
Route::match(['get','post'],"/admin/car-rental/update-more-image","AdminController\CarRentalController@update_multi_image");

//***************** CAR RENTAL PAGE ROUTING END ******************//

//***************** RIDES  PAGE ROUTING **********************//
Route::get("/admin/rides/add-rides","AdminController\RideController@index");
Route::match(['get','post'],"/admin/ride/get-city/{id}","AdminController\RideController@getCity");
Route::match(['get','post'],"/admin/rides/add-rides-data","AdminController\RideController@store");
Route::get("/admin/rides/view-rides","AdminController\RideController@view_ride");
Route::get("/admin/ride/status-change/{id}","AdminController\RideController@status_change");
Route::get("/admin/ride/delete/{id}","AdminController\RideController@delete");
Route::get("/admin/ride/edit/{id}","AdminController\RideController@edit");
Route::match(['get','post'],"/admin/rides/update-rides-data","AdminController\RideController@edit_data");

//***************** RIDE PAGE ROUTING END ******************//

// **************** TRANSFER PAGE ROUTING  ******************//
Route::get("/admin/transfer/add-transfer","AdminController\TransferController@index");
Route::match(['get','post'],"/admin/transfer/add-transfer-data","AdminController\TransferController@store");
Route::get("/admin/transfer/view-transfer","AdminController\TransferController@show");
Route::get("/admin/transfer/status-change/{id}","AdminController\TransferController@status_change");
Route::get("/admin/transfer/delete-transfer/{id}","AdminController\TransferController@delete");
Route::get("/admin/transfer/edit-transfer/{id}","AdminController\TransferController@edit");
Route::post("/admin/transfer/update-transfer-data","AdminController\TransferController@edit_data");

// **************** END TRANSFER PAGE ROUTING ***************//




// **************** TRANSFER PAGE ROUTING  ******************//
Route::get("/admin/public-transportation/add-public-transportation","AdminController\PublicTransportationController@index");
Route::match(['get','post'],"/admin/public-transportation/add-public-transportation-data","AdminController\PublicTransportationController@store");
Route::get("/admin/public-transportation/view-public-transportation","AdminController\PublicTransportationController@show");
Route::get("/admin/public-transportation/status-change/{id}","AdminController\PublicTransportationController@status_change");
Route::get("/admin/public-transportation/delete/{id}","AdminController\PublicTransportationController@delete");
Route::get("/admin/public-transportation/edit/{id}","AdminController\PublicTransportationController@edit");
Route::post("/admin/public-transportation/update-public-transportation-data","AdminController\PublicTransportationController@edit_data");

// **************** END TRANSFER PAGE ROUTING ***************//


// **************************** GATES PAGE ROUTING ***************//
Route::get("/admin/gates/add-gate","AdminController\GateController@index");
Route::match(['get','post'],"/admin/gate/add-gate-data","AdminController\GateController@store");
Route::get("/admin/gates/view-gate","AdminController\GateController@show");
Route::get("/admin/gates/status-change/{id}","AdminController\GateController@status_change");
Route::get("/admin/gates/edit/{id}","AdminController\GateController@edit");
Route::match(['get','post'],"/admin/gates/update-gates-data","AdminController\GateController@edit_data");
Route::get("/admin/gates/delete/{id}","AdminController\GateController@delete");
// **************************** END GATES PAGE ROUTING *************//




// **************************** RESTAURANT PAGE ROUTING ***********//
Route::get("/admin/food-drink/add-food-drink","AdminController\FoodAndDrinkController@index");
Route::match(['get','post'],"/admin/food-drink/get-city","AdminController\FoodAndDrinkController@getCity");
Route::match(['get','post'],"/admin/food-drink/add-food-drink-data","AdminController\FoodAndDrinkController@store");
Route::get("/admin/food-drink/view-food-drink","AdminController\FoodAndDrinkController@show");
Route::get("/admin/food-and-drink/status-change/{id}","AdminController\FoodAndDrinkController@status_change");
Route::get("/admin/food-drink/edit/{id}","AdminController\FoodAndDrinkController@edit");
Route::match(['get','post'],"/admin/food-drink/update-food-drink-data","AdminController\FoodAndDrinkController@edit_data");
Route::get("/admin/food-drink/delete/{id}","AdminController\FoodAndDrinkController@delete");

// **************************** END RESTURANT PAGE ROUTING ************//



// ***************************** PRIVATE ROOM PAGE ROUTING START ***************************//
 Route::get("/admin/private-room/add-private-room","AdminController\PrivateRoomController@index");
 Route::match(['get','post'],"/admin/private-room/add-private-room-data","AdminController\PrivateRoomController@create");
 Route::get("/admin/private-room/view-private-room","AdminController\PrivateRoomController@show_private_room_list");
 Route::get("/admin/private-room/private-room-edit/{id}","AdminController\PrivateRoomController@edit");
 Route::match(['get','post'],"/admin/private-room/update-private-room-data","AdminController\PrivateRoomController@edit_data");
 Route::get("/admin/private-room/status-change/{id}","AdminController\PrivateRoomController@status_change");
 Route::get("/admin/private-room/private-room-delete/{id}","AdminController\PrivateRoomController@delete");
// ***************************** PRIVATE ROMM PAGE ROUTING END  ***************************//


// ****************************** TOUR AND ACTIVITY PAGE ROUTING START *******************************//
 
 Route::get("/admin/add-tour-and-activity","AdminController\TourAndActivityController@index");
 Route::post("/admin/tour-and-activity/add-tour-and-activity-data","AdminController\TourAndActivityController@create");
 Route::get("/admin/view-tour-and-activity","AdminController\TourAndActivityController@show_list");
 Route::get("/admin/tour-and-activity/status-change/{id}","AdminController\TourAndActivityController@status_change");
Route::get("/admin/tour-and-activity/edit/{id}","AdminController\TourAndActivityController@edit");
Route::post("/admin/tour-and-activity/update-tour-and-activity-data","AdminController\TourAndActivityController@edit_data");
Route::get("/admin/tour-and-activity/delete/{id}","AdminController\TourAndActivityController@delete");
//image
Route::get("/admin/tour-and-activity/tour-and-activity-multiple-image/{id}","AdminController\TourAndActivityController@showMultiImage");

Route::get("/admin/tour-and-activity/add-more-image-tour-and-activity/{id}","AdminController\TourAndActivityController@addMoreImage");
Route::post("/admin/tour-and-activity/add-more-image-tour-and-activity-data","AdminController\TourAndActivityController@addMoreImageStore");
Route::get("/admin/tour-and-activity/tour-and-activity-image-status-change/{id}","AdminController\TourAndActivityController@More_image_status_change");
Route::get("/admin/tour-and-activity/tour-and-activity-image/delete/{id}","AdminController\TourAndActivityController@deleteMoreImage");
Route::get("/admin/tour-and-activity/tour-and-activity-image/edit/{id}","AdminController\TourAndActivityController@editMoreImage");
Route::post("/admin/tour-and-activity/update-more-image-tour-and-activity-data","AdminController\TourAndActivityController@moreImageEditData");
// ****************************** END TOUR AND ACTIVITY PAGE ROUTING END //

//***************************** TRANSPORTATION PAGE ROUTIING **************************//
Route::get("/admin/transportation/add-transportation","AdminController\TranportationController@index");
Route::post("/admin/transportation/add-transportation","AdminController\TranportationController@create");
Route::get("/admin/transportation/view-transportation","AdminController\TranportationController@show_list");
Route::get("/admin/transportation/edit/{id}","AdminController\TranportationController@edit");
Route::post("/admin/transportation/update-transportation-data","AdminController\TranportationController@edit_data");
Route::get("/admin/transportation/status-change/{id}","AdminController\TranportationController@status_change");

//image
Route::get("/admin/transportation/transportation-multiple-image/{id}","AdminController\TranportationController@showMultiImage");

Route::get("/admin/transportation/add-more-image-transportation/{id}","AdminController\TranportationController@addMoreImage");
Route::post("/admin/transportation/add-more-image-transportation-data","AdminController\TranportationController@addMoreImageStore");
Route::get("/admin/transportation/transportation-image-status-change/{id}","AdminController\TranportationController@More_image_status_change");
Route::get("/admin/transportation/transportation-image/delete/{id}","AdminController\TranportationController@deleteMoreImage");
Route::get("/admin/transportation/transportation-image/edit/{id}","AdminController\TranportationController@editMoreImage");
Route::post("/admin/transportation/update-more-image-transportation-data","AdminController\TranportationController@moreImageEditData");

//transportation comment
Route::get("/admin/transportation/comment/{id}","AdminController\\TranportationController@comment");
//***************************** END TRANSPORTATION PAGE ROUTING ***********************//


// *************************** FOOD AND DRINK CONTROLLER ****************************//
Route::get("/admin/food-and-drink/add-food-drink","AdminController\FoodDrinkController@index");
Route::post("/admin/food-and-drink/add-food-and-drink-data","AdminController\FoodDrinkController@create");
Route::get("/admin/food-and-drink/view-food-drink","AdminController\FoodDrinkController@show_list");
Route::get("/admin/food-and-drink/status-change/{id}","AdminController\FoodDrinkController@status_change");
Route::get("/admin/food-and-drink/edit/{id}","AdminController\FoodDrinkController@edit");
Route::post("/admin/food-and-drink/update-food-and-drink-data","AdminController\FoodDrinkController@edit_data");
Route::get("/admin/food-and-drink/delete/{id}","AdminController\FoodDrinkController@delete");

//image
Route::get("/admin/food-and-drink/view-more-image/{id}","AdminController\FoodDrinkController@showMultiImage");
Route::get("/admin/food-and-drink/add-more-image-food-and-drink/{id}","AdminController\FoodDrinkController@addMoreImage");
Route::post("/admin/food-and-drink/add-more-image-food-and-drink-data","AdminController\FoodDrinkController@addMoreImageStore");
Route::get("/admin/food-and-drink/food-and-drink-image-status-change/{id}","AdminController\FoodDrinkController@More_image_status_change");
Route::get("/admin/food-and-drink/food-and-drink-more-image/delete/{id}","AdminController\FoodDrinkController@deleteMoreImage");
Route::get("/admin/food-and-drink/food-and-drink-more-image/edit/{id}","AdminController\FoodDrinkController@editMoreImage");
Route::post("/admin/food-and-drink/update-more-image-food-and-drink-data","AdminController\FoodDrinkController@moreImageEditData");
// *************************** END FOOD AND DRINK CONTROLLER ************************//

//******************* ACCOMODATION PAGE ROUTING START *******************************//
Route::get("/admin/accomodation/add-accomodation","AdminController\AccomodationController@index");
Route::post("/admin/accomodation/add-accomodation-data","AdminController\AccomodationController@create");
Route::get("/admin/accomodation/view-accomodation","AdminController\AccomodationController@show_list");
Route::get("/admin/accomodation/status-change/{id}","AdminController\AccomodationController@status_change");
Route::get("/admin/accomodation/edit/{id}","AdminController\AccomodationController@edit");
Route::post("/admin/accomodation/update-accomodation-data","AdminController\AccomodationController@edit_data");
Route::get("/admin/accomodation/delete/{id}","AdminController\AccomodationController@delete");
Route::get("/admin/accomodation/multiple-image/{id}","AdminController\AccomodationController@showMultiImage");
//image
Route::get("/admin/accomodation/multiple-image/{id}","AdminController\AccomodationController@showMultiImage");
Route::get("/admin/accomodation/add-more-image-accomodation/{id}","AdminController\AccomodationController@addMoreImage");
Route::post("/admin/accomodation/add-more-image-accomodation-data","AdminController\AccomodationController@addMoreImageStore");
Route::get("/admin/accomodation/accomodation-image-status-change/{id}","AdminController\AccomodationController@More_image_status_change");
Route::get("/admin/accomodation/accomodation-image/delete/{id}","AdminController\AccomodationController@deleteMoreImage");
Route::get("/admin/accomodation/accomodation-image/edit/{id}","AdminController\AccomodationController@editMoreImage");
Route::post("/admin/accomodation/update-more-image-accomodation-data","AdminController\AccomodationController@moreImageEditData");
//******************* END ACCOMODATION PAGE ROUTING END ****************************//

//-------------------- MUST DO AND SEE PAGE ROUTING -----------------------------------//
Route::get("/admin/must-do-and-see/add-must-do-and-see","AdminController\MustDoAndSeeController@index");
Route::post("/admin/must-do-and-see/add-must-do-and-see-add","AdminController\MustDoAndSeeController@create")
;
Route::get("/admin/must-do-and-see/view-must-do-and-see","AdminController\\MustDoAndSeeController@show");
Route::get("/admin/must-do-and-see/edit/{id}","AdminController\\MustDoAndSeeController@edit");
Route::post("/admin/must-do-and-see/edit-data","AdminController\\MustDoAndSeeController@edit_data");

Route::get("/admin/must-do-and-see/status-change/{id}","AdminController\\MustDoAndSeeController@status_change");

Route::get("/admin/must-do-and-see/delete/{id}","AdminController\\MustDoAndSeeController@delete");

Route::get("admin/must-do-and-see/must-do-and-see-multiple-image-list/{id}","AdminController\\MustDoAndSeeController@showMoreImageList");
//add more image 

Route::get("/admin/must-do-and-see/must-do-and-see-multiple-image-add/{id}","AdminController\\MustDoAndSeeController@addMoreImage");
Route::post("/admin/must-do-and-see/add-image","AdminController\\MustDoAndSeeController@addMoreImageData");
Route::get("/admin/must-do-and-see/status-change-more-image/{id}","AdminController\\MustDoAndSeeController@status_change_more_image");
Route::get("/admin/must-do-and-see/delete-more-image/{id}","AdminController\\MustDoAndSeeController@deleteMoreImage");
Route::get("/admin/must-do-and-see/edit-more-image/{id}","AdminController\\MustDoAndSeeController@editMoreImage");
Route::post("/admin/must-do-and-see/edit-image-data","AdminController\\MustDoAndSeeController@editMoreImageData");
//end add more image
//--------------------- MUST DO AND SEE PAGE ROUTING END ------------------------------//


//-------------------- DISCOVER MORROCO ---------------------------------------------//
Route::get("/admin/discover-morocco/add","AdminController\DiscoverMoroccoController@index");
Route::post("/admin/discover-morocco/add-data","AdminController\DiscoverMoroccoController@create")
;
Route::get("/admin/discover-morocco/view","AdminController\\DiscoverMoroccoController@show");
Route::get("/admin/discover-morocco/edit/{id}","AdminController\\DiscoverMoroccoController@edit");
Route::post("/admin/discover-morocco/edit-data","AdminController\\DiscoverMoroccoController@edit_data");

Route::get("/admin/discover-morocco/status-change/{id}","AdminController\\DiscoverMoroccoController@status_change");

Route::get("/admin/discover-morocco/delete/{id}","AdminController\\DiscoverMoroccoController@delete");
Route::get("admin/discover-morocco/discover-morocco-multiple-image-list/{id}","AdminController\\DiscoverMoroccoController@showMoreImageList");

// ----------------------END DISCOVER MOROCO ----------------------------------------//


//add more image
Route::get("/admin/discover-morocco/discover-morocco-multiple-image-add/{id}","AdminController\\DiscoverMoroccoController@addMoreImage");
Route::post("/admin/discover-morocco/add-image","AdminController\\DiscoverMoroccoController@addMoreImageData");
Route::get("/admin/discover-morocco/status-change-more-image/{id}","AdminController\\DiscoverMoroccoController@status_change_more_image");
Route::get("/admin/discover-morocco/delete-more-image/{id}","AdminController\\DiscoverMoroccoController@deleteMoreImage");
Route::get("/admin/discover-morocco/edit-more-image/{id}","AdminController\\DiscoverMoroccoController@editMoreImage");
Route::post("/admin/discover-morocco/edit-image-data","AdminController\\DiscoverMoroccoController@editMoreImageData");
//end add more image
// ----------------------END DISCOVER MOROCO ----------------------------------------//


///------------------CMS ACCOMODATION PRICE ----------------------------------------//
Route::get("/admin/cms/accomodation-price/add","AdminController\CMS\AccomodationPriceController@index");
Route::post("/admin/cms/accomodation-price/add-data","AdminController\CMS\AccomodationPriceController@create");
Route::get("/admin/cms/accomodation-price/list","AdminController\CMS\AccomodationPriceController@show");
Route::get("/admin/cms/accomodation-price/edit/{id}","AdminController\CMS\AccomodationPriceController@edit");
Route::post("/admin/cms/accomodation-price/edit-data","AdminController\CMS\AccomodationPriceController@edit_data");
Route::get("/admin/cms/accomodation-price/delete/{id}","AdminController\CMS\AccomodationPriceController@delete");
//------------------- END CMS ACCOMODATION PRICE -----------------------------------//

///------------------CMS FOOD AND DRINK PRICE ----------------------------------------//
Route::get("/admin/cms/food-and-drink-price/add","AdminController\CMS\FoodAndDrinkPriceController@index");
Route::post("/admin/cms/food-and-drink-price/add-data","AdminController\CMS\FoodAndDrinkPriceController@create");
Route::get("/admin/cms/food-and-drink-price/list","AdminController\CMS\FoodAndDrinkPriceController@show");
Route::get("/admin/cms/food-and-drink-price/edit/{id}","AdminController\CMS\FoodAndDrinkPriceController@edit");
Route::post("/admin/cms/food-and-drink-price/edit-data","AdminController\CMS\FoodAndDrinkPriceController@edit_data");
Route::get("/admin/cms/food-and-drink-price/delete/{id}","AdminController\CMS\FoodAndDrinkPriceController@delete");
//------------------- END CMS FOOD AND DRINK PRICE -----------------------------------//

///------------------CMS TOUR AND ACTVITY PRICE ----------------------------------------//
Route::get("/admin/cms/tour-and-activity-price/add","AdminController\CMS\TourAndActivityPriceController@index");
Route::post("/admin/cms/tour-and-activity-price/add-data","AdminController\CMS\TourAndActivityPriceController@create");
Route::get("/admin/cms/tour-and-activity-price/list","AdminController\CMS\TourAndActivityPriceController@show");
Route::get("/admin/cms/tour-and-activity-price/edit/{id}","AdminController\CMS\TourAndActivityPriceController@edit");
Route::post("/admin/cms/tour-and-activity-price/edit-data","AdminController\CMS\TourAndActivityPriceController@edit_data");
Route::get("/admin/cms/tour-and-activity-price/delete/{id}","AdminController\CMS\TourAndActivityPriceController@delete");
//------------------- END CMS FOOD AND DRINK PRICE -----------------------------------//


///------------------CMS TOUR AND ACTVITY PRICE ----------------------------------------//
Route::get("/admin/cms/transportation-price/add","AdminController\CMS\TransportationPriceController@index");
Route::post("/admin/cms/transportation-price/add-data","AdminController\CMS\TransportationPriceController@create");
Route::get("/admin/cms/transportation-price/list","AdminController\CMS\TransportationPriceController@show");
Route::get("/admin/cms/transportation-price/edit/{id}","AdminController\CMS\TransportationPriceController@edit");
Route::post("/admin/cms/transportation-price/edit-data","AdminController\CMS\TransportationPriceController@edit_data");
Route::get("/admin/cms/transportation-price/delete/{id}","AdminController\CMS\TransportationPriceController@delete");

//----------------  END CMS TOUR AND ACTIVITY PRICE ----------------------------------//



//Currency Converter 
Route::get("/admin/currency-converter","AdminController\\CurrencyConverterController@index");
Route::get("/admin/currency-convert/list","AdminController\\CurrencyConverterController@show");

Route::post("/admin/currency/currency-convert-data","AdminController\\CurrencyConverterController@create");
Route::get("/admin/currency/currency-convert/edit/{id}","AdminController\\CurrencyConverterController@edit");
Route::post("/admin/currency/currency-convert/update","AdminController\\CurrencyConverterController@edit_data");
Route::get("/admin/currency/currency-convert/delete/{id}","AdminController\\CurrencyConverterController@delete");

//end Currency Converter

});




//front page routing coding start//
Route::get("/thing-to-do-list","Front\FrontController@thing_to_do");
Route::get("/stay","Front\FrontController@stay");
Route::get("/faq","Front\FrontController@faq");
Route::get("/privacypolicy","Front\FrontController@privacy");
Route::get("/cookiepolicy","Front\FrontController@cookie_policy");
Route::get("/contact-us","Front\FrontController@contact_us");
Route::get("/copyright-policy","Front\FrontController@copyright");
Route::get("/term","Front\FrontController@terms");
Route::get("/about","Front\FrontController@about");
Route::get("/contactus","Front\FrontController@contact");
Route::get("/login","Front\FrontController@login");
Route::get("/signup","Front\FrontController@register");
Route::get("/forgotpass","Front\FrontController@forgetpass");
Route::match(['get','post'],"/user-register","Front\UserController@register");
Route::match(['get','post'],"/user-login","Front\UserController@login");
Route::match(['get','post'],"/user-login-check","Front\UserController@check_login");

Route::get("/trip-plan","Front\FrontController@trip_plan");
Route::get("/pick-city","Front\FrontController@pick_city");
Route::get("/trip-start","Front\FrontController@trip_start");
Route::get("/accomodation","Front\FrontController@accomodation");
//tour list show
Route::get("/tour-list","Front\FrontController@tour");
// Tour list show details
Route::get("/tour-list/{tour_name}","Front\FrontController@tourShowDetails");


Route::match(['get','post'],"/tour-data","Front\TripController@tour_data");
Route::match(['get','post'],"/get-trip-city","Front\TripController@get_city");
Route::match(['get','post'],"/activity","Front\FrontController@activity");


//trip  //
Route::match(['get','post'],"/tour-date","Front\TripController@tour_date");
//end trip //



//tour detail page coding start
Route::get("/place/{name}","Front\FrontController@place");
//end tour details page coding

//find tour details
Route::get("/tour","Front\FrontController@tour");
Route::match(['get','post'],"/tour/city-search","Front\FrontController@tour_search_city");
//end find tour details

//find tour list details
Route::get("/tour/search/{name}","Front\FrontController@tour_list");
//end find tour list details

//find tour list details about
Route::get("/search/tour/{city_name}/{heading}","Front\FrontController@tour_about");
//end find tour list details about

//category filter tour coding start
Route::match(['get','post'],"/tour/search/{city}/{id}","Front\FrontController@category_filter_tour");
//end category tour page filter

//language filter tour
Route::match(['get','post'],"/tour/search/{city}/lang/{id}","Front\FrontController@lang_fliter");
//end language filter tour

//price filter thing to do
Route::match(['get','post'],"/tour/search/{city}/price/{type}","Front\FrontController@price_filter_thing_to_do");
//end price filter thing to do


//activity  filter by price 
Route::match(['get','post'],"/activity_price_filter","Front\TripController@activity_filter_by_price");
//end activity filter by price

//activity filter by category
Route::get("/tour/search/activity/category-filter/{id}","Front\FrontController@category_filter_tour_by_activity");
Route::match(['get','post'],"/tour/get-activity-all","Front\FrontController@activity_show_all");
//end activity filter by category


//actvity filter by date routing start
Route::get("/tour/activity-by-date/{date}","Front\FrontController@activity_filter_by_date");
//end activity filter by date routing end


//end coding of routing front page


//user panel page routing start
Route::group(['middleware'=>"user"],function(){
    Route::get("/user/dashboard-admin","Front\UserController@dashboard");
     Route::get("/user/profile","Front\UserController@profile");
     Route::match(['get','post'],"/user/update-date","Front\UserController@updateprofile");
     Route::match(['get','post'],"/user/update-password","Front\UserController@update_password");
     Route::get("/user/logout","Front\UserController@logout");
    
     Route::get("/user/save-plan-list-data-show","Front\\UserController@planShow");
    
});
//forget user password
 Route::match(['get','post'],"/user/forget-password","Front\\UserController@forgetPasswordData");
 //end forget password
//end coding of use panel page routing

//view city top destination
Route::get("/city/{city}","Front\FrontController@cityTopDestination");
Route::get("/discover-morocco/{type}/{city}","Front\FrontController@cityDiscoverMorocco");
Route::get("/must-to-do/{city}","Front\FrontController@CityMustToDo");
Route::get("/nature/{city}/{must_do_name}","Front\\FrontController@specificMustDoAndSee");
Route::get("/tour-and-activity/{name}","Front\\FrontController@tourAndActivity");
//end view city top destination


// ----------------------- trip plan page routing -------------------------//
  // ------------------------------------------------------------------------//
   Route::get("/trip","Front\TripController@trip");
   Route::match(['get','post'],"/tour-details","Front\TripController@tour_details");

   Route::match(['get','post'],"/tour/get-hotels","Front\TripController@getHotels");
   Route::match(['get','post'],"/tour/get-appartment","Front\TripController@getAppartment");


   //get more image of hotel show
   Route::match(['get','post'],"/tour/hotels/more-image/{id}","Front\TripController@getMoreHotelImage");
   //end get more image of hotel show 

   //get more image of appartment show
   Route::match(['get','post'],"/tour/appartment/more-image/{id}","Front\TripController@getAppartmentImage");
   //end get more image of appartment show

   //get ride 
   Route::match(['get','post'],"/tour/get-ride","Front\TripController@getRide");
   //end get ride

   //show all activity on behalf of their selected city
   Route::get("/preferable-activity","Front\TripController@getPreferableActivity");
   //end show all activity on behalf of their selected city

   // tour excursion page 
   Route::get("/tour-excursions","Front\TripController@getFoodDrink");
   //end tour excursion page

   // transportation
   Route::get("/transport","Front\TripController@transport");

   //end transportation

   //trip summary
   Route::get("/trip_summary","Front\TripController@tripSummary");
   //end trip summary
   //preferable activity filter by category
   Route::match(['get','post'],"/tour/preferable-activity/category-filter/{id}","Front\TripController@preferableActivityFilterByCategory");

   //end coding of preferable activity filter by category

   //preferable activity details show
   Route::get("/preferable-activity/preferable-activity-details","Front\TripController@preferableActivityDetailShow");
   //end preferable activity details show

    // trip summary details show
   Route::match(['get','post'],"/trip-summary-details-list","Front\TripController@tripSummaryDetails");
   //hotel list show by city order
   Route::get("/hotel/city","Front\TripController@hotel_list_by_city");

   //hotel filter
   Route::get("/hotel/city/sort-by","Front\TripController@HotelFilterByPrice");
   //activity list show order by city
   Route::get("/activity/city","Front\TripController@Activity_list_by_city");

   //activity filter by category 
   Route::get("/trip/activity-filter-by-category","Front\TripController@ActivityFilterByCategoryOrByPrice");
   //end activity filter by category

   //reset activity filter by category
   Route::get("/trip/all-activity-by-city","Front\TripController@ResetActivityFilterByCategory");
   //end reset activity filter by category

   //activity filter by date
   Route::get("/trip/activity-filter-by-date","Front\TripController@ActivityFilterByDate");

   //end activity filter by date

   //tour select 
   Route::get("/trip/tour/{tour_name}","Front\TripController@AllTourListShow");
   //end tour select

   //activity booking 
   Route::get("/search/activity/{activity_name}","Front\TripController@activityDetailsShow");
   //end activity booking

  // ------------------------------------------------------------------------//
// ----------------------- end Trip plan page routing ----------------------//  


   //customer query contact us page routing///
   Route::match(['get','post'],"/customer-query","Front\CustomerQueryController@query");
   //end customer query page routing //


//login with google routing  //

   Route::get('login/google', 'Front\UserController@GoogleLogin');
Route::get('user/dashboard', 'Front\UserController@GoogleLoginRedirect');


//end loginwith google routing //



//login with facebook routing //
Route::get("/login/facebook","Front\UserController@facebook_login");
Route::get("/user/dashboard/callback","Front\UserController@facebook_login_success");

//end login with google routing //

//login with facebook routing //
Route::get("/login/twitter","Front\UserController@twitter_login");
Route::get("/user/dashboard/callback","Front\UserController@facebook_login_success");

//end login with google routing //




//location find
Route::get("/location","Front\UserController@location");
//end location find


Route::get("/pdf","Front\UserController@pdf");

Route::get("/pick-city/city-details","Front\TripController@getCitySpecificDetails");

Route::get("/trip-summary-details/get-activity-details","Front\TripController@getActivitySpecificDetails");

Route::get("/trip-summary-details/get-accomodation-details","Front\TripController@getAccomodationSpecificDetails");

Route::get("/trip-summary-details/get-fooddrink-details","Front\TripController@getFoodAndDrinkSpecificDetails");

Route::get("/trip-summary-details/get-transportation-details","Front\TripController@getTransportationSpecificDetails");

// Nature Star
Route::get("/nature/{nature_name}","Front\FrontController@natureDetails");
//end Nature Routing
Route::get("/good-for/{city_name}/{must_do_and_see_type}","Front\\FrontController@goodFor");
Route::get("/good-for/{city_name}/{must_do_and_see_type}/{name}","Front\\FrontController@goodForSpecific");

Route::match(['get','post'],"/user/travel","Front\\FrontController@travel_data");
Route::match(['get','post'],"/user/city","Front\\FrontController@city_data");
Route::match(['get','post'],"/user/accomodation","Front\\FrontController@accomodation_data");
Route::match(['get','post'],"/user/activity","Front\\FrontController@activity_data");
Route::match(['get','post'],"/user/fooddrink","Front\\FrontController@fooddrink_data");
Route::match(['get','post'],"/user/transportation","Front\\FrontController@transportation_data");
Route::match(['get','post'],"/currency-change","Front\\FrontController@convertCurrency");

Route::match(['get','post'],"/trip/done","Front\\FrontController@tripDone");

Route::get('/mytrip-plan',"Front\\FrontController@myTripPlan");
Route::match(['get','post'],"/save-my-plan-data","Front\\TripController@saveMyPlan");