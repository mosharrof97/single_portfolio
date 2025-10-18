@extends('frontend.partial.layout')
@section('content')

    {{-- ============ Slider ============= --}}
    <section id="home-section" class="hero">
        <div class="home-slider  owl-carousel">
            @if (!empty($user->slider) && $user->slider->count())
                @foreach ($user->slider as $data)
                    <div class="slider-item ">
                        <div class="overlay"></div>
                        <div class="container">
                            <div class="row d-md-flex no-gutters slider-text align-items-end justify-content-end"
                                data-scrollax-parent="true">
                                <div class="one-third js-fullheight order-md-last img"
                                    style="background-image:url('{{ asset($data && $data->image ? 'assets/img/user/slider/' . $data->image : 'assets/img/bg_1.png') }}');">
                                    <div class="overlay"></div>
                                </div>
                                <div class="one-forth d-flex  align-items-center ftco-animate"
                                    data-scrollax=" properties: { translateY: '70%' }">
                                    <div class="text home-slider-text">
                                        <span
                                            class="subheading">{{ $data && $data->title ? $data->title : 'Hello!' }}</span>
                                        <h1 class="mb-4 mt-3">
                                            {{ $data && $data->sub_title ? $data->sub_title : `I a'm <span>Clark Thompson</span>` }}
                                        </h1>
                                        <h5 class="mb-4">
                                            {{ $data && $data->desc ? $data->desc : 'A Freelance Web Designer' }}</h5>
                                        <p>
                                            <a href="#" class="btn btn-primary py-md-3 py-1 px-md-4 px-2">Hire me</a>
                                            <a href="#"
                                                class="btn btn-white btn-outline-white py-md-3 py-1 px-md-4 px-2">My
                                                works</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="slider-item">
                    <div class="overlay"></div>
                    <div class="container">
                        <div class="row d-flex no-gutters slider-text align-items-end justify-content-end"
                            data-scrollax-parent="true">
                            <div class="one-third js-fullheight order-md-last img"
                                style="background-image:url('{{ asset('assets/img/bg_2.png') }}');">
                                <div class="overlay"></div>
                            </div>
                            <div class="one-forth d-flex align-items-center ftco-animate"
                                data-scrollax=" properties: { translateY: '70%' }">
                                <div class="text">
                                    <span class="subheading">Hello!</span>
                                    <h1 class="mb-4 mt-3">I'm a <span>web designer</span> based in London</h1>
                                    <p><a href="#" class="btn btn-primary py-3 px-4">Hire me</a> <a href="#"
                                            class="btn btn-white btn-outline-white py-3 px-4">My works</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>
    {{-- ============ Slider ============= --}}

    {{-- ============ About ============= --}}
    <section class="ftco-about img ftco-section ftco-no-pb" id="about-section">
        <div class="container">
            <div class="row justify-content-center pb-md-5">
                <div class="col-md-10 heading-section text-center ftco-animate">
                    <h1 class="big big-2">
                        {{ userFrontendSetting('about_title_desc') !== null ? userFrontendSetting('about_title_desc')->bg_title : 'Resume' }}
                    </h1>
                    <h2 class="mb-4">
                        {{ userFrontendSetting('about_title_desc') !== null ? userFrontendSetting('about_title_desc')->title : 'Resume' }}
                    </h2>
                    <p>{{ userFrontendSetting('about_title_desc') !== null ? userFrontendSetting('about_title_desc')->desc : 'A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.' }}
                    </p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 col-lg-4 d-flex">
                    <div class="img-about img d-flex align-items-stretch">
                        <div class="overlay"></div>
                        <div class="img d-flex align-self-stretch align-items-center"
                            style="background-image:url('{{ asset('assets/img/personal/' . $user->personal->image) }}');">
                        </div>
                    </div>
                </div>


                <div class="col-md-6 col-lg-8 pl-lg-5 pb-md-5">
                    <div class="row justify-content-start pb-3">
                        <div class="col-md-12 heading-section ftco-animate">
                            <ul class="about-info mt-4 px-md-0 px-2">
                                {{-- <li class="d-flex" style="color: rgb(136 137 138)"><span>Name:</span> <span>{{ $user->personal ? $user->personal->first_name.' '.$user->personal->last_name : 'Md Mosharrof Hosain' }}</span></li>
                            <li class="d-flex" style="color: rgb(136 137 138)"><span>Date of birth:</span> <span>{{ $user->personal ? $user->personal->date_of_birth->format('d-M-Y') : '10-jan-2000' }}</span></li>
                            <li class="d-flex" style="color: rgb(136 137 138)"><span>Address:</span> <span>{{ $user->address ? $user->address->present_village.', '.$user->address->present_office.', '.$user->address->present_thana.', '.$user->address->present_district.', '.$user->address->present_country : 'Dhaka, Bangladesh'}}</span></li>
                            <li class="d-flex" style="color: rgb(136 137 138)"><span>Email:</span> <span>{{ $user->personal ? $user->personal->email : 'test@exmple.com'}}</span></li>
                            <li class="d-flex" style="color: rgb(136 137 138)"><span>Phone: </span> <span>{{ $user->personal ? $user->personal->mobile : '+8801700-000000'}}</span></li> --}}

                                <li><span>Birthday</span> :
                                    <span>{{ $user->personal ? $user->personal->date_of_birth->format('d-M-Y') : '10-jan-2000' }}</span>
                                </li>
                                <li><span>Phone</span> :
                                    <span>{{ $user->personal ? $user->personal->mobile : '+8801700-000000' }}</span></li>
                                <li><span>Email</span> :
                                    <span>{{ $user->personal ? $user->personal->email : 'test@exmple.com' }}</span></li>
                                <li><span>From</span> :
                                    <span>{{ $user->address ? $user->address->present_village . ', ' . $user->address->present_office . ', ' . $user->address->present_thana . ', ' . $user->address->present_district . ', ' . $user->address->present_country : 'Dhaka, Bangladesh' }}</span>
                                </li>
                                <li><span>Language</span> : <span>{{ $user->language ? $user->language->language :'Bangla, English' }}</span></li>
                                <li><span>Full Time Job</span> : <span>Available</span></li>
                                <li><span>Freelance</span> : <span>Available</span></li>

                            </ul>
                        </div>
                    </div>
                    <div class="counter-wrap ftco-animate d-flex mt-md-3">
                        <div class="text">
                            <p class="mb-4">
                                <span class="number" data-number="{{ $user->project->count() }}">0</span>
                                <span>Project complete</span>
                            </p>
                            <p><a href="#" class="btn btn-primary py-md-3 py-1 px-3">Download CV</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- ============ About ============= --}}

    {{-- ============ Resume ============= --}}
    <section class="ftco-section ftco-no-pb" id="resume-section">
        <div class="container">
            <div class="row justify-content-center pb-md-5">
                <div class="col-md-10 heading-section text-center ftco-animate">
                    <h1 class="big big-2">
                        {{ userFrontendSetting('resume_title_desc') !== null ? userFrontendSetting('resume_title_desc')->bg_title : 'Resume' }}
                    </h1>
                    <h2 class="mb-4">
                        {{ userFrontendSetting('resume_title_desc') !== null ? userFrontendSetting('resume_title_desc')->title : 'Resume' }}
                    </h2>
                    <p>{{ userFrontendSetting('resume_title_desc') !== null ? userFrontendSetting('resume_title_desc')->desc : 'A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.' }}
                    </p>
                </div>
            </div>
            <div class="row">

                @if (!empty($user->education))
                    @foreach ($user->education as $data)
                        <div class="col-md-6">
                            <div class="resume-wrap ftco-animate">
                                <span class="date">{{ $data->edu_level }}</span>
                                <h4>{{ $data->passing_year }}</h4>
                                <h5 class="">{{ $data->institute_name }}</h5>
                                <p class="mt-4">A small river named Duden flows by their place and supplies it with the
                                    necessary regelialia. It is a paradisematic country, in which roasted parts of sentences
                                    fly into your mouth.</p>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-md-6">
                        <div class="resume-wrap ftco-animate">
                            <span class="date">2014-2015</span>
                            <h2>Master Degree of Design</h2>
                            <span class="position">Cambridge University</span>
                            <p class="mt-4">A small river named Duden flows by their place and supplies it with the
                                necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly
                                into your mouth.</p>
                        </div>
                        <div class="resume-wrap ftco-animate">
                            <span class="date">2014-2015</span>
                            <h2>Bachelor's Degree of C.A</h2>
                            <span class="position">Cambridge University</span>
                            <p class="mt-4">A small river named Duden flows by their place and supplies it with the
                                necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly
                                into your mouth.</p>
                        </div>
                        <div class="resume-wrap ftco-animate">
                            <span class="date">2014-2015</span>
                            <h2>Diploma in Computer</h2>
                            <span class="position">Cambridge University</span>
                            <p class="mt-4">A small river named Duden flows by their place and supplies it with the
                                necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly
                                into your mouth.</p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="resume-wrap ftco-animate">
                            <span class="date">2014-2015</span>
                            <h2>Art &amp; Creative Director</h2>
                            <span class="position">Cambridge University</span>
                            <p class="mt-4">A small river named Duden flows by their place and supplies it with the
                                necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly
                                into your mouth.</p>
                        </div>
                        <div class="resume-wrap ftco-animate">
                            <span class="date">2014-2015</span>
                            <h2>Wordpress Developer</h2>
                            <span class="position">Cambridge University</span>
                            <p class="mt-4">A small river named Duden flows by their place and supplies it with the
                                necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly
                                into your mouth.</p>
                        </div>
                        <div class="resume-wrap ftco-animate">
                            <span class="date">2017-2018</span>
                            <h2>UI/UX Designer</h2>
                            <span class="position">Cambridge University</span>
                            <p class="mt-4">A small river named Duden flows by their place and supplies it with the
                                necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly
                                into your mouth.</p>
                        </div>
                    </div>
                @endif



            </div>
            <div class="row justify-content-center mt-md-5">
                <div class="col-md-6 text-center ftco-animate">
                    <p><a href="#" class="btn btn-primary py-md-4 py-1 px-4">Download CV</a></p>
                </div>
            </div>
        </div>
    </section>
    {{-- ============ Resume ============= --}}

    {{-- ============ Services ============= --}}
    <section class="ftco-section" id="services-section">
        <div class="container">
            <div class="row justify-content-center py-5 mt-5">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <h1 class="big big-2">
                        {{ userFrontendSetting('service_title_desc') !== null ? userFrontendSetting('service_title_desc')->bg_title : 'Services' }}
                    </h1>
                    <h2 class="mb-4">
                        {{ userFrontendSetting('service_title_desc') !== null ? userFrontendSetting('service_title_desc')->title : 'Services' }}
                    </h2>
                    <p>{{ userFrontendSetting('service_title_desc') !== null ? userFrontendSetting('service_title_desc')->desc : 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia' }}
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 text-center d-flex ftco-animate">
                    <div class="services-1">
                        <span class="icon">
                            <i class="fas fa-chart-pie" style="color: #ffffff;"></i>
                            {{-- <i class="flaticon-analysis"></i> --}}
                        </span>
                        <div class="desc mb-3">
                            <h5 class="">{{ userFrontendService('service_1')->name }}</h5>
                            <p>{{ userFrontendService('service_1')->desc }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 text-center d-flex ftco-animate">
                    <div class="services-1">
                        <span class="icon">
                            <i class="flaticon-flasks"></i>
                        </span>
                        <div class="desc mb-3">
                            <h5 class="">
                                {{ userFrontendService('service_2')->name ?? 'Phtography' }}</h5>
                            <p>{{ userFrontendService('service_2')->desc ?? 'I have knowledge in designing Entity-Relationship (ER) diagrams for databases.' }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 text-center d-flex ftco-animate">
                    <div class="services-1">
                        <span class="icon">
                            <i class="flaticon-ideas"></i>
                        </span>
                        <div class="desc mb-3">
                            <h5 class="">
                                {{ userFrontendService('service_3')->name ?? 'Web Developer' }}</h5>
                            <p>{{ userFrontendService('service_3')->desc ?? 'I have knowledge in designing Entity-Relationship (ER) diagrams for databases.' }}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 text-center d-flex ftco-animate">
                    <div class="services-1">
                        <span class="icon">
                            <i class="flaticon-analysis"></i>
                        </span>
                        <div class="desc mb-3">
                            <h5 class="">
                                {{ userFrontendService('service_4')->name ?? 'App Developing' }}</h5>
                            <p>{{ userFrontendService('service_4')->desc ?? 'I have knowledge in designing Entity-Relationship (ER) diagrams for databases.' }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 text-center d-flex ftco-animate">
                    <div class="services-1">
                        <span class="icon">
                            <i class="flaticon-flasks"></i>
                        </span>
                        <div class="desc mb-3">
                            <h5 class="">{{ userFrontendService('service_5')->name ?? 'Branding' }}
                            </h5>
                            <p>{{ userFrontendService('service_5')->desc ?? 'I have knowledge in designing Entity-Relationship (ER) diagrams for databases.' }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 text-center d-flex ftco-animate">
                    <div class="services-1">
                        <span class="icon">
                            <i class="flaticon-ideas"></i>
                        </span>
                        <div class="desc mb-3">
                            <h5 class="">
                                {{ userFrontendService('service_6')->name ?? 'Product Strategy' }}</h5>
                            <p>{{ userFrontendService('service_6')->desc ?? 'I have knowledge in designing Entity-Relationship (ER) diagrams for databases.' }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- ============ Services ============= --}}

    {{-- ============ Skill ============= --}}
    <section class="ftco-section" id="skills-section">
        <div class="container">
            <div class="row justify-content-center pb-5">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <h1 class="big big-2">
                        {{ userFrontendSetting('skill_title_desc') !== null ? userFrontendSetting('skill_title_desc')->bg_title : 'Skills' }}
                    </h1>
                    <h2 class="mb-4">
                        {{ userFrontendSetting('skill_title_desc') !== null ? userFrontendSetting('skill_title_desc')->title : 'My Skills' }}
                    </h2>
                    <p>{{ userFrontendSetting('skill_title_desc') !== null ? userFrontendSetting('skill_title_desc')->desc : 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia' }}
                    </p>
                </div>
            </div>
            <div class="row">
                @if (!empty($user->skill) && $user->skill->count())
                    @foreach ($user->skill as $data)
                        <div class="col-md-6 animate-box">
                            <div class="progress-wrap ftco-animate">
                                <h3>{{ $data->skill }}</h3>
                                <div class="progress">
                                    <div class="progress-bar color-1" role="progressbar"
                                        aria-valuenow="{{ $data->progress }}" aria-valuemin="0" aria-valuemax="100"
                                        style="width:90%">
                                        <span>{{ $data->progress }}%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-md-6 animate-box">
                        <div class="progress-wrap ftco-animate">
                            <h3>Photoshop</h3>
                            <div class="progress">
                                <div class="progress-bar color-1" role="progressbar" aria-valuenow="90"
                                    aria-valuemin="0" aria-valuemax="100" style="width:90%">
                                    <span>90%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 animate-box">
                        <div class="progress-wrap ftco-animate">
                            <h3>jQuery</h3>
                            <div class="progress">
                                <div class="progress-bar color-2" role="progressbar" aria-valuenow="85"
                                    aria-valuemin="0" aria-valuemax="100" style="width:85%">
                                    <span>85%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 animate-box">
                        <div class="progress-wrap ftco-animate">
                            <h3>HTML5</h3>
                            <div class="progress">
                                <div class="progress-bar color-3" role="progressbar" aria-valuenow="95"
                                    aria-valuemin="0" aria-valuemax="100" style="width:95%">
                                    <span>95%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 animate-box">
                        <div class="progress-wrap ftco-animate">
                            <h3>CSS3</h3>
                            <div class="progress">
                                <div class="progress-bar color-4" role="progressbar" aria-valuenow="90"
                                    aria-valuemin="0" aria-valuemax="100" style="width:90%">
                                    <span>90%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 animate-box">
                        <div class="progress-wrap ftco-animate">
                            <h3>WordPress</h3>
                            <div class="progress">
                                <div class="progress-bar color-5" role="progressbar" aria-valuenow="70"
                                    aria-valuemin="0" aria-valuemax="100" style="width:70%">
                                    <span>70%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 animate-box">
                        <div class="progress-wrap ftco-animate">
                            <h3>SEO</h3>
                            <div class="progress">
                                <div class="progress-bar color-6" role="progressbar" aria-valuenow="80"
                                    aria-valuemin="0" aria-valuemax="100" style="width:80%">
                                    <span>80%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
    {{-- ============ Skill ============= --}}

    {{-- ============ Project ============= --}}
    <section class="ftco-section ftco-project" id="projects-section">
        <div class="container">
            <div class="row justify-content-center pb-5">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <h1 class="big big-2">
                        {{ userFrontendSetting('project_title_desc') !== null ? userFrontendSetting('project_title_desc')->bg_title : 'Projects' }}
                    </h1>
                    <h2 class="mb-4">
                        {{ userFrontendSetting('project_title_desc') !== null ? userFrontendSetting('project_title_desc')->title : 'Our Projects' }}
                    </h2>
                    <p>{{ userFrontendSetting('project_title_desc') !== null ? userFrontendSetting('project_title_desc')->desc : 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia' }}
                    </p>
                </div>
            </div>
            <div class="row">
                @if (!empty($user->project) && $user->project->count())
                    @foreach ($user->project as $data)
                        <div class="col-lg-4 col-sm-6 my-1">
                            <div class="card" style="border: none; border-radius: 2%; overflow: hidden;">
                                <div class="project img ftco-animate d-flex justify-content-end align-items-end"
                                    style="background-image: url('{{ asset($data->image ? 'assets/img/user/project/' . $data->image : 'assets/img/project-4.jpg') }}');">
                                    <div class="overlay"></div>
                                    {{-- <div class="portfolio-links"> --}}
                                    {{-- <a href="{{ asset($data->image ? 'assets/img/user/project/'.$data->image:'assets/img/project-4.jpg')}}" data-gallery="portfolioGallery" class="btn btn-primary text m-3" title=""><i class="bx bx-plus"></i></a> --}}
                                    {{-- <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a> --}}
                                    {{-- </div> --}}
                                    <a href="{{ $data->url }}" target="_blank" class="btn btn-primary text m-3">Live
                                        Preview</a>
                                </div>
                                <div class="text text-center p-0 pb-4">
                                    <span><a href="{{ $data->url }}" style="color: black;"
                                            target="_blank">{{ $data->title }}</a></span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-md-4">
                        <div class="project img ftco-animate d-flex justify-content-center align-items-center"
                            style="background-image: url('{{ asset('assets/img/project-4.jpg') }}');">
                            <div class="overlay"></div>
                            <div class="text text-center p-4">
                                <h3><a href="#">Branding &amp; Illustration Design</a></h3>
                                <span>Web Design</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="project img ftco-animate d-flex justify-content-center align-items-center"
                            style="background-image: url('{{ asset('assets/img/project-5.jpg') }}');">
                            <div class="overlay"></div>
                            <div class="text text-center p-4">
                                <h3><a href="#">Branding &amp; Illustration Design</a></h3>
                                <span>Web Design</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="project img ftco-animate d-flex justify-content-center align-items-center"
                            style="background-image: url('{{ asset('assets/img/project-1.jpg') }}');">
                            <div class="overlay"></div>
                            <div class="text text-center p-4">
                                <h3><a href="#">Branding &amp; Illustration Design</a></h3>
                                <span>Web Design</span>
                            </div>
                        </div>

                        <div class="project img ftco-animate d-flex justify-content-center align-items-center"
                            style="background-image: url('{{ asset('assets/img/project-6.jpg') }}');">
                            <div class="overlay"></div>
                            <div class="text text-center p-4">
                                <h3><a href="#">Branding &amp; Illustration Design</a></h3>
                                <span>Web Design</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="project img ftco-animate d-flex justify-content-center align-items-center"
                                    style="background-image: url('{{ asset('assets/img/project-2.jpg') }}');">
                                    <div class="overlay"></div>
                                    <div class="text text-center p-4">
                                        <h3><a href="#">Branding &amp; Illustration Design</a></h3>
                                        <span>Web Design</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="project img ftco-animate d-flex justify-content-center align-items-center"
                                    style="background-image: url('{{ asset('assets/img/project-3.jpg') }}');">
                                    <div class="overlay"></div>
                                    <div class="text text-center p-4">
                                        <h3><a href="#">Branding &amp; Illustration Design</a></h3>
                                        <span>Web Design</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
    {{-- ============ Project ============= --}}


    {{-- ============ Blog ============= --}}
    <section class="ftco-section" id="blog-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-5">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <h1 class="big big-2">
                        {{ userFrontendSetting('blog_title_desc') !== null ? userFrontendSetting('blog_title_desc')->bg_title : 'Blogs' }}
                    </h1>
                    <h2 class="mb-4">
                        {{ userFrontendSetting('blog_title_desc') !== null ? userFrontendSetting('blog_title_desc')->title : 'Our Blogs' }}
                    </h2>
                    <p>{{ userFrontendSetting('blog_title_desc') !== null ? userFrontendSetting('blog_title_desc')->desc : 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia' }}
                    </p>
                </div>
            </div>
            @if (!empty($user->blog) && $user->blog->count())
                @foreach ($user->blog as $data)
                    <div class="row d-flex">
                        <div class="col-md-4 d-flex ftco-animate">
                            <div class="blog-entry justify-content-end">
                                <a href="single.html" class="block-20"
                                    style="background-image: url('{{ asset($data->image ? 'assets/img/user/blog/' . $data->image : 'assets/img/image_1.jpg') }}');">
                                </a>
                                <div class="text mt-3 float-right d-block">
                                    <div class="d-flex align-items-center mb-3 meta">
                                        <p class="mb-0">
                                            <span class="mr-2">{{ $data->created_at->format('M d, Y') }}</span>
                                            <a href="#" class="mr-2">Admin</a>
                                            <a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a>
                                        </p>
                                    </div>
                                    <h3 class="heading"><a href="single.html">{{ $data->title }}</a></h3>
                                    <p class="content">{{ $data->desc }}</p>
                                </div>
                            </div>
                        </div>

                    </div>
                @endforeach
            @else
                <div class="row d-flex">
                    <div class="col-md-4 d-flex ftco-animate">
                        <div class="blog-entry justify-content-end">
                            <a href="single.html" class="block-20"
                                style="background-image: url('{{ asset('assets/img/image_1.jpg') }}');">
                            </a>
                            <div class="text mt-3 float-right d-block">
                                <div class="d-flex align-items-center mb-3 meta">
                                    <p class="mb-0">
                                        <span class="mr-2">June 21, 2019</span>
                                        <a href="#" class="mr-2">Admin</a>
                                        <a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a>
                                    </p>
                                </div>
                                <h3 class="heading"><a href="single.html">Why Lead Generation is Key for Business
                                        Growth</a></h3>
                                <p class="content">A small river named Duden flows by their place and supplies it with the
                                    necessary regelialia.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 d-flex ftco-animate">
                        <div class="blog-entry justify-content-end">
                            <a href="single.html" class="block-20"
                                style="background-image: url('{{ asset('assets/img/image_2.jpg') }}');">
                            </a>
                            <div class="text mt-3 float-right d-block">
                                <div class="d-flex align-items-center mb-3 meta">
                                    <p class="mb-0">
                                        <span class="mr-2">June 21, 2019</span>
                                        <a href="#" class="mr-2">Admin</a>
                                        <a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a>
                                    </p>
                                </div>
                                <h3 class="heading"><a href="single.html">Why Lead Generation is Key for Business
                                        Growth</a></h3>
                                <p class="content">A small river named Duden flows by their place and supplies it with the
                                    necessary regelialia.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 d-flex ftco-animate">
                        <div class="blog-entry">
                            <a href="single.html" class="block-20"
                                style="background-image: url('{{ asset('assets/img/image_3.jpg') }}');">
                            </a>
                            <div class="text mt-3 float-right d-block">
                                <div class="d-flex align-items-center mb-3 meta">
                                    <p class="mb-0">
                                        <span class="mr-2">June 21, 2019</span>
                                        <a href="#" class="mr-2">Admin</a>
                                        <a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a>
                                    </p>
                                </div>
                                <h3 class="heading"><a href="single.html">Why Lead Generation is Key for Business
                                        Growth</a></h3>
                                <p class="content">A small river named Duden flows by their place and supplies it with the
                                    necessary regelialia.</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

        </div>
    </section>
    {{-- ============ Blog ============= --}}



    {{-- ============ Awards ============= --}}
    <section class="ftco-section ftco-no-pt ftco-no-pb ftco-counter img" id="section-counter">
        <div class="container">
            <div class="row d-md-flex align-items-center">
                <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
                    <div class="block-18">
                        <div class="text">
                            <strong class="number"
                                data-number="{{ $user->award ? $user->award->count() : '100' }}">{{ $user->award ? $user->award->count() : '0' }}</strong>
                            <span>Awards</span>
                        </div>
                    </div>
                </div>
                <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
                    <div class="block-18">
                        <div class="text">
                            <strong class="number"
                                data-number="{{ $user->project ? $user->project->count() : '100' }}">{{ $user->project ? $user->project->count() : '0' }}</strong>
                            <span>Complete Projects</span>
                        </div>
                    </div>
                </div>
                <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
                    <div class="block-18">
                        <div class="text">
                            <strong class="number"
                                data-number="{{ $user->project ? $user->project->count() : '100' }}">{{ $user->project ? $user->project->count() : '0' }}</strong>
                            <span>Happy Customers</span>
                        </div>
                    </div>
                </div>
                <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
                    <div class="block-18">
                        <div class="text">
                            <strong class="number" data-number="500">0</strong>
                            <span>Cups of coffee</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- ============ Awards ============= --}}


    {{-- ============ Hire me ============= --}}
    <section class="ftco-section ftco-hireme img margin-top"
        style="background-image: url('{{ asset('assets/img/bg_1.jpg') }}')">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7 ftco-animate text-center">
                    <h2>{{ userFrontendSetting('hireme_title_desc') !== null ? userFrontendSetting('hireme_title_desc')->title : "I'm Available for freelancing" }}
                    </h2>
                    <p>{{ userFrontendSetting('hireme_title_desc') !== null ? userFrontendSetting('hireme_title_desc')->desc : 'A small river named Duden flows by their place and supplies it with the necessary regelialia.' }}
                    </p>
                    <p class="mb-0"><a href="#" class="btn btn-primary py-3 px-5">Hire me</a></p>
                </div>
            </div>
        </div>
    </section>
    {{-- ============ Hire me ============= --}}


    {{-- ============ Contact ============= --}}
    <section class="ftco-section contact-section ftco-no-pb" id="contact-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <h1 class="big big-2">
                        {{ userFrontendSetting('contact_title_desc') !== null ? userFrontendSetting('contact_title_desc')->bg_title : 'Contact' }}
                    </h1>
                    <h2 class="mb-4">
                        {{ userFrontendSetting('contact_title_desc') !== null ? userFrontendSetting('contact_title_desc')->title : 'Contact Me' }}
                    </h2>
                    <p>{{ userFrontendSetting('contact_title_desc') !== null ? userFrontendSetting('contact_title_desc')->desc : 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia' }}
                    </p>
                </div>
            </div>

            <div class="row d-flex contact-info mb-5">
                <div class="col-md-6 col-lg-3 d-flex ftco-animate">
                    <div class="align-self-stretch box p-4 text-center">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="icon-map-signs"></span>
                        </div>
                        <h3 class="mb-4">Address</h3>
                        <p>{{ $user->address ? $user->address->present_village . ', ' . $user->address->present_thana . ', ' . $user->address->present_district : '198 West 21th Street, Suite 721 New York NY 10016' }}
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 d-flex ftco-animate">
                    <div class="align-self-stretch box p-4 text-center">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="icon-phone2"></span>
                        </div>
                        <h3 class="mb-4">Contact Number</h3>
                        <p><a
                                href="tel://{{ $user ? $user->phone : '1235235598' }}">{{ $user ? $user->phone : '+ 1235 2355 98' }}</a>
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 d-flex ftco-animate">
                    <div class="align-self-stretch box p-4 text-center">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="icon-paper-plane"></span>
                        </div>
                        <h3 class="mb-4">Email Address</h3>
                        <p><a
                                href="mailto:{{ $user ? $user->email : 'info@yoursite.com' }}">{{ $user ? $user->email : 'info@yoursite.com' }}</a>
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 d-flex ftco-animate">
                    <div class="align-self-stretch box p-4 text-center">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="icon-globe"></span>
                        </div>
                        <h3 class="mb-4">Website</h3>
                        <p><a href="#">yoursite.com</a></p>
                    </div>
                </div>
            </div>

            <div class="row no-gutters block-9">
                <div class="col-md-6 order-md-last d-flex">
                    <form action="#" class="bg-light p-4 p-md-5 contact-form">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Your Name">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Your Email">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Subject">
                        </div>
                        <div class="form-group">
                            <textarea name="" id="" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
                        </div>
                    </form>

                </div>

                <div class="col-md-6 d-flex">
                    <div class="img" style="background-image: url('{{ asset('assets/img/about.jpg') }}');"></div>
                </div>
            </div>
        </div>
    </section>
    {{-- ============ Contact ============= --}}

    {{-- <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script> --}}

    <script>
        $(document).ready(function() {
            postContent('.content', 200);

            function postContent(selector, length) {
                $(selector).each(function() {
                    let fullText = $(this).html().trim();
                    let maxLength = length;

                    if (fullText.length > maxLength) {
                        let truncatedText = fullText.substring(0, maxLength) + '......';
                        $(this).html(truncatedText);
                    }
                });
            }
        });
    </script>
@endsection
