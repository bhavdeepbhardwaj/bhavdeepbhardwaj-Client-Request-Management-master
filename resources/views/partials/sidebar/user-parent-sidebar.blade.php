<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link active" href="{{ route('user.dashboard') }}">
                <i class="mdi mdi-grid-large menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ticket" aria-expanded="false"
                aria-controls="ticket">
                <i class="menu-icon mdi mdi-card-text-outline"></i>
                <span class="menu-title">Ticket</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ticket">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link"
                            href="{{ route('user.ticket.show_ticket') }}">Show Ticket</a></li>
                    <li class="nav-item"><a class="nav-link"
                            href="{{ route('user.ticket.create_ticket') }}">Create Ticket</a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#comment" aria-expanded="false"
                aria-controls="comment">
                <i class="menu-icon mdi mdi-comment-multiple-outline"></i>
                <span class="menu-title">Comment</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="comment">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('user.comment.view_comment')}}">View Comment</a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link active" href="{{ route('user.help') }}">
                <i class="mdi mdi-help-circle-outline menu-icon"></i>
                <span class="menu-title">Need Help</span>
            </a>
        </li>

        {{-- <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#user-client" aria-expanded="false"
                aria-controls="user-client">
                <i class="menu-icon mdi mdi-account-multiple-plus"></i>
                <span class="menu-title">Resources</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="user-client">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link"
                            href="{{ route('user.resource.show_resource') }}">Show Resources</a></li>
                    <li class="nav-item"> <a class="nav-link"
                            href="{{ route('user.resource.create_resource') }}">Create Resources</a></li>
                </ul>
            </div>
        </li> --}}

        {{-- <li class="nav-item">
            <a class="nav-link active" href="{{ route('user.calendar') }}">
                <i class="mdi mdi-calendar-clock menu-icon"></i>
                <span class="menu-title">Calendar</span>
            </a>
        </li> --}}

        {{-- <li class="nav-item">
            <a class="nav-link active" href="{{ route('user.reports') }}">
                <i class="menu-icon mdi mdi-chart-line"></i>
                <span class="menu-title">Reports</span>
            </a>
        </li> --}}

        {{-- <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#task" aria-expanded="false" aria-controls="task">
                <i class="menu-icon mdi mdi-calendar-text"></i>
                <span class="menu-title">Task</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="task">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link"
                            href="{{ route('user.task.show_task') }}">Show Task</a></li>
                    <li class="nav-item"><a class="nav-link"
                            href="{{ route('user.task.create_task') }}">Create Task</a></li>
                </ul>
            </div>
        </li> --}}

    </ul>
</nav>
