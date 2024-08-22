<div class="sidebar sidebar-dark sidebar-fixed border-end" id="sidebar">
    <div class="sidebar-header border-bottom">
        <div class="sidebar-brand">
            <img src="{{ asset('assets/brand/wordmark.svg') }}" alt="Ngwe Khin" class="sidebar-brand-full" width="88"
                height="32">
        </div>
    </div>
    <ul class="sidebar-nav" data-coreui="navigation" data-simplebar>
        <li class="nav-item">
            <a class="nav-link" href="{{url('')}}">
                <svg class="nav-icon">
                    <use xlink:href="assets/sprites/free.svg#cil-speedometer"></use>
                </svg> Dashboard
            </a>
        </li>
        <li class="nav-title">Data Tables</li>
        <li class="nav-item"><a class="nav-link" href="{{ url('user') }}">
                <svg class="nav-icon">
                    <use xlink:href="assets/sprites/free.svg#cil-people"></use>
                </svg> Users
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{url('account-provider')}}">
                <svg class="nav-icon">
                    <use xlink:href="assets/sprites/free.svg#cil-drop"></use>
                </svg> Account Provider
            </a>
        </li>
        <li class="nav-item"><a class="nav-link" href="{{ url('category') }}">
                <svg class="nav-icon">
                    <use xlink:href="assets/sprites/free.svg#cil-pencil"></use>
                </svg> Category
            </a>
        </li>
    </ul>
</div>
