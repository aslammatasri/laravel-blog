<div class="sidebar bg-light bg-white shadow-sm text-black p-3" style="width: 250px; height: 100%; position: absolute;">
    <ul class="nav flex-column">
        <li class="nav-item">
            <a href="{{ route('posts.index') }}" class="nav-link text-black">List of Post</a>
        </li>
        @guest

        @if (Route::has('register'))
        <li class="nav-item">
            <a href="{{ route('register') }}" class="nav-link text-black">Register</a>
        </li>
        @endif
        @else
        <li class="nav-item">
            <a href="{{ route('users.index') }}" class="nav-link text-black">List of Users</a>
        </li>
        <!-- <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link text-black"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li> -->
        @endguest
    </ul>
</div>