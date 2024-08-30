<style>
  .homemyBackgroundColorClass {
    background-color: rgb(40 41 49 / 56%);
  }

  .noHomeMyBackgroundColorClass {
    background-color: rgba(40, 41, 49, 1);
  }

  .search {
    position: relative;
    width: 190px;
  }

  .search input {
    border-radius: 30px;
    background-color: rgba(255, 255, 255, 0.1);
    border: none !important;
  }

  .search input:focus {
    box-shadow: none;
  }

  .search .fa-search {
    position: absolute;
    top: 5px;
    right: 9px
  }

  .searchinput::placeholder {
    color: rgba(255, 255, 255, 0.65);
  }
  .searchpc {
    position: relative;
    width: 310px;
  }

  .searchpc input {
    border-radius: 30px;
    background-color: rgba(255, 255, 255, 0.1);
    border: none !important;
  }

  .searchpc input:focus {
    box-shadow: none;
  }

  .searchpc .fa-search {
    position: absolute;
    top: 5px;
    right: 9px
  }

</style>
<header>
  @hook('header.before')

  <div class="header-content d-none d-lg-block">
    <div class="container-fluid navbar-expand-lg">
      @hookwrapper('header.menu.logo')
      <div class="logo"><a href="{{ shop_route('home.index') }}">
          <img src="{{ image_origin(system_setting('base.logo')) }}" class="img-fluid"></a>
      </div>
      @endhookwrapper
      <div class="menu-wrap">
        @include('shared.menu-pc')
      </div>
      <div class="right-btn" style="width: 30%;">
        <ul class="navbar-nav flex-row align-items-center" style="color: rgba(255, 255, 255, 0.6);">
          @hookwrapper('header.menu.icon')
          <li class="nav-item">
          <div class="searchpc" href="#offcanvas-search-top" data-bs-toggle="offcanvas" aria-controls="offcanvasExample"> <input type="text" class="searchinput form-control" placeholder="Search p roproducts"> <i class="fa fa-search iconfont">&#xe8d6;</i> </div>

            <!-- <a href="#offcanvas-search-top" data-bs-toggle="offcanvas" aria-controls="offcanvasExample" class="nav-link"><i class="iconfont">&#xe8d6;</i></a> -->
          </li>
          <li class="nav-item"><a href="{{ shop_route('account.wishlist.index') }}" class="nav-link"><i class="iconfont">&#xe662;</i></a></li>
          <li class="nav-item dropdown">
            <a href="{{ shop_route('account.index') }}" class="nav-link"><i class="iconfont">&#xe619;</i></a>
            <ul class="dropdown-menu">
              @auth('web_shop')
              <li class="dropdown-item">
                <h6 class="mb-0">{{ current_customer()->name }}</h6>
              </li>
              <li>
                <hr class="dropdown-divider opacity-100">
              </li>
              <li><a href="{{ shop_route('account.index') }}" class="dropdown-item"><i class="bi bi-person me-1"></i>
                  {{ __('shop/account.index') }}</a></li>
              <li><a href="{{ shop_route('account.order.index') }}" class="dropdown-item"><i class="bi bi-clipboard-check me-1"></i> {{ __('shop/account/order.index') }}</a></li>
              <li><a href="{{ shop_route('account.wishlist.index') }}" class="dropdown-item"><i class="bi bi-heart me-1"></i> {{ __('shop/account/wishlist.index') }}</a></li>
              <li>
                <hr class="dropdown-divider opacity-100">
              </li>
              <li><a href="{{ shop_route('logout') }}" class="dropdown-item"><i class="bi bi-box-arrow-left me-1"></i>
                  {{ __('common.sign_out') }}</a></li>
              @else
              <li><a href="{{ shop_route('login.index') }}" class="dropdown-item"><i class="bi bi-box-arrow-right me-1"></i>{{ __('shop/login.login_and_sign') }}</a></li>
              @endauth
            </ul>
          </li>
          @endhookwrapper
          <li class="nav-item">
            {{-- <a class="nav-link position-relative" {{ !equal_route('shop.carts.index') ? 'data-bs-toggle=offcanvas' : '' }}
            href="{{ !equal_route('shop.carts.index') ? '#offcanvas-right-cart' : 'javascript:void(0);' }}" role="button"
            aria-controls="offcanvasExample">
            <i class="iconfont">&#xe634;</i>
            <span class="cart-badge-quantity"></span>
            </a> --}}
            <a class="nav-link position-relative btn-right-cart {{ equal_route('shop.carts.index') ? 'page-cart' : '' }}" href="javascript:void(0);" role="button">
              <i class="iconfont">&#xe634;</i>
              <span class="cart-badge-quantity"></span>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>

  <div class="header-mobile d-lg-none">
    <div class="mobile-content">
      <div class="left">
        <div class="mobile-open-menu"><i class="bi bi-list"></i></div>
        <a href="{{ shop_route('home.index') }}" class="nav-link ms-2 m-cart position-relative">
          <img src="{{ image_origin(system_setting('base.logo')) }}" class="img-fluid">
        </a>
      </div>
      <div class="right align-items-center">
        <div class="search" href="#offcanvas-search-top" data-bs-toggle="offcanvas" aria-controls="offcanvasExample"> <input type="text" class="searchinput form-control" placeholder="Search p roproducts"> <i class="fa fa-search iconfont">&#xe8d6;</i> </div>

        <a href="{{ shop_route('carts.index') }}" class="nav-link ms-3 m-cart position-relative">
          <i class="iconfont">&#xe634;</i>
          <span class="cart-badge-quantity"></span>
        </a>
        <a href="{{ shop_route('account.index') }}" class="nav-link ms-3 m-cart position-relative">
          <i class="iconfont">&#xe619;</i>
          @if (strstr(current_route(), 'shop.account'))
          <span></span>
          @endif
        </a>

      </div>
    </div>
  </div>
  <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvas-mobile-menu">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">{{ __('common.menu') }}</h5>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body mobile-menu-wrap">
      @include('shared.menu-mobile')
    </div>
  </div>

  <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvas-right-cart" aria-labelledby="offcanvasRightLabel"></div>

  <div class="offcanvas offcanvas-top" tabindex="-1" id="offcanvas-search-top" aria-labelledby="offcanvasTopLabel">
    <div class="offcanvas-header">
      <input type="text" class="form-control input-group-lg border-0 fs-4" focus placeholder="{{ __('common.input') }}" value="{{ request('keyword') }}">
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
  </div>
  @hook('header.after')
</header>