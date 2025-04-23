<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Extracurricular</div>
    </a>
 
    <!-- Divider -->
    <hr class="sidebar-divider my-0">
 
    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('home') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>
 
    <!-- Nav Item - Teachers -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('teachers.index') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Teachers</span>
        </a>
    </li>
 
    <!-- Nav Item - Students -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('students.index') }}">
            <i class="fas fa-fw fa-user-graduate"></i>
            <span>Students</span>
        </a>
    </li>
 
    <!-- Nav Item - Positions -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('positions.index') }}">
            <i class="fas fa-fw fa-briefcase"></i>
            <span>Positions</span>
        </a>
    </li>
 
    <!-- Nav Item - Generations -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('generations.index') }}">
            <i class="fas fa-fw fa-calendar"></i>
            <span>Generations</span>
        </a>
    </li>
 
    <!-- Nav Item - Comments -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('comments.index') }}">
            <i class="fas fa-fw fa-comments"></i>
            <span>Comments</span>
        </a>
    </li>
 