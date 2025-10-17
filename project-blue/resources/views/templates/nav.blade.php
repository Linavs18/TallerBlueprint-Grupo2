<div class="sidebar" data-color="blue" data-image="{{ asset('assets/img/sidebar-4.jpg') }}">
    <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"
    -->
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="#" class="simple-text">
                Academy Blue
            </a>
        </div>
        <ul class="nav">
            <li>
                <a class="nav-link" href="dashboard.html">
                    <i class="nc-icon nc-chart-pie-35"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li>
                <a class="nav-link" href="{{ route('projects.index') }}">
                    <i class="nc-icon nc-circle-09"></i>
                    <p>Projectos</p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('tasks.index') }}">
                    <i class="nc-icon nc-notes"></i>
                    <p>Tareas</p>
                </a>
            </li>
            <li>
                <a class="nav-link" href="{{ route('users.index') }}">
                    <i class="nc-icon nc-circle-09"></i>
                    <p>Usuarios</p>
                </a>
            </li>            
        </ul>
    </div>
</div>