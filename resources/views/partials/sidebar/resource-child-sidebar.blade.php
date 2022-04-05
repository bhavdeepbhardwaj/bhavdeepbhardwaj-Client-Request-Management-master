<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link active" href="{{ route('resource.dashboard') }}">
          <i class="mdi mdi-grid-large menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#ticket" aria-expanded="false" aria-controls="ticket">
          <i class="menu-icon mdi mdi-card-text-outline"></i>
          <span class="menu-title">Ticket</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ticket">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"><a class="nav-link" href="{{ route('resource.ticket.show_ticket') }}">Show Ticket</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="{{ route('resource.task.show_task') }}">
          <i class="mdi mdi-calendar-text menu-icon"></i>
          <span class="menu-title">Task</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="{{ route('resource.comment') }}">
          <i class="mdi mdi-calendar-clock menu-icon"></i>
          <span class="menu-title">Comments</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="{{ route('resource.reports') }}">
          <i class="menu-icon mdi mdi-chart-line"></i>
          <span class="menu-title">Reports</span>
        </a>
      </li>
      {{--  <li class="nav-item nav-category">ADMIN / CLIENT</li>  --}}

      {{--  <li class="nav-item nav-category">Forms and Datas</li>  --}}



      <li class="nav-item">
        <a class="nav-link active" href="{{ route('resource.help') }}">
          <i class="mdi mdi-help-circle-outline menu-icon"></i>
          <span class="menu-title">Need Help</span>
        </a>
      </li>
      {{--  <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
          <i class="menu-icon mdi mdi-chart-line"></i>
          <span class="menu-title">Charts</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="charts">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="pages/charts/chartjs.html">ChartJs</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
          <i class="menu-icon mdi mdi-table"></i>
          <span class="menu-title">Tables</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="tables">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="pages/tables/basic-table.html">Basic table</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
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
          <span class="menu-title">User Pages</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="auth">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item nav-category">help</li>
      <li class="nav-item">
        <a class="nav-link" href="http://bootstrapdash.com/demo/star-admin2-free/docs/documentation.html">
          <i class="menu-icon mdi mdi-file-document"></i>
          <span class="menu-title">Documentation</span>
        </a>
      </li>  --}}
    </ul>
  </nav>
