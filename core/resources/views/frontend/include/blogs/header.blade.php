    <!-- header starts -->
    <header class="main_header_area shadow-sm">
        <div class="top-navbar py-2" style="background: #0c685f;">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <div class="date-weather py-2 mb-lg-0">
                            <div class="d-flex justify-content-between align-items-center">
                                <!-- Date Section -->
                                <div class="item d-flex align-items-center">
                                    <div class="icon me-2">
                                        <img src="{{ asset('theme/frontend/assets/images/icon/calendar.png') }}" alt="calendar icon">

                                    </div>
                                    <div class="inf text-white">
                                        <strong>Thursday</strong>
                                        <span>Dec 5, 2024</span>
                                    </div>
                                </div>

                                <!-- Notification, Coins, and User Profile -->
                                <div class="item d-flex align-items-center">
                                    <!-- Notification Bell -->
                                    <div class="notification-bell position-relative me-3">
                                        <i class="ri-notification-3-line text-white" style="font-size: 20px;"></i>
                                        <span class="notification-dot position-absolute bg-danger rounded-circle"
                                            style="width: 8px; height: 8px; top: 0; right: -2px;"></span>
                                    </div>

                                    <!-- Coin Icon -->
                                    <div class="coin-icon me-3">
                                        <a href="em_cash.html">
                                            <img src="images/icon/coin.png" alt="points-icon">
                                        </a>
                                    </div>

                                    <!-- User Profile Dropdown -->
                                    <div class="user-profile dropdown">
                                        <div class="profile-icon dropdown-toggle" id="dropdownMenuButton"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <img src="https://englishmoja.com/uploads/authors/icon/2024/09/29/66f906d6e3d16.webp"
                                                alt="user-profile"
                                                style="width: 35px; height: 35px; border-radius: 50%; object-fit: cover; cursor: pointer;">
                                        </div>
                                        <div class="dropdown-menu dropdown-menu-end"
                                            aria-labelledby="dropdownMenuButton">
                                            <div><a class="dropdown-item" href="#">Profile</a></div>
                                            <div><a class="dropdown-item" href="#">Settings</a></div>
                                            <div>
                                                <hr class="dropdown-divider">
                                            </div>
                                            <div><a class="dropdown-item" href="#">Logout</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('frontend.include.blogs.main_navbar')
    </header>
    <!-- header ends -->