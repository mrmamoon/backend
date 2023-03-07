<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignUpController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DevelopersController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\AmenitiesController;
use App\Http\Controllers\SellPropertiesController;
use App\Http\Controllers\RentPropertiesController;
use App\Http\Controllers\SEOController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\InquiriesController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SellController;
use App\Http\Controllers\VacanciesController;
use App\Http\Controllers\insightsController;
use App\Http\Controllers\propertyTypeController;
use App\Http\Controllers\ApplicantsController;
use App\Http\Controllers\KeywordsController;
use App\Http\Controllers\mortgageLoanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\HomeCarouselController;
use App\Http\Controllers\HeadingsController;
use App\Http\Controllers\HomePageContentController;
use App\Http\Controllers\HomePageSectionTwoContentController;
use App\Http\Controllers\HomePageSectionThreeContentController;
use App\Http\Controllers\AboutUsContentController;
use App\Http\Controllers\PropertyManagementContentController;
use App\Http\Controllers\SellContentController;

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

Route::get('headings',[HeadingsController::class, 'index'])->name('Headings');
Route::get('/lole',[RoleController::class, 'supadm']);
Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    

    //user managment 
        Route::group(['middleware' => ['can:Users']], function () {
            Route::get('/users', [UserController::class, 'index'])->name('user');
            Route::get('/users/datatable', [UserController::class, 'datatable'])->name('user.datatable');
        });
        Route::group(['middleware' => ['can:users-add']], function () {
            Route::get('/users/create', [UserController::class, 'create'])->name('user.create');
            Route::post('/users/store', [UserController::class, 'store'])->name('user.store');
        });

        Route::group(['middleware' => ['can:users-edit']], function () {
            Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
            Route::put('users/{user}/update', [UserController::class, 'update'])->name('user.update');
        });
        Route::group(['middleware' => ['can:users-delete']], function () {
            Route::delete('users/destroy', [UserController::class, 'destroy'])->name('user.destroy');
        });

        Route::group(['middleware' => ['can:user-status']], function () {
            Route::patch('users/status', [UserController::class, 'status'])->name('user.status');
        });

    //role managment 
        Route::group(['middleware' => ['can:Roles']], function () {
            Route::get('/roles', [RoleController::class, 'index'])->name('role');
            Route::get('/roles/datatable', [RoleController::class, 'datatable'])->name('role.datatable');
        });

        // role create route
        Route::group(['middleware' => ['can:roles-add']], function () {
            Route::get('/roles/create', [RoleController::class, 'create'])->name('role.create');
            Route::post('/roles/add', [RoleController::class, 'store'])->name('role.store');
        });

        // role edit route
        Route::group(['middleware' => ['can:roles-edit']], function () {
            Route::get('roles/{role}/edit', [RoleController::class, 'edit'])->name('role.edit');
            Route::put('roles/{role}/update', [RoleController::class, 'update'])->name('role.update');
        });

        // role delete route
        Route::group(['middleware' => ['can:roles-delete']], function () {
            Route::delete('roles/destroy', [RoleController::class, 'destroy'])->name('role.destroy');
        });


    //developers
        Route::group(['middleware' => ['can:Listings']], function () {
        
            Route::get('/developers', [DevelopersController::class, 'index'])->name('developers');
            Route::get('/developers/datatable', [DevelopersController::class, 'datatable'])->name('developer.datatable');
            Route::get('/developers/create', [DevelopersController::class, 'create'])->name('developer.create');
            Route::post('/developers/store', [DevelopersController::class, 'store'])->name('developer.store');
            Route::patch('/developers/status', [DevelopersController::class, 'status'])->name('developer.status');
            Route::get('/developers/{developer}/edit', [DevelopersController::class, 'edit'])->name('developer.edit');
            Route::put('/developers/{developer}/update', [DevelopersController::class, 'update'])->name('developer.update');
            Route::delete('/developers/destroy', [DevelopersController::class, 'destroy'])->name('developer.destroy');
            Route::patch('/developers/featured', [DevelopersController::class, 'featured'])->name('developer.featured'); 
        });

    //properties


    //projects
        Route::group(['middleware' => ['can:Listings']], function () {
            Route::get('/projects', [ProjectsController::class, 'index'])->name('projects');
            Route::get('/projects/datatable', [ProjectsController::class, 'datatable'])->name('project.datatable');
        });
        Route::group(['middleware' => ['can:Listings-add']], function () {
            Route::get('/projects/create', [ProjectsController::class, 'create'])->name('project.create');
            Route::post('/projects/store', [ProjectsController::class, 'store'])->name('project.store');
        });
        Route::group(['middleware' => ['can:Listings-status']], function () {
            Route::patch('/projects/status', [ProjectsController::class, 'status'])->name('project.status');
            Route::patch('/projects/featured', [ProjectsController::class, 'featured'])->name('project.featured');
        });
        Route::group(['middleware' => ['can:Listings-update']], function () {
            Route::get('/projects/{projects}/edit', [ProjectsController::class, 'edit'])->name('project.edit');
            Route::put('/projects/{projects}/update', [ProjectsController::class, 'update'])->name('project.update');
        });
        Route::group(['middleware' => ['can:Listings-delete']], function () {
            Route::delete('/projects/destroy', [ProjectsController::class, 'destroy'])->name('project.destroy');
        });

        Route::group(['middleware' => 'isSuperAdmin'], function () {
            Route::patch('/projects/publish', [ProjectsController::class, 'publish'])->name('project.publish');
        });

    //listing image update
        Route::delete('/projects/imageDestroy', [ProjectsController::class, 'deleteImage'])->name('projectImage.destroy');

    //sell
        Route::group(['middleware' => ['can:Listings']], function () {
            Route::get('/sellProperty', [SellPropertiesController::class, 'index'])->name('sell');
            Route::get('/sellProperty/datatable', [SellPropertiesController::class, 'datatable'])->name('sell.datatable');
        });
        Route::group(['middleware' => ['can:Listings-add']], function () {
            Route::get('/sellProperty/create', [SellPropertiesController::class, 'create'])->name('sell.create');
            Route::post('/sellProperty/store', [SellPropertiesController::class, 'store'])->name('sell.store');
        });
        Route::group(['middleware' => ['can:Listings-status']], function () {
            Route::patch('/sellProperty/status', [SellPropertiesController::class, 'status'])->name('sell.status');
            Route::patch('/sellProperty/featured', [SellPropertiesController::class, 'featured'])->name('sell.featured');
        });
        Route::group(['middleware' => ['can:Listings-update']], function () {
            Route::get('/sellProperty/{project}/edit', [SellPropertiesController::class, 'edit'])->name('sell.edit');
            Route::put('/sellProperty/{project}/update', [SellPropertiesController::class, 'update'])->name('sell.update');
        });
        Route::group(['middleware' => ['can:Listings-delete']], function () {
            Route::delete('/sellProperty/destroy', [SellPropertiesController::class, 'destroy'])->name('sell.destroy');
        });

    //rent

        Route::group(['middleware' => ['can:Listings']], function () {   
            Route::get('/rentProperty', [RentPropertiesController::class, 'index'])->name('rent');
            Route::get('/rent/datatable', [RentPropertiesController::class, 'datatable'])->name('rent.datatable');
        });
        Route::group(['middleware' => ['can:Listings-add']], function () {
            Route::get('/rent/create', [RentPropertiesController::class, 'create'])->name('rent.create');
            Route::post('/rent/store', [RentPropertiesController::class, 'store'])->name('rent.store');           
        });
        Route::group(['middleware' => ['can:Listings-status']], function () {
            Route::patch('/rent/status', [RentPropertiesController::class, 'status'])->name('rent.status');
            Route::patch('/rent/featured', [RentPropertiesController::class, 'featured'])->name('rent.featured');
        });
        Route::group(['middleware' => ['can:Listings-update']], function () {
            Route::get('/rent/{project}/edit', [RentPropertiesController::class, 'edit'])->name('rent.edit');
            Route::put('/rent/{project}/update', [RentPropertiesController::class, 'update'])->name('rent.update');           
        });
        Route::group(['middleware' => ['can:Listings-delete']], function () {
            Route::delete('/rent/destroy', [RentPropertiesController::class, 'destroy'])->name('rent.destroy');
        });

    //Amenities
        Route::get('/amenities/datatable', [AmenitiesController::class, 'datatable'])->name('amenities.datatable');
        Route::get('/amenities',[AmenitiesController::class, 'index'])->name('amenities');
        Route::get('/amenities/create', [AmenitiesController::class, 'create'])->name('amenities.create');
        Route::post('/amenities/store', [AmenitiesController::class, 'store'])->name('amenities.store');
        Route::delete('/amenities/destroy', [AmenitiesController::class, 'destroy'])->name('amenities.destroy');

    //SEO
        Route::group(['middleware' => ['can:SEO']], function () {
            Route::get('/seo', [SEOController::class, 'index'])->name('seo');
            Route::get('/seo/datatable', [SEOController::class, 'datatable'])->name('seo.datatable');           
        });
        // Route::group(['middleware' => ['can:SEO-add']], function () {
           
           
        // });
        Route::group(['middleware' => ['can:SEO-edit']], function () {
            Route::get('seo/{slug}/edit', [SEOController::class, 'edit'])->name('seo.edit');
            Route::put('seo/{slug}/update', [SEOController::class, 'update'])->name('seo.update');           
        });

        Route::group(['middleware' => ['can:user-status']], function () {
            Route::patch('users/status', [UserController::class, 'status'])->name('user.status');
        });
        Route::group(['middleware' => ['can:users-delete']], function () {
            Route::delete('users/destroy', [UserController::class, 'destroy'])->name('user.destroy');
        });

    //Settings
        Route::group(['middleware' => ['can:Settings']], function () {
            Route::get('/settings', [SettingsController::class, 'index'])->name('settings');
            //home
            Route::get('/headings', [HeadingsController::class, 'index'])->name('headings');
            Route::get('/home', [HomePageContentController::class, 'index'])->name('home');
            Route::get('/home/section-two/create/', [HomePageSectionTwoContentController::class, 'create'])->name('home.SectionTwo');
            Route::post('/home/section-two/store/', [HomePageSectionTwoContentController::class, 'store'])->name('home.SectionTwo.store');
            Route::get('/home/section-two/{homePageSectionTwoContent}/edit/', [HomePageSectionTwoContentController::class, 'edit'])->name('home.SectionTwo.edit');
            Route::put('/home/section-two/{homePageSectionTwoContent}/update/', [HomePageSectionTwoContentController::class, 'update'])->name('home.SectionTwo.update');
            // Route::put('/home/section-three/{homePageSectionThreeContent}/update/', [HomePageSectionThreeContentController::class, 'update'])->name('home.SectionThree.update');
            Route::Post('/home/section-three/update/', [HomePageSectionThreeContentController::class, 'update'])->name('home.SectionThree.update');
            //About Us
            Route::get('about-us',[AboutUsContentController::class, 'index'])->name('about-us');
            Route::post('/about-us/section-one/create/', [AboutUsContentController::class, 'storeSectionOne'])->name('about-us.SectionOne.store');
            Route::put('/about-us/section-one/update/', [AboutUsContentController::class, 'updateSectionOne'])->name('about-us.SectionOne.update');
            Route::post('/about-us/section-two/create/', [AboutUsContentController::class, 'storeSectionTwo'])->name('about-us.SectionTwo.store');
            Route::put('/about-us/section-two/update/', [AboutUsContentController::class, 'updateSectionTwo'])->name('about-us.SectionTwo.update');
            Route::post('/about-us/section-three/create/', [AboutUsContentController::class, 'storeSectionThree'])->name('about-us.SectionThree.store');
            Route::put('/about-us/section-three/update/', [AboutUsContentController::class, 'updateSectionThree'])->name('about-us.SectionThree.update');

            Route::post('/about-us/section-five/create/', [AboutUsContentController::class, 'storeSectionFive'])->name('about-us.SectionFive.store');
            Route::put('/about-us/section-five/update/', [AboutUsContentController::class, 'updateSectionFive'])->name('about-us.SectionFive.update');

            Route::get('/about-us/section-four/datatable', [AboutUsContentController::class, 'datatable'])->name('about-us.SectionFour.datatable');
            Route::get('/about-us/section-four/create', [AboutUsContentController::class, 'createSectionFour'])->name('about-us.SectionFour.create');
            Route::post('/about-us/section-four/store', [AboutUsContentController::class, 'storeSectionFour'])->name('about-us.SectionFour.store');
            Route::get('/about-us/section-four/{sectionFour}/edit', [AboutUsContentController::class, 'editSectionFour'])->name('about-us.SectionFour.edit');
            Route::put('/about-us/section-four/{sectionFour}/update', [AboutUsContentController::class, 'updateSectionFour'])->name('about-us.SectionFour.update');
            //Property Management
            Route::get('property-management',[PropertyManagementContentController::class, 'index'])->name('property-management');
            Route::post('/property-management/section-title/update/', [PropertyManagementContentController::class, 'updateSectionTitle'])->name('property-management.SectionTitle.update');
            Route::put('/property-management/section-one/update/', [PropertyManagementContentController::class, 'updateSectionOne'])->name('property-management.SectionOne.update');
            Route::get('/property-management/section-two/datatable', [PropertyManagementContentController::class, 'datatable'])->name('property-management.SectionTwo.datatable');
            Route::get('/property-management/section-two/create', [PropertyManagementContentController::class, 'createSectionTwo'])->name('property-management.SectionTwo.create');
            Route::post('/property-management/section-two/store', [PropertyManagementContentController::class, 'storeSectionTwo'])->name('property-management.SectionTwo.store');
            Route::get('/property-management/section-two/{sectionTwo}/edit', [PropertyManagementContentController::class, 'editSectionTwo'])->name('property-management.SectionTwo.edit');
            Route::put('/property-management/section-two/{sectionTwo}/update', [PropertyManagementContentController::class, 'updateSectionTwo'])->name('property-management.SectionTwo.update');
            Route::post('/property-management/section-three/update', [PropertyManagementContentController::class, 'updateSectionThree'])->name('property-management.SectionThree.update');
            //Sell
            Route::get('sell',[SellContentController::class, 'index'])->name('sell');
        });
        Route::group(['middleware' => ['can:Settings-Edit']], function () {
            Route::put('/settings/update', [SettingsController::class, 'update'])->name('settings.update');
            Route::put('/headings/update', [HeadingsController::class, 'update'])->name('headings.update');
        });

    // Blogs
        Route::group(['middleware' => ['can:Blogs']], function () {
            Route::get('/blogs', [BlogController::class, 'index'])->name('blogs');
            Route::get('/blogs/datatable', [BlogController::class, 'datatable'])->name('blog.datatable');
        });
        Route::group(['middleware' => ['can:blogs-add']], function () {
            Route::get('/blogs/create', [BlogController::class, 'create'])->name('blog.create');
            Route::post('/blogs/store', [BlogController::class, 'store'])->name('blog.store');
        });
        Route::group(['middleware' => ['can:blogs-edit']], function () {
            Route::get('/blogs/{blog}/edit', [BlogController::class, 'edit'])->name('blog.edit');
            Route::put('/blogs/{blog}/update', [BlogController::class, 'update'])->name('blog.update');
        });
        Route::group(['middleware' => ['can:blogs-delete']], function () {
            Route::delete('/blogs/destroy', [BlogController::class, 'destroy'])->name('blog.destroy'); 
        });
        Route::group(['middleware' => ['can:blogs-status']], function () {
            Route::patch('/blogs/status', [BlogController::class, 'status'])->name('blog.status');
        });




     //Inquiries
        Route::group(['middleware' => ['can:Inquiries-Inquiries']], function () {
            Route::get('/inquiries/datatable', [InquiriesController::class ,'datatable'])->name('inquiries.datatable');
            Route::get('/inquiries', [InquiriesController::class ,'index'])->name('inquiries');
        });
        Route::group(['middleware' => ['can:Inquiries-delete']], function () {
            Route::delete('/inquiries/destroy', [InquiriesController::class, 'destroy'])->name('inquiries.destroy');
        });


    //Contact
        Route::group(['middleware' => ['can:Contact-Contact']], function () {
            Route::get('/contact/datatable', [ContactController::class ,'datatable'])->name('contact.datatable');
            Route::get('/contact', [ContactController::class ,'index'])->name('contact');
        });
        Route::group(['middleware' => ['can:Contact-delete']], function () {
            Route::delete('/contact/destroy', [ContactController::class, 'destroy'])->name('contact.destroy');
        });


    //Sell List
        Route::group(['middleware' => ['can:Listings']], function () {
            Route::get('/sell_list/datatable', [SellController::class ,'datatable'])->name('sell_list.datatable');
            Route::get('/sell_list', [SellController::class ,'index'])->name('sell_list');
            Route::get('/sell_list/{id}', [SellController::class ,'show'])->name('sell_list.show');
        });
        Route::group(['middleware' => ['can:Listings-delete']], function () {
            Route::delete('/sell_list/destroy', [SellController::class, 'destroy'])->name('sell_list.destroy');
        });

    // vacancies
        Route::group(['middleware' => ['can:Applicants']], function () {
            Route::get('/vacancies', [VacanciesController::class, 'index'])->name('vacancies');
            Route::get('/vacancies/datatable', [VacanciesController::class, 'datatable'])->name('vacancies.datatable');
            Route::get('/vacancies/create', [VacanciesController::class, 'create'])->name('vacancies.create');
            Route::post('/vacancies/store', [VacanciesController::class, 'store'])->name('vacancies.store');
            Route::patch('/vacancies/status', [VacanciesController::class, 'status'])->name('vacancies.status');
            Route::get('/vacancies/{vacancies}/edit', [VacanciesController::class, 'edit'])->name('vacancies.edit');
            Route::put('/vacancies/{vacancies}/update', [VacanciesController::class, 'update'])->name('vacancies.update');
            Route::delete('/vacancies/destroy', [VacanciesController::class, 'destroy'])->name('vacancies.destroy');
        });

    //insights
        Route::group(['middleware' => ['can:insights']], function () {
            Route::get('/insights', [insightsController::class, 'index'])->name('insights');
        });
        Route::group(['middleware' => ['can:insights-add']], function () {
            Route::post('/insights/store-csv', [insightsController::class, 'csvTest'])->name('insight.csvTest');
        });
        Route::get('/insights/datatable/property_Price_Per_Sqft', [insightsController::class, 'datatable_property_Price_Per_Sqft'])->name('insight.datatable_property_Price_Per_Sqft');
        Route::get('/insights/create-property-Price-Per-Sqft', [insightsController::class, 'create_property_Price_Per_Sqft'])->name('insight.create_property_Price_Per_Sqft');
        Route::post('/insights/store-property-Price-Per-Sqft', [insightsController::class, 'store_property_Price_Per_Sqft'])->name('insight.store_property_Price_Per_Sqft');
        Route::get('/insights/{property_Price_Per_Sq}/edit-property-Price-Per-Sq', [insightsController::class, 'edit_property_Price_Per_Sqft'])->name('insight.edit_property_Price_Per_Sqft');
        Route::put('/insights/{property_Price_Per_Sq}/update-property-Price-Per-Sq', [insightsController::class, 'update_property_Price_Per_Sqft'])->name('insight.update_property_Price_Per_Sqft');
        Route::delete('/insights/destroy-property-Price-Per-Sqft', [insightsController::class, 'destroy_property_Price_Per_Sqft'])->name('insight.destroy_property_Price_Per_Sqft');

        Route::get('/insights/datatable/property_sales_value', [insightsController::class, 'datatable_property_sales_value'])->name('insight.datatable_property_sales_value');
        Route::get('/insights/create-property-sales-value', [insightsController::class, 'create_property_sales_value'])->name('insight.create_property_sales_value');
        Route::post('/insights/store-property-sales-value', [insightsController::class, 'store_property_sales_value'])->name('insight.store_property_sales_value');
        Route::get('/insights/{propertySalesValue}/edit-property-sales-value', [insightsController::class, 'edit_property_sales_value'])->name('insight.edit_property_sales_value');
        Route::put('/insights/{propertySalesValue}/update-property-sales-value', [insightsController::class, 'update_property_sales_value'])->name('insight.update_property_sales_value');
        Route::delete('/insights/destroy-property-sales-value', [insightsController::class, 'destroy_property_sales_value'])->name('insight.destroy_property_sales_value');

        Route::get('/insights/datatable/top_performing_areas', [insightsController::class, 'datatable_top_performing_areas'])->name('insight.datatable_top_performing_areas');
        Route::get('/insights/create-top_performing_areas', [insightsController::class, 'create_top_performing_areas'])->name('insight.create_top_performing_areas');
        Route::post('/insights/store-top_performing_areas', [insightsController::class, 'store_top_performing_areas'])->name('insight.store_top_performing_areas');
        Route::get('/insights/{topPerformingAreas}/edit-top-performing-areas', [insightsController::class, 'edit_top_performing_areas'])->name('insight.edit_top_performing_areas');
        Route::put('/insights/{topPerformingAreas}/update-top-performing-areas', [insightsController::class, 'update_top_performing_areas'])->name('insight.update_top_performing_areas');
        Route::delete('/insights/destroy-top-performing-areas', [insightsController::class, 'destroy_top_performing_areas'])->name('insight.destroy_top_performing_areas');

    //Property Type
        Route::group(['middleware' => ['can:Listings']], function () {   
            Route::get('/property-type', [propertyTypeController::class, 'index'])->name('property-type');
            Route::get('/property-type/datatable', [propertyTypeController::class, 'datatable'])->name('property-type.datatable');
            Route::get('/property-type/create', [propertyTypeController::class, 'create'])->name('property-type.create');
            Route::post('/property-type/store', [propertyTypeController::class, 'store'])->name('property-type.store');
            Route::get('/property-type/{property_type}/edit', [propertyTypeController::class, 'edit'])->name('property-type.edit');
            Route::put('/property-type/{property_type}/update', [propertyTypeController::class, 'update'])->name('property-type.update');
            Route::delete('/property-type/destroy', [propertyTypeController::class, 'destroy'])->name('property-type.destroy');
        });
    
    //Applicants
        Route::group(['middleware' => ['can:Applicants']], function () {
            Route::get('/applicants', [ApplicantsController::class, 'index'])->name('applicants');
            Route::get('/applicant/datatable', [ApplicantsController::class, 'datatable'])->name('applicant.datatable');
        });


    //Mortgage-Applicants
        Route::group(['middleware' => ['can:Mortgage Applications']], function () {
            Route::get('/mortgage-requests', [mortgageLoanController::class, 'index'])->name('mortgage-requests');
            Route::get('/mortgage/datatable', [mortgageLoanController::class, 'datatable'])->name('mortgage-requests.datatable');    
        });
        Route::group(['middleware' => ['can:Mortgage Applicants-approve']], function () {
            Route::patch('/mortgage/status', [mortgageLoanController::class, 'status'])->name('mortgage-requests.status');
        });


    //Keywords
        Route::get('/keywords', [KeywordsController::class, 'index'])->name('keywords');
        Route::get('/keywords/datatable', [KeywordsController::class, 'datatable'])->name('keywords.datatable');
        Route::get('/keywords/create', [KeywordsController::class, 'create'])->name('keywords.create');
        Route::post('/keywords/store', [KeywordsController::class, 'store'])->name('keywords.store');

    //Home Carousel
        Route::get('/Home-Carousel', [HomeCarouselController::class, 'index'])->name('HomeCarousel');

        Route::get('/Home-Carousel/datatable', [HomeCarouselController::class, 'datatable'])->name('HomeCarousel.datatable');
        Route::get('/Home-Carousel/create', [HomeCarouselController::class, 'create'])->name('HomeCarousel.create');
        Route::post('/Home-Carousel/store', [HomeCarouselController::class, 'store'])->name('HomeCarousel.store');
        Route::get('/Home-Carousel/{homeCarousel}/edit', [HomeCarouselController::class, 'edit'])->name('HomeCarousel.edit');

        Route::put('/Home-Carousel/{homeCarousel}/update', [HomeCarouselController::class, 'update'])->name('HomeCarousel.update');
        Route::delete('/Home-Carousel/destroy', [HomeCarouselController::class, 'destroy'])->name('HomeCarousel.destroy');

    //Home Section two 
        Route::get('/Home-Section-Two/datatable', [HomePageSectionTwoContentController::class, 'datatable'])->name('HomeSectionTwo.datatable');
    
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/login/store', [LoginController::class, 'store'])->name('login.store');

Route::get('/signup', [SignUpController::class, 'index'])->name('signup');
Route::post('/signup/store', [SignUpController::class, 'signup'])->name('signup.store');