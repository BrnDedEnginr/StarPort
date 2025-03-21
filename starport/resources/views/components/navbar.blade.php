@php
    $theme = isset($_COOKIE['theme']) ? $_COOKIE['theme'] : 'light';
@endphp

<div class="navbar bg-base-100 shadow-sm">
    @auth
        <div class="flex-none">
            <label for="nav-drawer" class="btn btn-square btn-ghost drawer-button">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    class="inline-block h-5 w-5 stroke-current">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                    </path>
                </svg>
            </label>
        </div>
    @endauth
    <div class="flex-1">
        <a href="/" class="btn btn-ghost text-xl">StarPort</a>
    </div>
    <div class="flex-none">
        @guest
            <a href="/login">
                @if ($theme === 'dark')
                    <img src="/static/eve-login-black.png" />
                @else
                    <img src="/static/eve-login-white.png" />
                @endif
            </a>
        @endguest
        @auth
            <div class="dropdown dropdown-end">
                <div tabindex="0" role="button" class="avatar">
                    <div class="w-14 rounded-full">
                        <img src={{"https://images.evetech.net/characters/" . Auth::user()->character_id . "/portrait"}} />
                    </div>
                </div>
                <ul tabindex="0" class="dropdown-content menu bg-base-100 rounded-box z-1 w-52 p-2 shadow-sm">
                    <li><a href="/logout">Logout</a></li>
                </ul>
            </div>
        @endauth
    </div>
</div>