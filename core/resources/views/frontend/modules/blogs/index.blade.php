@extends('frontend.layouts.master')
@section('meta')
    <title>All Blogs | {{ get_option('title') }}</title>

    <meta property="og:title" content="{{get_option('title')}}">
    <meta property="og:description" content="{{ strip_tags( get_option('description')) }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ asset(get_option('meta_image')) }}">
    <meta property="og:site_name" content="{{ get_option('company_name') }}">
    <!-- Add more Open Graph tags as needed -->

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{get_option('title')}}">
    <meta name="twitter:description" content="{{ strip_tags( get_option('description')) }}">
    <meta name="twitter:image" content="{{ asset(get_option('meta_image')) }}">
    <!-- Add more Twitter meta tags as needed -->
@endsection

@section('content')
    <!-- <body> -->

    <!-- Preloader -->
    <div id="preloader">
        <div id="status"></div>
    </div>
    <!-- Preloader Ends -->

 


    <section class="container py-5">
        <div class="row">
            <div class="section-title  mb-4 pb-1 w-50">
                <h2 class="m-0">What's <span>Your Article Today?</span></h2>
            </div>
            <div class="col-md-12">
                <div class="custom-card card">
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label for="blogTitle" class="form-label">Blog Title</label>
                            <div class="futuristic-input-container">
                                <input type="text" class="futuristic-input" id="blogTitle"
                                    placeholder="Enter your blog title" required>
                                <span class="futuristic-border"></span>
                            </div>
                        </div>


                        <!-- Header -->
                        <label for="blogTitle" class="form-label">Blog Content</label>
                        <div class="writer_img mb-3">
                            <textarea placeholder="What's on your mind?" class="form-control editor"></textarea>
                        </div>
                        <!-- Actions -->

                        <!-- Actions -->
                        <div class="row">

                            <div class="col-md-4">
                                <select class="form-select custom-btn-light btn" aria-label="Select Category">
                                    <option selected>Category</option>
                                    <option value="1">Academic</option>
                                    <option value="2">University</option>
                                    <option value="3">Motivational</option>
                                    <option value="4">Career</option>
                                </select>
                            </div>

                            <div class="col-md-4">
                                <div class="custom-file-container">
                                    <input type="file" class="custom-file-input" id="thumbImage" accept="image/*">
                                    <label for="thumbImage" class="custom-file-label" id="fileLabel">Thumbnail
                                        Image <i class="ri-download-cloud-2-line"></i></label>
                                </div>
                            </div>

                            <div class="col-md-4 d-flex align-items-center">
                                <div class="form-group d-flex justify-content-around align-items-center ">
                                    <label class="form-label" style="font-weight: 600; color: #333;">Blog Type:</label>
                                    <div class="preferred-contact-options">
                                        <label class="radio-label">
                                            <input type="radio" name="contactMethod" value="free" required>
                                            <span>Free</span>
                                        </label>
                                        <label class="radio-label">
                                            <input type="radio" name="contactMethod" value="premium">
                                            <span>Premium</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <!-- Submit Button -->
                        <button class="custom-btn-primary btn w-100"> Post </button>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section class="about-us trending pb-0">
        <div class="container">
            <div class="about-image-box">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="section-title mb-4 pb-1">
                            <h3 class="m-0">Top New Post</h3>
                        </div>
                        <div class="trend-item position-relative d-flex align-items-center box-shadow p-4 mb-4">
                            <div class="premium-ribbon"
                                data-tooltip="If you want to read this blog | <a href='#' class='go-premium'>Go Premium</a>">
                                <img src="images/icon/premium.png" alt="Premium Blog">
                            </div>
                            <div class="row ">
                                <div class="col-lg-5 px-0">
                                    <div class="trend-image1">
                                        <a href="blog_details.html"
                                            style="background-image: url(images/blog/1.jpg);"></a>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="trend-content-main">

                                        <div class="trend-content">
                                            <h5 class="mb-2 theme">মোটিভেশন</h5>
                                            <h4 class="border-b pb-2"><a href="blog_details.html">আপনার ইংরেজি
                                                    শব্দভাণ্ডার বাড়ানোর ১০টি
                                                    কার্যকর উপায়</a></h4>
                                            <div
                                                class="entry-meta d-flex align-items-center justify-content-between border-b pb-2 mb-2">
                                                <a href="#"><i class="fa fa-calendar"></i> ৩রা ডিসেম্বর ২০২৪</a>
                                                <div class="entry-metalist d-flex align-items-center">
                                                    <ul>
                                                        <li class="me-2"><a href="#"><i class="fa fa-user"></i> এম.
                                                                রফিক</a></li>
                                                        <li class="me-2"><a href="#"><i class="fa fa-heart"></i> 5k</a>
                                                        </li>
                                                        <li><a href="#"><i class="fa fa-comments"></i> 5k</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <p class="mb-0">বাংলা লোরেম ইপসাম টেক্সট শুধুমাত্র প্রদর্শনের জন্য ব্যবহৃত
                                                হয়। এটি এমন একটি টেক্সট যা নকশা বা লেআউট প্রদর্শনের জন্য ব্যবহৃত হয়।
                                                <br>প্রতিটি বার বার্তা প্রদর্শনের জন্য এটি ব্যবহৃত হতে পারে, তবে এটি আসল
                                                বিষয়বস্তু নয়। এটি কেবল প্রদর্শনের জন্য একটি নমুনা টেক্সট।
                                            </p>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <!-- Academic -->
                            <div class="col-lg-6 mb-4">
                                <div
                                    class="trend-item position-relative box-shadow bg-white d-flex align-items-center justify-content-between p-3">
                                    <div class="premium-ribbon"
                                        data-tooltip="If you want to read this blog | <a href='#' class='go-premium'>Go Premium</a>">
                                        <img src="images/icon/premium.png" alt="Premium Blog">
                                    </div>
                                    <div class="trend-image w-25 me-3">
                                        <img src="images/category/academic.jpg" alt="Academic">
                                    </div>
                                    <div class="trend-content-main w-75">
                                        <div class="trend-content">
                                            <h5 class="theme mb-1">একাডেমিক</h5>
                                            <h4 class="mb-0"><a href="blog_details.html">একাডেমিক লেখার সেরা কৌশল</a>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- University -->
                            <div class="col-lg-6 mb-4">
                                <div
                                    class="trend-item box-shadow position-relative bg-white d-flex align-items-center justify-content-between p-3">
                                    <div class="trend-image w-25 me-3">
                                        <img src="images/category/university.jpg" alt="University">
                                    </div>
                                    <div class="trend-content-main w-75">
                                        <div class="trend-content">
                                            <h5 class="theme mb-1">বিশ্ববিদ্যালয়</h5>
                                            <h4 class="mb-0"><a href="blog_details.html">বিশ্ববিদ্যালয়ে সফল হওয়ার জন্য
                                                    গুরুত্বপূর্ণ
                                                    দক্ষতা</a></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Motivation -->
                            <div class="col-lg-6 mb-4">
                                <div
                                    class="trend-item box-shadow position-relative bg-white d-flex align-items-center justify-content-between p-3">
                                    <div class="trend-image w-25 me-3">
                                        <img src="images/category/writting_skill.png" alt="Motivation">
                                    </div>
                                    <div class="trend-content-main w-75">
                                        <div class="trend-content">
                                            <h5 class="theme mb-1">মোটিভেশন</h5>
                                            <h4 class="mb-0"><a href="blog_details.html">ইংরেজি শেখার জন্য
                                                    অনুপ্রেরণামূলক টিপস</a></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Career Guidance -->
                            <div class="col-lg-6 mb-4">
                                <div
                                    class="trend-item box-shadow position-relative bg-white d-flex align-items-center justify-content-between p-3">

                                    <div class="premium-ribbon"
                                        data-tooltip="If you want to read this blog | <a href='#' class='go-premium'>Go Premium</a>">
                                        <img src="images/icon/premium.png" alt="Premium Blog">
                                    </div>
                                    <div class="trend-image w-25 me-3">
                                        <img src="images/category/english_moja.png" alt="Career Guidance">
                                    </div>
                                    <div class="trend-content-main w-75">
                                        <div class="trend-content">
                                            <h5 class="theme mb-1">ক্যারিয়ার গাইডেন্স</h5>
                                            <h4 class="mb-0"><a href="blog_details.html">সফল ক্যারিয়ারের জন্য
                                                    প্রয়োজনীয় ইংরেজি
                                                    দক্ষতা</a></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Exam Preparation -->
                            <div class="col-lg-6 mb-4">
                                <div
                                    class="trend-item box-shadow position-relative bg-white d-flex align-items-center justify-content-between p-3">
                                    <div class="trend-image w-25 me-3">
                                        <img src="images/category/Grammar.jpg" alt="Exam Preparation">
                                    </div>
                                    <div class="trend-content-main w-75">
                                        <div class="trend-content">
                                            <h5 class="theme mb-1">পরীক্ষার প্রস্তুতি</h5>
                                            <h4 class="mb-0"><a href="blog_details.html">পরীক্ষায় সাফল্যের জন্য সেরা
                                                    টিপস</a></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Fun English -->
                            <div class="col-lg-6 mb-4">
                                <div
                                    class="trend-item box-shadow position-relative bg-white d-flex align-items-center justify-content-between p-3">
                                    <div class="premium-ribbon"
                                        data-tooltip="If you want to read this blog | <a href='#' class='go-premium'>Go Premium</a>">
                                        <img src="images/icon/premium.png" alt="Premium Blog">
                                    </div>
                                    <div class="trend-image w-25 me-3">
                                        <img src="images/category/reading_skill.jpg" alt="Fun English">
                                    </div>
                                    <div class="trend-content-main w-75">
                                        <div class="trend-content">
                                            <h5 class="theme mb-1">মজার ইংরেজি</h5>
                                            <h4 class="mb-0"><a href="blog_details.html">ইংরেজি শিখুন মজার উপায়ে</a>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-4">
                                <div
                                    class="trend-item box-shadow bg-white position-relative d-flex align-items-center justify-content-between p-3">
                                    <div class="premium-ribbon"
                                        data-tooltip="If you want to read this blog | <a href='#' class='go-premium'>Go Premium</a>">
                                        <img src="images/icon/premium.png" alt="Premium Blog">
                                    </div>
                                    <div class="trend-image w-25 me-3">
                                        <img src="images/category/Grammar.jpg" alt="Exam Preparation">
                                    </div>
                                    <div class="trend-content-main w-75">
                                        <div class="trend-content">
                                            <h5 class="theme mb-1">পরীক্ষার প্রস্তুতি</h5>
                                            <h4 class="mb-0"><a href="blog_details.html">পরীক্ষায় সাফল্যের জন্য সেরা
                                                    টিপস</a></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Fun English -->
                            <div class="col-lg-6 mb-4">
                                <div
                                    class="trend-item box-shadow bg-white d-flex align-items-center justify-content-between p-3">
                                    <div class="trend-image w-25 me-3">
                                        <img src="images/category/reading_skill.jpg" alt="Fun English">
                                    </div>
                                    <div class="trend-content-main w-75">
                                        <div class="trend-content">
                                            <h5 class="theme mb-1">মজার ইংরেজি</h5>
                                            <h4 class="mb-0"><a href="blog_details.html">ইংরেজি শিখুন মজার উপায়ে</a>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="trend-btn text-center"><a href="blog-list.html" class="nir-btn">আরও
                                        দেখুন</a></div>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-4 col-sm-12 mb-2">
                        <div class="sidebar-sticky">
                            <div class="list-sidebar">
                                <div class="sidebar-item mb-2">
                                    <h4 class="">জনপ্রিয় পোস্ট</h4>
                                    <!-- Post 1 -->
                                    <article class="post mb-3 position-relative box-shadow p-3 bg-white">
                                        <div class="premium-ribbon"
                                            data-tooltip="If you want to read this blog | <a href='#' class='go-premium'>Go Premium</a>">
                                            <img src="images/icon/premium.png" alt="Premium Blog">
                                        </div>
                                        <div class="s-content d-flex align-items-center justify-space-between">
                                            <div class="sidebar-image w-25 me-3">
                                                <a href="blog_details.html">
                                                    <img src="images/category/academic.jpg" alt="Academic">
                                                </a>
                                            </div>
                                            <div class="content-list w-75">
                                                <h5 class="mb-1">
                                                    <a href="blog_details.html">একাডেমিক লেখার সেরা কৌশল</a>
                                                </h5>
                                                <div class="date">১০ এপ্রিল ২০২৩</div>
                                            </div>
                                        </div>
                                    </article>
                                    <!-- Post 2 -->
                                    <article class="post box-shadow position-relative p-3 mb-3 bg-white">
                                        <div class="s-content d-flex align-items-center justify-space-between">
                                            <div class="sidebar-image w-25 me-3">
                                                <a href="blog_details.html">
                                                    <img src="images/category/university.jpg" alt="University">
                                                </a>
                                            </div>
                                            <div class="content-list w-75">
                                                <h5 class="mb-1">
                                                    <a href="blog_details.html">বিশ্ববিদ্যালয়ে সফল হওয়ার জন্য ৫টি
                                                        গুরুত্বপূর্ণ দক্ষতা</a>
                                                </h5>
                                                <div class="date">২৯ মার্চ ২০২৩</div>
                                            </div>
                                        </div>
                                    </article>
                                    <!-- Post 3 -->
                                    <article class="post position-relative box-shadow p-3 bg-white">
                                        <div class="premium-ribbon"
                                            data-tooltip="If you want to read this blog | <a href='#' class='go-premium'>Go Premium</a>">
                                            <img src="images/icon/premium.png" alt="Premium Blog">
                                        </div>
                                        <div class="s-content d-flex align-items-center justify-space-between">
                                            <div class="sidebar-image w-25 me-3">
                                                <a href="blog_details.html">
                                                    <img src="images/category/vocabullary.png" alt="Motivation">
                                                </a>
                                            </div>
                                            <div class="content-list w-75">
                                                <h5 class="mb-1">
                                                    <a href="blog_details.html">ইংরেজি শেখার জন্য অনুপ্রেরণামূলক
                                                        টিপস</a>
                                                </h5>
                                                <div class="date">২১ ফেব্রুয়ারি ২০২৩</div>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                                <!-- Sidebar Advertisement or About Image -->
                                <div class="about-image p-3 box-shadow sidebar-item">
                                    <img src="images/category/career.jpg" alt="Career Guidance" class="w-100">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>

    <!-- <section class="banner overflow-hidden">
        <div class="container">
            <div class="slider slider-before">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                       
                        <div class="swiper-slide">
                            <div class="slide-inner">
                                <div class="slide-image" style="background-image:url(images/blog/2.jpg)"></div>
                                <div class="swiper-content">
                                    <div class="entry-meta d-flex align-items-center justify-content-between">
                                        <span class="entry-category me-2 white bg-theme py-1 px-3">
                                            <a href="#" class="white">একাডেমিক</a>
                                        </span>
                                        <span class="entry-date">
                                            <a href="#"><i class="fa fa-calendar-alt"></i> ৫ই ডিসেম্বর ২০২৪</a>
                                        </span>
                                    </div>
                                    <h1 class="mb-4">
                                        <a href="#">Active Voice বনাম Passive Voice: কখন কোনটি ব্যবহার করবেন?</a>
                                    </h1>
                                    <div class="entry-meta d-flex align-items-center justify-content-between">
                                        <div class="entry-author">
                                            <img src="https://englishmoja.com/uploads/authors/icon/2024/09/29/66f906d6e3d16.webp"
                                                alt="" class="rounded-circle me-1">
                                            <span>এম. রফিক</span>
                                        </div>
                                        <div class="entry-metalist d-flex align-items-center">
                                            <ul>
                                                <li class="me-2"><a href="#"><i class="fa fa-eye"></i> 2k</a></li>
                                                <li class="me-2"><a href="#"><i class="fa fa-heart"></i> 1k</a></li>
                                                <li><a href="#"><i class="fa fa-comments"></i> 3</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="overlay"></div>
                            </div>
                        </div>
                      
                        <div class="swiper-slide">
                            <div class="slide-inner">
                                <div class="slide-image" style="background-image:url(images/blog/1.jpg)"></div>
                                <div class="swiper-content">
                                    <div class="entry-meta d-flex align-items-center justify-content-between">
                                        <span class="entry-category me-2 white bg-theme py-1 px-3">
                                            <a href="#" class="white">মোটিভেশন</a>
                                        </span>
                                        <span class="entry-date">
                                            <a href="#"><i class="fa fa-calendar-alt"></i> ৩রা ডিসেম্বর ২০২৪</a>
                                        </span>
                                    </div>
                                    <h1 class="mb-4">
                                        <a href="#">আপনার ইংরেজি শব্দভাণ্ডার বাড়ানোর ১০টি কার্যকর উপায়</a>
                                    </h1>
                                    <div class="entry-meta d-flex align-items-center justify-content-between">
                                        <div class="entry-author">
                                            <a href="#"><img
                                                    src="https://englishmoja.com/uploads/authors/icon/2024/09/29/66f906d6e3d16.webp"
                                                    alt="" class="rounded-circle me-1">
                                                <span>এম. রফিক</span></a>
                                        </div>
                                        <div class="entry-metalist d-flex align-items-center">
                                            <ul>
                                                <li class="me-2"><a href="#"><i class="fa fa-eye"></i> 3k</a></li>
                                                <li class="me-2"><a href="#"><i class="fa fa-heart"></i> 2k</a></li>
                                                <li><a href="#"><i class="fa fa-comments"></i> 5</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="overlay"></div>
                            </div>
                        </div>
                       
                        <div class="swiper-slide">
                            <div class="slide-inner">
                                <div class="slide-image" style="background-image:url(images/blog/3.jpg)"></div>
                                <div class="swiper-content">
                                    <div class="entry-meta d-flex align-items-center justify-content-between">
                                        <span class="entry-category me-2 white bg-theme py-1 px-3">
                                            <a href="#" class="white">ক্যারিয়ার গাইডেন্স</a>
                                        </span>
                                        <span class="entry-date">
                                            <a href="#"><i class="fa fa-calendar-alt"></i> ১লা ডিসেম্বর ২০২৪</a>
                                        </span>
                                    </div>
                                    <h1 class="mb-4">
                                        <a href="#">দৈনন্দিন কথোপকথনের জন্য গুরুত্বপূর্ণ Idioms এবং Phrases</a>
                                    </h1>
                                    <div class="entry-meta d-flex align-items-center justify-content-between">
                                        <div class="entry-author">
                                            <a href="#"><img
                                                    src="https://englishmoja.com/uploads/authors/icon/2024/09/29/66f906d6e3d16.webp"
                                                    alt="" class="rounded-circle me-1">
                                                <span>এম. রফিক</span></a>
                                        </div>
                                        <div class="entry-metalist d-flex align-items-center">
                                            <ul>
                                                <li class="me-2"><a href="#"><i class="fa fa-eye"></i> 5k</a></li>
                                                <li class="me-2"><a href="#"><i class="fa fa-heart"></i> 4k</a></li>
                                                <li><a href="#"><i class="fa fa-comments"></i> 7</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="overlay"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
    </section> -->


    <!-- banner starts -->
    <section class="trending-topic pt-3 pb-6">
        <div class="container">
            <div class="section-title mb-4 pb-1 w-50">
                <h2 class="m-0">Trending <span>Topics</span></h2>
            </div>
            <div class="trending-topic-main">
                <div class="row shop-slider">
                    <!-- একাডেমিক -->
                    <div class="col-lg-3 col-md-6">
                        <div class="trending-topic-item box-shadow">
                            <div class="trending-topic-image overflow-hidden">
                                <img src="images/category/academic.jpg" alt="একাডেমিক">
                                <div class="trending-topic-content">
                                    <h4 class="mb-0 text-center py-1 px-3 bg-white position-absolute">
                                        <a href="#">একাডেমিক</a>
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- বিশ্ববিদ্যালয় -->
                    <div class="col-lg-3 col-md-6">
                        <div class="trending-topic-item box-shadow">
                            <div class="trending-topic-image">
                                <img src="images/category/university.jpg" alt="বিশ্ববিদ্যালয়">
                                <div class="trending-topic-content">
                                    <h4 class="mb-0 text-center py-1 px-3 bg-white position-absolute">
                                        <a href="#">বিশ্ববিদ্যালয়</a>
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- মোটিভেশন -->
                    <div class="col-lg-3 col-md-6">
                        <div class="trending-topic-item box-shadow">
                            <div class="trending-topic-image">
                                <img src="images/category/reading_skill.jpg" alt="মোটিভেশন">
                                <div class="trending-topic-content">
                                    <h4 class="mb-0 text-center py-1 px-3 bg-white position-absolute">
                                        <a href="#">মোটিভেশন</a>
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ক্যারিয়ার গাইডেন্স -->
                    <div class="col-lg-3 col-md-6">
                        <div class="trending-topic-item box-shadow">
                            <div class="trending-topic-image">
                                <img src="images/category/Grammar.jpg" alt="ক্যারিয়ার গাইডেন্স">
                                <div class="trending-topic-content">
                                    <h4 class="mb-0 text-center py-1 px-3 bg-white position-absolute">
                                        <a href="#">ক্যারিয়ার গাইডেন্স</a>
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ইংরেজি সাহিত্য -->
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="trending-topic-item box-shadow">
                            <div class="trending-topic-image">
                                <img src="images/category/English_Literature.jpg" alt="ইংরেজি সাহিত্য">
                                <div class="trending-topic-content">
                                    <h4 class="mb-0 text-center py-1 px-3 bg-white position-absolute">
                                        <a href="#">ইংরেজি সাহিত্য</a>
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
    </section>
    <!-- banner ends -->
    <!-- trending-topic starts -->
    <section class="pricing-section py-5">
        <div class="container text-center">
            <div class="section-title mb-4">
                <h2 class="m-0"><span class="highlight">সেরা প্ল্যান</span> সাবস্ক্রাইব করুন</h2>
                <p class="text-muted">আপনার পছন্দসই প্রিমিয়াম ব্লগ পড়ার জন্য সেরা পরিকল্পনা বেছে নিন।</p>
            </div>
            <div class="row">
                <!-- Monthly Plan -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="pricing-card box-shadow bg-white p-4 rounded">
                        <h4 class="plan-title mb-3">মাসিক</h4>
                        <div class="price mb-4">
                            <span class="currency">৳</span><span class="amount">১৫০</span><span class="duration">/
                                মাস</span>
                        </div>
                        <ul class="plan-features list-unstyled mb-4">
                            <li>সমস্ত প্রিমিয়াম ব্লগ অ্যাক্সেস</li>
                            <li>২৪/৭ গ্রাহক সেবা</li>
                            <li>একটি নির্দিষ্ট সময়ের জন্য প্ল্যান</li>
                        </ul>
                        <a href="checkout.html" class="btn btn-primary w-100">সাবস্ক্রাইব করুন</a>
                    </div>
                </div>

                <!-- Half-Yearly Plan -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="pricing-card box-shadow bg-white p-4 rounded premium-plan">
                        <h4 class="plan-title mb-3">অর্ধ-বার্ষিক</h4>
                        <div class="price mb-4">
                            <span class="currency">৳</span><span class="amount">৩০০</span><span class="duration">/৬
                                মাস</span>
                        </div>
                        <ul class="plan-features list-unstyled mb-4">
                            <li>সমস্ত প্রিমিয়াম ব্লগ অ্যাক্সেস</li>
                            <li>অতিরিক্ত ২ মাস বিনামূল্যে</li>
                            <li>২৪/৭ গ্রাহক সেবা</li>
                        </ul>
                        <a href="checkout.html" class="btn btn-success w-100">সাবস্ক্রাইব করুন</a>
                    </div>
                </div>

                <!-- Yearly Plan -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="pricing-card box-shadow bg-white p-4 rounded">
                        <h4 class="plan-title mb-3">বার্ষিক</h4>
                        <div class="price mb-4">
                            <span class="currency">৳</span><span class="amount">৫০০</span><span
                                class="duration">/বছর</span>
                        </div>
                        <ul class="plan-features list-unstyled mb-4">
                            <li>সমস্ত প্রিমিয়াম ব্লগ অ্যাক্সেস</li>
                            <li>অতিরিক্ত ৩ মাস বিনামূল্যে</li>
                            <li>২৪/৭ গ্রাহক সেবা</li>
                        </ul>
                        <a href="checkout.html" class="btn btn-primary w-100">সাবস্ক্রাইব করুন</a>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!--trending-topic ends -->
    <!-- Trending Starts -->
    <section class="trending pt-0 ptop">
        <div class="container">
            <div class="section-title mb-4 pb-1 w-50">
                <h2 class="m-0">More Featured <span>Posts</span></h2>
            </div>
            <div class="trend-box">
                <div class="row">
                    <!-- একাডেমিক -->
                    <div class="col-lg-6 mb-4">
                        <div class="trend-item d-flex align-items-center shadow p-4">
                            <div class="trend-content-main me-4 w-75">
                                <div class="trend-content">
                                    <h5 class="theme">একাডেমিক</h5>
                                    <h4><a href="#">শিক্ষাক্ষেত্রে সাফল্যের জন্য সেরা কৌশল</a></h4>
                                    <div class="entry-meta d-flex align-items-center justify-content-between">
                                        <div class="entry-author">
                                            <img src="https://englishmoja.com/uploads/authors/icon/2024/09/29/66f906d6e3d16.webp"
                                                alt="" class="rounded-circle me-1">
                                            <span>এম. রফিক</span>
                                        </div>
                                        <div class="entry-metalist d-flex align-items-center">
                                            <ul>
                                                <li class="me-2"><a href="#"><i class="fa fa-eye"></i> 6k</a></li>
                                                <li class="me-2"><a href="#"><i class="fa fa-heart"></i> 3k</a></li>
                                                <li><a href="#"><i class="fa fa-comments"></i> 1.5k</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="trend-image w-25">
                                <img src="images/category/academic.jpg" alt="Academic">
                            </div>
                        </div>
                    </div>

                    <!-- বিশ্ববিদ্যালয় -->
                    <div class="col-lg-6 mb-4">
                        <div class="trend-item d-flex align-items-center shadow p-4 flex-row-reverse">
                            <div class="trend-content-main mx-4 w-75">
                                <div class="trend-content">
                                    <h5 class="theme">বিশ্ববিদ্যালয়</h5>
                                    <h4><a href="#">বিশ্ববিদ্যালয়ে সফল হওয়ার জন্য ৫টি গুরুত্বপূর্ণ দক্ষতা</a></h4>
                                    <div class="entry-meta d-flex align-items-center justify-content-between">
                                        <div class="entry-author">
                                            <img src="https://englishmoja.com/uploads/authors/icon/2024/09/29/66f906d6e3d16.webp"
                                                alt="" class="rounded-circle me-1">
                                            <span>এম. রফিক</span>
                                        </div>
                                        <div class="entry-metalist d-flex align-items-center">
                                            <ul>
                                                <li class="me-2"><a href="#"><i class="fa fa-eye"></i> 5.5k</a></li>
                                                <li class="me-2"><a href="#"><i class="fa fa-heart"></i> 3.2k</a></li>
                                                <li><a href="#"><i class="fa fa-comments"></i> 2k</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="trend-image w-25">
                                <img src="images/category/university.jpg" alt="University">
                            </div>
                        </div>
                    </div>

                    <!-- অনুপ্রেরণা -->
                    <div class="col-lg-6 mb-4">
                        <div class="trend-item d-flex align-items-center shadow p-4">
                            <div class="trend-content-main me-4 w-75">
                                <div class="trend-content">
                                    <h5 class="theme">মোটিভেশন</h5>
                                    <h4><a href="#">সাফল্যের জন্য আত্ম-উন্নয়নের সেরা টিপস</a></h4>
                                    <div class="entry-meta d-flex align-items-center justify-content-between">
                                        <div class="entry-author">
                                            <img src="https://englishmoja.com/uploads/authors/icon/2024/09/29/66f906d6e3d16.webp"
                                                alt="" class="rounded-circle me-1">
                                            <span>এম. রফিক</span>
                                        </div>
                                        <div class="entry-metalist d-flex align-items-center">
                                            <ul>
                                                <li class="me-2"><a href="#"><i class="fa fa-eye"></i> 7k</a></li>
                                                <li class="me-2"><a href="#"><i class="fa fa-heart"></i> 4.5k</a></li>
                                                <li><a href="#"><i class="fa fa-comments"></i> 3k</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="trend-image w-25">
                                <img src="images/category/reading_skill.jpg" alt="Motivation">
                            </div>
                        </div>
                    </div>

                    <!-- ক্যারিয়ার গাইডেন্স -->
                    <div class="col-lg-6 mb-4">
                        <div class="trend-item d-flex align-items-center shadow p-4 flex-row-reverse">
                            <div class="trend-content-main mx-4 w-75">
                                <div class="trend-content">
                                    <h5 class="theme">ক্যারিয়ার গাইডেন্স</h5>
                                    <h4><a href="#">সেরা ক্যারিয়ার গড়ার জন্য দিকনির্দেশনা</a></h4>
                                    <div class="entry-meta d-flex align-items-center justify-content-between">
                                        <div class="entry-author">
                                            <img src="https://englishmoja.com/uploads/authors/icon/2024/09/29/66f906d6e3d16.webp"
                                                alt="" class="rounded-circle me-1">
                                            <span>এম. রফিক</span>
                                        </div>
                                        <div class="entry-metalist d-flex align-items-center">
                                            <ul>
                                                <li class="me-2"><a href="#"><i class="fa fa-eye"></i> 8k</a></li>
                                                <li class="me-2"><a href="#"><i class="fa fa-heart"></i> 5k</a></li>
                                                <li><a href="#"><i class="fa fa-comments"></i> 2.5k</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="trend-image w-25">
                                <img src="images/category/vocabullary.png" alt="Career Guidance">
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="trend-btn text-center"><a href="#" class="nir-btn">আরও দেখুন</a></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Trending Ends -->

    <!-- top deal starts -->
    <section class="trending recent-articles pb-4">
        <div class="container">
            <div class="section-title mb-4 pb-1 w-50">
                <h2 class="m-0">সাম্প্রতিক <span>লেখা ও পোস্ট</span></h2>
            </div>
            <div class="recent-articles-inner">
                <div class="row">
                    <div class="col-lg-4 mb-4">
                        <div class="trend-item box-shadow bg-white p-4 mb-2">
                            <div class="trend-image">
                                <img src="images/category/academic.jpg" alt="Academic">
                            </div>
                            <div class="trend-content-main pt-3">
                                <div class="trend-content">
                                    <h5 class="theme">একাডেমিক</h5>
                                    <h4><a href="#">একাডেমিক লেখার সেরা কৌশল</a></h4>
                                    <p class="mb-3">
                                        শিক্ষার্থীদের জন্য লেখা উন্নত করার কিছু গুরুত্বপূর্ণ পদ্ধতি।
                                    </p>
                                    <div class="entry-meta d-flex align-items-center justify-content-between">
                                        <div class="entry-author">
                                            <img src="images/reviewer/2.jpg" alt="" class="rounded-circle me-1">
                                            <span>এম. রফিক</span>
                                        </div>
                                        <div class="entry-metalist d-flex align-items-center">
                                            <ul>
                                                <li class="me-2"><a href="#"><i class="fa fa-eye"></i> ৫k</a></li>
                                                <li class="me-2"><a href="#"><i class="fa fa-heart"></i> ৩k</a></li>
                                                <li><a href="#"><i class="fa fa-comments"></i> ২k</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="trend-item d-flex align-items-center box-shadow p-3 mb-2 bg-white">
                            <div class="trend-image w-25 me-4">
                                <img src="images/category/university.jpg" alt="University">
                            </div>
                            <div class="trend-content-main me-3 w-75">
                                <div class="trend-content">
                                    <h4 class="mb-1"><a href="#">বিশ্ববিদ্যালয়ে সফল হওয়ার ৫টি গুরুত্বপূর্ণ দক্ষতা</a>
                                    </h4>
                                    <div class="entry-meta">
                                        <div class="entry-metalist d-flex align-items-center">
                                            <small><a href="#" class="grey"><i class="fa fa-calendar"></i> ২৯ মার্চ
                                                    ২০২৩</a></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="trend-item d-flex align-items-center box-shadow p-3 mb-2 bg-white">
                            <div class="trend-image w-25 me-3">
                                <img src="images/category/English_Literature.jpg" alt="Motivation">
                            </div>
                            <div class="trend-content-main w-75">
                                <div class="trend-content">
                                    <h4 class="mb-1"><a href="#">ইংরেজি শেখার জন্য অনুপ্রেরণামূলক টিপস</a></h4>
                                    <div class="entry-meta">
                                        <div class="entry-metalist d-flex align-items-center">
                                            <small><a href="#" class="grey"><i class="fa fa-calendar"></i> ২১
                                                    ফেব্রুয়ারি ২০২৩</a></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 mb-4">
                        <div class="trend-item box-shadow bg-white p-4 mb-2">
                            <div class="trend-image">
                                <img src="images/category/vocabullary.png" alt="Exam Preparation">
                            </div>
                            <div class="trend-content-main pt-3">
                                <div class="trend-content">
                                    <h5 class="theme">পরীক্ষার প্রস্তুতি</h5>
                                    <h4><a href="#">পরীক্ষায় সফল হওয়ার জন্য কার্যকর কৌশল</a></h4>
                                    <p class="mb-3">
                                        পরীক্ষার জন্য সঠিকভাবে প্রস্তুতির সহজ এবং গুরুত্বপূর্ণ পদ্ধতি।
                                    </p>
                                    <div class="entry-meta d-flex align-items-center justify-content-between">
                                        <div class="entry-author">
                                            <img src="images/reviewer/1.jpg" alt="" class="rounded-circle me-1">
                                            <span>এম. রফিক</span>
                                        </div>
                                        <div class="entry-metalist d-flex align-items-center">
                                            <ul>
                                                <li class="me-2"><a href="#"><i class="fa fa-eye"></i> ৭k</a></li>
                                                <li class="me-2"><a href="#"><i class="fa fa-heart"></i> ৫k</a></li>
                                                <li><a href="#"><i class="fa fa-comments"></i> ৩k</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="trend-item d-flex align-items-center box-shadow p-3 mb-2 bg-white">
                            <div class="trend-image w-25 me-4">
                                <img src="images/category/reading_skill.jpg" alt="Fun English">
                            </div>
                            <div class="trend-content-main me-3 w-75">
                                <div class="trend-content">
                                    <h4 class="mb-1"><a href="#">ইংরেজি শিখুন মজার উপায়ে</a></h4>
                                    <div class="entry-meta">
                                        <div class="entry-metalist d-flex align-items-center">
                                            <small><a href="#" class="grey"><i class="fa fa-calendar"></i> ১০ জানুয়ারি
                                                    ২০২৩</a></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 mb-4">
                        <div class="trend-item box-shadow bg-white p-4 mb-2">
                            <div class="trend-image">
                                <img src="images/category/Grammar.jpg" alt="Career Guidance">
                            </div>
                            <div class="trend-content-main pt-3">
                                <div class="trend-content">
                                    <h5 class="theme">ক্যারিয়ার গাইডেন্স</h5>
                                    <h4><a href="#">সফল ক্যারিয়ার গড়ার উপায়</a></h4>
                                    <p class="mb-3">
                                        আপনার ক্যারিয়ার উন্নত করতে কীভাবে ইংরেজি ব্যবহার করবেন।
                                    </p>
                                    <div class="entry-meta d-flex align-items-center justify-content-between">
                                        <div class="entry-author">
                                            <img src="images/reviewer/3.jpg" alt="" class="rounded-circle me-1">
                                            <span>এম. রফিক</span>
                                        </div>
                                        <div class="entry-metalist d-flex align-items-center">
                                            <ul>
                                                <li class="me-2"><a href="#"><i class="fa fa-eye"></i> ৮k</a></li>
                                                <li class="me-2"><a href="#"><i class="fa fa-heart"></i> ৬k</a></li>
                                                <li><a href="#"><i class="fa fa-comments"></i> ৪k</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="trend-item d-flex align-items-center box-shadow p-3 mb-2 bg-white">
                            <div class="trend-image w-25 me-4">
                                <img src="images/category/English_Literature.jpg" alt="English Literature">
                            </div>
                            <div class="trend-content-main me-3 w-75">
                                <div class="trend-content">
                                    <h4 class="mb-1"><a href="#">ইংরেজি সাহিত্য পড়ার সেরা পদ্ধতি</a></h4>
                                    <div class="entry-meta">
                                        <div class="entry-metalist d-flex align-items-center">
                                            <small><a href="#" class="grey"><i class="fa fa-calendar"></i> ৫ ডিসেম্বর
                                                    ২০২২</a></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Counter Section -->
    <section class="counter-main pb-6" style="background-image: url(images/bg/1.jpg); background-size: cover;">
        <div class="container">
            <div class="counter text-center">
                <div class="row">
                    <!-- Happy Readers -->
                    <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                        <div class="counter-item bg-lgrey">
                            <i class="fa fa-users white bg-theme mb-1"></i>
                            <h3 class="value mb-0 theme">1000</h3>
                            <h4 class="m-0">Happy Readers</h4>
                        </div>
                    </div>
                    <!-- Published Blogs -->
                    <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                        <div class="counter-item bg-lgrey">
                            <i class="fa fa-file-alt white bg-theme mb-1"></i>
                            <h3 class="value mb-0 theme">500</h3>
                            <h4 class="m-0">Published Blogs</h4>
                        </div>
                    </div>
                    <!-- Years of Blogging -->
                    <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                        <div class="counter-item bg-lgrey">
                            <i class="fa fa-calendar-alt white bg-theme mb-1"></i>
                            <h3 class="value mb-0 theme">5</h3>
                            <h4 class="m-0">Years of Blogging</h4>
                        </div>
                    </div>
                    <!-- Support Provided -->
                    <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                        <div class="counter-item bg-lgrey">
                            <i class="fa fa-globe white bg-theme mb-1"></i>
                            <h3 class="value mb-0 theme">50</h3>
                            <h4 class="m-0">Global Reach</h4>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="overlay"></div>
    </section>
    <!-- End Counter Section -->



    <!-- Content Line Start -->
    <div class="content-line bg-theme pb-6 pt-6">
        <div class="container">
            <div class="content-line-inner">
                <div class="row d-md-flex align-items-center justify-content-between">
                    <div class="col-lg-9 col-md-9">
                        <p class="mb-0 white h4">
                            নতুন কিছু শিখুন! আপনার জ্ঞান বাড়াতে আমাদের ব্লগ পড়ুন।
                        </p>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <a href="" class="nir-btn-black">আরও ব্লগ পড়ুন</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Content Line End -->




    <!-- cta-horizon starts -->
    <section class="cta-horizon pt-7 pb-7" style="background-color:#effff7;">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-6 col-offset-lg-2">
                    <div class="section-title mb-4 pb-1">
                        <h2 class="mb-0">Subscribe To <span>Our Newsletter</span></h2>
                    </div>
                    <p>Want to be notified when we launch a new template or an udpate. Just sign up and we'll send you a
                        notification by email.</p>
                    <div class="newsletter-form">
                        <form class="d-flex align-items-center">
                            <input type="email" placeholder="Enter your email">
                            <input type="submit" class="nir-btn" value="Subscribe">
                        </form>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="newsletter-image float-right">
                        <img src="images/newsletter1.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- cta-horizon Ends -->


@endsection



@section('scripts')


    <script>
   
        document.addEventListener('DOMContentLoaded', () => {
            if (document.querySelector('.editor')) {
                ClassicEditor.create(document.querySelector('.editor'), {
                    ckfinder: {
                        // Since this is a static page, you can't use Laravel's `route`. Use a direct URL for uploading files.
                        uploadUrl: 'YOUR_FILE_UPLOAD_URL_HERE', // Replace with the appropriate API endpoint for uploading.
                        filebrowserUploadMethod: 'form'
                    }
                })
                    .then(editor => {
                        window.editor = editor;
                    })
                    .catch(err => {
                        console.error(err.stack);
                    });
            }
        });

    </script>



@endsection

