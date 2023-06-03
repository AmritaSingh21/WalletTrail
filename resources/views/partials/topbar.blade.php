<div class="fixedbar">
<div class="top-bar" id="responsive-menu">
    <div class="top-bar-left">
        <ul class="dropdown menu horizontal" data-dropdown-menu>
            <li class="menu-text" style="font-size: 20px;">WalletTrail</li>
            <li><img src="{{asset('assets/wallet.png')}}"></li>
        </ul>
    </div>
    <div class="top-bar-right">
        <ul class="menu">
            <ul class="submenu menu horizontal" data-submenu>
                @guest
                <li>
                    <a href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                <li>
                    <a href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
                @endguest
            </ul>
        </ul>
    </div>
</div>
</div>