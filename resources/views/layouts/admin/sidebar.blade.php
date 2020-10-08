<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    @if(auth()->user()->role_id == 1)
        <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard.index') }}">
                <i class="mdi mdi-home menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('articles.index') }}">
            <i class="mdi mdi-package menu-icon"></i>
            <span class="menu-title">Articles</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('categories.index') }}">
            <i class="mdi mdi-file-tree menu-icon"></i>
            <span class="menu-title">Categories</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('comments.index') }}">
            <i class="mdi mdi-comment-multiple-outline menu-icon"></i>
            <span class="menu-title">Comments</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('words.create') }}">
            <i class="mdi mdi-comment-multiple-outline menu-icon"></i>
            <span class="menu-title">Add Words</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('school.index') }}">
            <i class="mdi mdi-file-document-box menu-icon"></i>
            <span class="menu-title">School</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('users.index') }}">
            <i class="mdi mdi-account menu-icon"></i>
            <span class="menu-title">Users</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#settings" aria-expanded="false" aria-controls="settings">
              <i class="mdi mdi-settings menu-icon"></i>
              <span class="menu-title">Settings</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="settings">
              <ul class="nav flex-column sub-menu">
                {{-- <li class="nav-item"> <a class="nav-link" href="{{ route('products.home') }}">Home Page Products</a></li> --}}
                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a></li>
              </ul>
            </div>
        </li>
    @endif
    @if(auth()->user()->role_id == 1 || auth()->user()->role_id == 2 || auth()->user()->role_id == 3 )
        <li class="nav-item">
            <a class="nav-link" href="{{ route('students.index') }}">
            <i class="mdi mdi-file-document-box menu-icon"></i>
            <span class="menu-title">دانش آموزان</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('reports.index') }}">
            <i class="mdi mdi-file-document-box menu-icon"></i>
            <span class="menu-title">همه کارنامه ها</span>
            </a>
        </li>
    @endif
  </ul>
</nav>
