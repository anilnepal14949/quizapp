<div class="wrapper">
    <div class="container">
        <div class="row">
            <div class="span3">
                <div class="sidebar">
                    <ul class="widget widget-menu unstyled">
                        <li>
                            <a href="{{ url('/') }}">
                                <i class="menu-icon icon-dashboard"></i>Dashboard
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/quiz/create') }}">
                                <i class="menu-icon icon-dashboard"></i>Create Quiz
                            </a>
                            <a href="{{ url('/quiz') }}">
                                <i class="menu-icon icon-dashboard"></i>All Quizzes
                            </a>
                        </li>
                    </ul>
                    <!--/.widget-nav-->


                    <ul class="widget widget-menu unstyled">
                        <li>
                            <a href="{{ url('/question/create') }}">
                                <i class="menu-icon icon-dashboard"></i>Create Question
                            </a>
                            <a href="{{ url('/question') }}">
                                <i class="menu-icon icon-dashboard"></i>All Questions
                            </a>
                        </li>
                    </ul>

                    <ul class="widget widget-menu unstyled">
                        <li>
                            <a href="{{ url('/user/create') }}">
                                <i class="menu-icon icon-dashboard"></i>Create User
                            </a>
                            <a href="{{ url('/user') }}">
                                <i class="menu-icon icon-dashboard"></i>All Users
                            </a>
                        </li>
                    </ul>

                    <ul class="widget widget-menu unstyled">
                        <li>
                            <a href="{{ route('user.exam') }}">
                                <i class="menu-icon icon-dashboard"></i>Assign Exam
                            </a>
                            <a href="{{ route('view.user') }}">
                                <i class="menu-icon icon-dashboard"></i>View Assigned Users
                            </a>
                        </li>
                    </ul>

                    <ul class="widget widget-menu unstyled">
                        <li>
                            <a href="/result">
                                <i class="menu-icon icon-dashboard"></i>View Result
                            </a>
                        </li>
                    </ul>

                    <ul class="widget widget-menu unstyled">
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                <i class="menu-icon icon-signout"></i>
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
                <!--/.sidebar-->
            </div>
            <!--/.span3-->
