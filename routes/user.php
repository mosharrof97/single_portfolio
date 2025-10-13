<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\RegisteredController;
use App\Http\Controllers\Backend\UserDashboardController;
use App\Http\Controllers\Backend\PersonalDetailsController;
use App\Http\Controllers\Backend\AddressDetailsController;
use App\Http\Controllers\Backend\CareerApplicationController;
use App\Http\Controllers\Backend\AcademicEducationController;
use App\Http\Controllers\Backend\TrainingController;
use App\Http\Controllers\Backend\ProfessionalCertificationController;
use App\Http\Controllers\Backend\EmploymentController;
use App\Http\Controllers\Backend\SkillController;
use App\Http\Controllers\Backend\LanguageController;
use App\Http\Controllers\Backend\SocialMediaController;
use App\Http\Controllers\Backend\ProjectController;
use App\Http\Controllers\Backend\PublicationController;
use App\Http\Controllers\Backend\AwardController;

use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Backend\ServiceController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\SettingController;

Route::middleware('userguest')->group(function () {
    // Route::prefix('user')->group(function () {
        Route::get('/login', [AuthController::class, 'index'])->name('login');
        Route::post('/login', [AuthController::class, 'store']);
        Route::get('/signup', [RegisteredController::class, 'create'])->name('register');
        Route::post('/signup', [RegisteredController::class, 'store']);
        
    // });
    
});

