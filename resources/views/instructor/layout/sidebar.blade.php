    <ul class="wsus__dashboard_sidebar_menu">
        <li>
            <a href="dashboard.html" class="active">
                <div class="img">
                    <img src="images/dash_icon_8.png" alt="icon" class="img-fluid w-100">
                </div>
                Dashboard
            </a>
        </li>
        <li>
            <a href="{{ route('instructor.profile.index') }}">
                <div class="img">
                    <img src="images/dash_icon_1.png" alt="icon" class="img-fluid w-100">
                </div>
                Profile
            </a>
        </li>
        <li>
            <a href="dashboard_courses.html">
                <div class="img">
                    <img src="images/dash_icon_2.png" alt="icon" class="img-fluid w-100">
                </div>
                Courses
            </a>
        </li>
        <li>
            <a href="dashboard_review.html">
                <div class="img">
                    <img src="images/dash_icon_4.png" alt="icon" class="img-fluid w-100">
                </div>
                Reviews
            </a>
        </li>
        <li>
            <a href="dashboard_order.html">
                <div class="img">
                    <img src="images/dash_icon_5.png" alt="icon" class="img-fluid w-100">
                </div>
                Orders
            </a>
        </li>
        <li>
            <a href="dashboard_student.html">
                <div class="img">
                    <img src="images/dash_icon_6.png" alt="icon" class="img-fluid w-100">
                </div>
                Students
            </a>
        </li>
        <li>
            <a href="dashboard_payout.html">
                <div class="img">
                    <img src="images/dash_icon_7.png" alt="icon" class="img-fluid w-100">
                </div>
                Payouts
            </a>
        </li>
        <li>
            <a href="dashboard_support.html">
                <div class="img">
                    <img src="images/dash_icon_8.png" alt="icon" class="img-fluid w-100">
                </div>
                Support Tickets
            </a>
        </li>
        <li>
            <a href="dashboard_security.html">
                <div class="img">
                    <img src="images/dash_icon_10.png" alt="icon" class="img-fluid w-100">
                </div>
                Security
            </a>
        </li>
        <li>
            <a href="dashboard_social_account.html">
                <div class="img">
                    <img src="images/dash_icon_11.png" alt="icon" class="img-fluid w-100">
                </div>
                Social Profile
            </a>
        </li>
        <li>
            <a href="dashboard_notification.html">
                <div class="img">
                    <img src="images/dash_icon_12.png" alt="icon" class="img-fluid w-100">
                </div>
                Notifications
            </a>
        </li>
        <li>
            <a href="dashboard_privacy.html">
                <div class="img">
                    <img src="images/dash_icon_13.png" alt="icon" class="img-fluid w-100">
                </div>
                Profile Privacy
            </a>
        </li>
        <li>
            <form method="POST" action="{{ route('student.logout') }}">
                @csrf
                <a href="{{ route('student.logout') }}" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                    <div class="img">
                        <img src="{{ asset('uploads/default-files/dash_icon_16.png') }}" alt="icon"
                            class="img-fluid w-100">
                    </div>
                    Sign Out
                </a>


               
            </form>

        </li>
    </ul>
