<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link active" href="{{ route('client.dashboard') }}">
                <i class="mdi mdi-grid-large menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>

        {{-- <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#employee" aria-expanded="false" aria-controls="employee">
          <i class="menu-icon mdi mdi-account-multiple-plus"></i>
          <span class="menu-title">Employee</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="employee">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ route('client.employee.show_employee') }}">Show employees</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('client.employee.create_employee') }}">Create employees</a></li>
          </ul>
        </div>
      </li> --}}

        {{-- <li class="nav-item">
        <a class="nav-link active" href="{{ route('client.calendar') }}">
          <i class="mdi mdi-calendar-clock menu-icon"></i>
          <span class="menu-title">Calendar</span>
        </a>
      </li> --}}

        {{-- <li class="nav-item">
        <a class="nav-link active" href="{{ route('client.reports') }}">
          <i class="menu-icon mdi mdi-chart-line"></i>
          <span class="menu-title">Reports</span>
        </a>
      </li> --}}

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
                            href="{{ route('client.ticket.show_ticket') }}">Show Ticket</a></li>
                    <li class="nav-item"><a class="nav-link"
                            href="{{ route('client.ticket.create_ticket') }}">Create Ticket</a></li>
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
                    <li class="nav-item"> <a class="nav-link" href="{{ route('client.comment.view_comment')}}">View Comment</a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link active" href="{{ route('client.help') }}">
                <i class="mdi mdi-help-circle-outline menu-icon"></i>
                <span class="menu-title">Need Help</span>
            </a>
        </li>

        {{-- <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#task" aria-expanded="false" aria-controls="task">
                <i class="menu-icon mdi mdi-calendar-text"></i>
                <span class="menu-title">Task</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="task">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link"
                            href="{{ route('client.task.show_task') }}">Show Task</a></li>
                    <li class="nav-item"><a class="nav-link"
                            href="{{ route('client.task.create_task') }}">Create Task</a></li>
                </ul>
            </div>
        </li> --}}

        {{-- <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#tables" aria-expanded="false"
                aria-controls="tables">
                <i class="menu-icon mdi mdi-table"></i>
                <span class="menu-title">Tables</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="tables">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="pages/tables/basic-table.html">Basic
                            table</a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#icons" aria-expanded="false"
                aria-controls="icons">
                <i class="menu-icon mdi mdi-layers-outline"></i>
                <span class="menu-title">Icons</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="icons">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="pages/icons/mdi.html">Mdi icons</a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item nav-category">pages</li>

        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                <i class="menu-icon mdi mdi-account-circle-outline"></i>
                <span class="menu-title">client Pages</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item nav-category">help</li>

        <li class="nav-item">
            <a class="nav-link" href="http://bootstrapdash.com/demo/star-client2-free/docs/documentation.html">
                <i class="menu-icon mdi mdi-file-document"></i>
                <span class="menu-title">Documentation</span>
            </a>
        </li> --}}
    </ul>
</nav>