Route::middleware('user')->group(function () {
    Route::prefix('user')->group(function () {
        Route::get('/dashboard',[UserDashboardController::class, 'index'])->name('dashboard');
        
        Route::prefix('personal-details')->group(function () {            
                Route::get('/', [PersonalDetailsController::class,'index'])->name('personal.details');
                Route::post('/', [PersonalDetailsController::class,'store']);
                Route::put('/update', [PersonalDetailsController::class,'update'])->name('personal.details.update');
                Route::put('/update-image', [PersonalDetailsController::class,'updateImage'])->name('personal.details.update.image');
                Route::put('/delete-image', [PersonalDetailsController::class,'destroy'])->name('personal.details.delete.image');
        });

        Route::prefix('address-details')->group(function () {            
            Route::get('/', [AddressDetailsController::class,'index'])->name('address.details');
            Route::get('/thana', [AddressDetailsController::class,'thana'])->name('address.details.thana');
            Route::post('/', [AddressDetailsController::class,'store']);
            Route::put('/update', [AddressDetailsController::class,'update'])->name('address.details.update');
            
        });

        Route::prefix('career-application')->group(function () {            
            Route::get('/', [CareerApplicationController::class,'index'])->name('career.application');
            Route::post('/', [CareerApplicationController::class,'store']);
            Route::put('/update', [CareerApplicationController::class,'update'])->name('career.application.update');
            
        });

        Route::prefix('education')->group(function () {            
            Route::get('/', [AcademicEducationController::class,'index'])->name('education');
            Route::post('/', [AcademicEducationController::class,'store']);
            Route::put('/update/{id}', [AcademicEducationController::class,'update'])->name('education.update');
            Route::get('/delete/{id}', [AcademicEducationController::class,'destroy'])->name('education.delete');
            
        });

        Route::prefix('training')->group(function () {            
            Route::get('/', [TrainingController::class,'index'])->name('training');
            Route::post('/', [TrainingController::class,'store']);
            Route::put('/update/{slug}', [TrainingController::class,'update'])->name('training.update');
            Route::get('/delete/{slug}', [TrainingController::class,'destroy'])->name('training.delete');
            
        });

        Route::prefix('certification')->group(function () {            
            Route::get('/', [ProfessionalCertificationController::class,'index'])->name('certification');
            Route::post('/', [ProfessionalCertificationController::class,'store']);
            Route::put('/update/{slug}', [ProfessionalCertificationController::class,'update'])->name('certification.update');
            Route::get('/delete/{slug}', [ProfessionalCertificationController::class,'destroy'])->name('certification.delete');
            
        });

        Route::prefix('employment')->group(function () {            
            Route::get('/', [EmploymentController::class,'index'])->name('employment');
            Route::post('/', [EmploymentController::class,'store']);
            Route::put('/update/{slug}', [EmploymentController::class,'update'])->name('employment.update');
            Route::get('/delete/{slug}', [EmploymentController::class,'destroy'])->name('employment.delete');
            
        });

        Route::prefix('skill')->group(function () {            
            Route::get('/', [SkillController::class,'index'])->name('skill');
            Route::post('/', [SkillController::class,'store']);
            Route::put('/update/{slug}', [SkillController::class,'update'])->name('skill.update');
            Route::get('/delete/{slug}', [SkillController::class,'destroy'])->name('skill.delete');

            Route::match(['post', 'put'], '/description', [SkillController::class,'description'])->name('skill.desc');
            Route::match(['post', 'put'], '/activities', [SkillController::class,'activities'])->name('activities');
        });

        Route::prefix('language')->group(function () {            
            Route::get('/', [LanguageController::class,'index'])->name('language');
            Route::post('/', [LanguageController::class,'store']);
            Route::put('/update/{slug}', [LanguageController::class,'update'])->name('language.update');
            Route::get('/delete/{slug}', [LanguageController::class,'destroy'])->name('language.delete');
            
        });

        Route::prefix('social-media')->group(function () {            
            Route::get('/', [SocialMediaController::class,'index'])->name('socialmedia');
            Route::post('/', [SocialMediaController::class,'store']);
            Route::put('/update/{slug}', [SocialMediaController::class,'update'])->name('socialmedia.update');
            Route::get('/delete/{slug}', [SocialMediaController::class,'destroy'])->name('socialmedia.delete');
            
        });

        Route::prefix('project')->group(function () {            
            Route::get('/', [ProjectController::class,'index'])->name('project');
            Route::post('/', [ProjectController::class,'store']);
            Route::put('/update/{slug}', [ProjectController::class,'update'])->name('project.update');
            Route::get('/delete/{slug}', [ProjectController::class,'destroy'])->name('project.delete');
            
        });

        Route::prefix('publication')->group(function () {            
            Route::get('/', [PublicationController::class,'index'])->name('publication');
            Route::post('/', [PublicationController::class,'store']);
            Route::put('/update/{slug}', [PublicationController::class,'update'])->name('publication.update');
            Route::get('/delete/{slug}', [PublicationController::class,'destroy'])->name('publication.delete');
            
        });

        Route::prefix('award')->group(function () {            
            Route::get('/', [AwardController::class,'index'])->name('award');
            Route::post('/', [AwardController::class,'store']);
            Route::put('/update/{slug}', [AwardController::class,'update'])->name('award.update');
            Route::get('/delete/{slug}', [AwardController::class,'destroy'])->name('award.delete');
            
        });
    });

    Route::prefix('setting')->group(function () {
        
        Route::prefix('banner-slider')->group(function () {
            Route::get('/', [SliderController::class, 'index'])->name('slider');
            Route::post('/slider', [SliderController::class, 'store'])->name('slider.store');
            Route::put('/slider/update', [SliderController::class, 'update'])->name('slider.update');
            Route::get('/slider/{id}/delete', [SliderController::class, 'destroy'])->name('slider.delete');
    
            Route::match(['post', 'put'], '/banner', [BannerController::class, 'store'])->name('banner');
        });


        Route::prefix('service')->group(function () {
            Route::get('/', [ServiceController::class, 'index'])->name('service');    
            Route::get('/create', [ServiceController::class, 'create'])->name('service.create');    
            Route::post('/create', [ServiceController::class, 'store'])->name('service.store');
            Route::get('/edit/{slug}', [ServiceController::class, 'edit'])->name('service.edit');    
            Route::put('/edit/{slug}', [ServiceController::class, 'update']);
            Route::get('/delete/{slug}', [ServiceController::class, 'delete'])->name('service.delete');
        });


        Route::prefix('category')->group(function () {            
            Route::get('/', [CategoryController::class,'index'])->name('category');
            Route::post('/', [CategoryController::class,'store']);
            Route::put('/update/{slug}', [CategoryController::class,'update'])->name('category.update');
            Route::get('/delete/{slug}', [CategoryController::class,'destroy'])->name('category.delete');
        });

        Route::prefix('blog')->group(function () {            
            Route::get('/', [BlogController::class,'index'])->name('blog');
            Route::get('/create', [BlogController::class,'create'])->name('blog.create');
            Route::post('/create', [BlogController::class,'store']);
            Route::get('/single-post/{slug}', [BlogController::class,'show'])->name('blog.show');
            Route::get('/update/{slug}', [BlogController::class,'edit'])->name('blog.edit');
            Route::put('/update/{slug}', [BlogController::class,'update'])->name('blog.update');
            Route::put('/status/{slug}', [BlogController::class,'updateStatus'])->name('blog.update.status');
            Route::get('/delete/{slug}', [BlogController::class,'destroy'])->name('blog.delete');
            
        });

        Route::prefix('page_title_desc')->group(function () {
            Route::get('/', [SettingController::class, 'create'])->name('page_title_desc');    
            Route::match(['post', 'put'], '/', [SettingController::class, 'store']);
        });

    });


    Route::post('logout', [AuthController::class, 'destroy'])
    ->name('logout');

});