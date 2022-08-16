<!DOCTYPE html>
<html lang="en">
  <head>
    {{-- <title>{{ $tittle }}</title> --}}
    @livewireStyles
    <link type="text/css" rel="stylesheet" href="css/gighit-reset.css?v=<?php echo time();?>">
    <link type="text/css" rel="stylesheet" href="css/gighit-style.css?v=<?php echo time();?>">
    <style>
      @import url("https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap");
    </style>
  </head>
  <body class="dis-flex-col">
    
    <nav class="width-100">
      <div class="navbar width-100 dis-flex-row">
        @auth
          @if (Auth::user()->userType === 'admin')
            <div class="logo">GIGHIT</div>
            <div class="btn-kanan dis-flex-row width-resp">
              <a class="btn-underline" href="/admin-order">ORDER</a>
              <a class="btn-underline" href="/admin-gigpay">GIGPAY</a>
              <a class="btn-underline" href="/admin-transaction">TRANSACTION</a>
              <a class="btn-underline" href="/admin-edit">EDIT MENU</a>
              <a class="btn-underline" href="/account">ACCOUNT</a>
            </div>
          {{-- kalau bukan admin --}}
          @else
            <div class="btn-kiri dis-flex-row width-resp">
              <a href="/" class="btn-underline">HOME</a>
              <div class="dropdown">
                <button class="btn-underline">PRODUCTS</button>
                <div class="dropdown-content">
                  <a class="btn-white" href="/pizza">PIZZA</a>
                  <a class="btn-white" href="/drinks">DRINKS</a>
                  <a class="btn-white" href="/starters">STARTERS</a>
                </div>
              </div>
            </div>
            <div class="logo">GIGHIT'S PIZZA</div>
            <div class="btn-kanan dis-flex-row width-resp">
              <a class="btn-underline" href="/cart">CART</a>
              <a class="btn-underline" href="/account">ACCOUNT</a>
            </div>
          @endif
        {{-- kalau guest --}}
        @else
          <div class="btn-kiri dis-flex-row width-resp">
            <a href="/" class="btn-underline">HOME</a>
            <div class="dropdown">
              <button class="btn-underline">PRODUCTS</button>
              <div class="dropdown-content">
                <a class="btn-white" href="/pizza">PIZZA</a>
                <a class="btn-white" href="/drinks">DRINKS</a>
                <a class="btn-white" href="/starters">STARTERS</a>
              </div>
            </div>
          </div>
          <div class="logo">GIGHIT'S PIZZA</div>
          <div class="btn-kanan dis-flex-row width-resp">
            <a class="btn-underline" href="/cart">CART</a>
            <a class="btn-underline" href="/signin">SIGN IN</a>
          </div>
        @endauth

        <div class="small-resp">
          <button class="toggle-btn dis-flex-col" onclick="tampil('allMenu')">
            <div></div>
            <div></div>
            <div></div>
          </button>
        </div>
      </div>

      <div onclick="tutup('allMenu')" id="allMenu" class="parentDisable hide">
        <div class="toggle-div dis-flex-col">
          <div class="tittle-close">
            <button class="close btn-white" onclick="tutup('allMenu')">X</button>
          </div>
          @auth
            {{-- admin --}}
            @if (Auth::user()->userType === 'admin')
              <a class="btn-white left-pad" href="/admin-order">ORDER</a>
              <a class="btn-white left-pad" href="/admin-gigpay">GIGPAY</a>
              <a class="btn-white left-pad" href="/admin-transaction">TRANSACTION</a>
              <a class="btn-white left-pad" href="/admin-edit">EDIT MENU</a>
              <a class="btn-white left-pad" href="/account">ACCOUNT</a>
            {{-- customer --}}
            @else
              <a class="btn-white left-pad" href="/">HOME</a>
              <a class="btn-white left-pad" href="/pizza">PIZZA</a>
              <a class="btn-white left-pad" href="/drinks">DRINKS</a>
              <a class="btn-white left-pad" href="/starters">STARTERS</a>
              <a class="btn-white left-pad" href="/cart">CART</a>
              <a class="btn-white left-pad" href="/account">ACCOUNT</a>
            @endif
          {{-- guest --}}
          @else
            <a class="btn-white left-pad" href="/">HOME</a>
            <a class="btn-white left-pad" href="/pizza">PIZZA</a>
            <a class="btn-white left-pad" href="/drinks">DRINKS</a>
            <a class="btn-white left-pad" href="/starters">STARTERS</a>
            <a class="btn-white left-pad" href="/cart">CART</a>
            <a class="btn-white left-pad" href="/signin">SIGN IN</a>
          @endauth
        </div>
      </div>

    </nav>

    <section class="width-100">
      {{ $slot }}

      @if (session()->has('success'))
      <div onclick="tutup('alertSuccess')" id="alertSuccess" class="parentDisable">
          <div class="alert1 alert-success border-20 abs-center">
              <div class="alert1-title font-20">{{ session('success') }}</div>
              <button class="alert1-btnClose btn-white" onclick="tutup('alertSuccess')">X</button>
          </div>
      </div>
      @endif
      @if (session()->has('failed'))
      <div onclick="tutup('alertFailed')" id="alertFailed" class="parentDisable">
          <div class="alert1 alert-failed border-20 abs-center">
              <div class="alert1-title font-20">{{ session('failed') }}</div>
              <button class="alert1-btnClose btn-white" onclick="tutup('alertFailed')">X</button>
          </div>
      </div>
      @endif
    </section>

    <footer class="width-100 dis-flex-col">
      @auth
        @if (Auth::user()->userType === 'admin')
          <p class="love align-center pad-20">by Weni Ariska</p>
        @else
          <div class="sosmed width-100">
            <div>
              <p><img src="images/icon/instagram.png" alt="Icon Instagram" /> Instagram <span><a href="https://www.instagram.com/weniarisk_/" target="_blank">@weniarisk_</a></span></p>
            </div>
            <div>
              <p><img src="images/icon/linkedin.png" alt="Icon Facebook" /> LinkedIn <span><a href="http://www.linkedin.com/in/weniariska" target="_blank">Weni Ariska</a></span></p>
            </div>
            <div>
              <p>
                <img src="images/icon/whatsapp.png" alt="Icon Whatsapp" /> Whatsapp <span><a href="https://wa.me/085883171659" target="_blank">085883171659</a></span>
              </p>
            </div>
          </div>
          <p class="love align-center pad-20">by Weni Ariska</p>
        @endif
      @else
      <div class="sosmed width-100">
        <div>
          <p><img src="images/icon/instagram.png" alt="Icon Instagram" /> Instagram <span><a href="https://www.instagram.com/weniarisk_/" target="_blank">@weniarisk_</a></span></p>
        </div>
        <div>
          <p><img src="images/icon/linkedin.png" alt="Icon Facebook" /> LinkedIn <span><a href="http://www.linkedin.com/in/weniariska" target="_blank">Weni Ariska</a></span></p>
        </div>
        <div>
          <p>
            <img src="images/icon/whatsapp.png" alt="Icon Whatsapp" /> Whatsapp <span><a href="https://wa.me/085883171659" target="_blank">085883171659</a></span>
          </p>
        </div>
      </div>
      <p class="love align-center pad-20">by Weni Ariska</p>
      @endauth
    </footer>

    @livewireScripts
    <script type="text/javascript" src="javascript/gighit-js.js?v=<?php echo time();?>"></script>
  </body>
</html>
