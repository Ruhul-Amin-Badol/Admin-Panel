 
 @extends('frontend.layouts.master')

 @section('meta')
     <title>{{ $blog->title ?? 'Blog Details' }} | {{ get_option('title') }}</title>
 
     <meta property="og:title" content="{{ $blog->title ?? 'Blog Details' }} | {{ strtolower($blog->meta_title ?? get_option('title')) }}">
     <meta property="og:description" content="{{ strip_tags($blog->meta_description ?? get_option('description')) }}">
     <meta property="og:type" content="website">
     <meta property="og:url" content="{{ url()->current() }}">
     <meta property="og:image" content="{{ asset($blog->meta_image ??get_option('meta_image')) }}">
     <meta property="og:site_name" content="{{ get_option('company_name') }}">
     <!-- Add more Open Graph tags as needed -->
 
     <meta name="twitter:card" content="summary_large_image">
     <meta name="twitter:title" content="{{ $blog->title ?? 'Blog Details' }} | {{ strtolower($blog->meta_title ?? get_option('title')) }}">
     <meta name="twitter:description" content="{{ strip_tags($blog->meta_description ?? get_option('description')) }}">
     <meta name="twitter:image" content="{{ asset($blog->meta_image ?? get_option('meta_image')) }}">
     <!-- Add more Twitter meta tags as needed -->
 @endsection
 
 @section('content')
 <!-- BreadCrumb Starts -->
 <section class="breadcrumb-main pb-0 pt-6" style="background-image: url(images/bg/1.jpg);">
    <div class="breadcrumb-outer">
        <div class="container">
            <div class="breadcrumb-content d-md-flex align-items-center pt-6">
                <h2 class="mb-0">সকল ব্লগ</h2>
                <nav aria-label="breadcrumb">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">হোম</a></li>
                        <li class="breadcrumb-item active" aria-current="page">সকল ব্লগ</li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <div class="dot-overlay"></div>
</section>
<!-- BreadCrumb Ends -->

<!-- blog starts -->
<section class="blog blog-left">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="listing-inner">
                    <div class="list-results d-flex align-items-center justify-content-between">
                        <div class="list-results-sort">
                            <p class="m-0">Showing 1-5 of 80 results</p>
                        </div>
                        <div class="click-menu d-flex align-items-center justify-content-between">

                            <div class="sortby d-flex align-items-center justify-content-between ml-2">
                                <select class="niceSelect">
                                    <option value="1">Sort By</option>
                                    <option value="2">সর্বশেষ ব্লগ</option>
                                    <option value="3">সর্বাধিক পঠিত</option>
                                    <option value="4">সর্বাধিক মন্তব্য</option>
                                    <option value="5">প্রিমিয়াম ব্লগ</option>
                                    <option value="6">ফ্রি ব্লগ</option>
                                </select>
                            </div>
                            
                        </div>
                    </div>
                    <div class="row">
                        <!-- Academic -->
                        <div class="col-lg-6 mb-4">
                            <div
                                class="trend-item position-relative box-shadow bg-white d-flex align-items-center justify-content-between p-3">
                                <div class="premium-ribbon">
                                    <img src="images/icon/premium.png" alt="">
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

                                <div class="premium-ribbon">
                                    <img src="images/icon/premium.png" alt="">
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
                                <div class="premium-ribbon">
                                    <img src="images/icon/premium.png" alt="">
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
                                <div class="premium-ribbon">
                                    <img src="images/icon/premium.png" alt="">
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
                    </div>

                    <div class="pagination-main text-center">
                        <ul class="pagination">
                            <li><a href="#"><i class="fa fa-angle-double-left" aria-hidden="true"></i></a></li>
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- sidebar starts -->
            <div class="col-lg-3 col-md-12">
                <div class="sidebar-sticky">
                    <div class="list-sidebar">

                        <!-- Blog Categories with Checkbox -->
                        <div class="sidebar-item mb-4">
                            <h4 class="mb-3">ক্যাটাগরি</h4>
                            <form action="#" method="GET">
                                <ul class="sidebar-category list-unstyled">
                                    <li>
                                        <label>
                                            <input type="checkbox" name="category" value="all" checked>
                                            সকল ক্যাটাগরি
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type="checkbox" name="category" value="academic">
                                            একাডেমিক
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type="checkbox" name="category" value="university">
                                            বিশ্ববিদ্যালয়
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type="checkbox" name="category" value="motivation">
                                            মোটিভেশন
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type="checkbox" name="category" value="career">
                                            ক্যারিয়ার গাইডেন্স
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type="checkbox" name="category" value="literature">
                                            ইংরেজি সাহিত্য
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type="checkbox" name="category" value="exam">
                                            পরীক্ষার প্রস্তুতি
                                        </label>
                                    </li>
                                </ul>
                            </form>
                        </div>
                        <!-- Blog Type Filter -->
                        <h4 class="mb-3 mt-4">ব্লগ টাইপ</h4>
                        <ul class="sidebar-category list-unstyled">

                            <li>
                                <label>
                                    <input type="radio" name="blog_type" value="premium">
                                    প্রিমিয়াম ব্লগ
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input type="radio" name="blog_type" value="free">
                                    ফ্রি ব্লগ
                                </label>
                            </li>
                        </ul>


                        <!-- Accordion Filter -->
                        <h4 class="mb-3 mt-4">তারিখ অনুসারে ফিল্টার</h4>

                        <div class="calendar"></div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- blog Ends -->
@endsection

<script src="https://cdn.jsdelivr.net/npm/pg-calendar@1.4.31/dist/js/pignose.calendar.min.js"></script>
<script src="{{ asset('theme/frontend/assets/js/custom-date.js') }}"></script>

<script>
    $(function () {
        $('.calendar').pignoseCalendar({
            theme: 'blue' // light, dark, blue
        });
    });
</script>