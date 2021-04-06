<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel = "icon" href ="{{asset('assets/user/peximg/logo.jpeg')}}" type = "image/x-icon">

    <title>PT. PAPUA EXPRESSINDO LOGISTIK @yield('title')</title>

    <!-- load CSS -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300">  <!-- Google web font "Open Sans" -->
    <link rel="stylesheet" href="{{asset('assets/user/css/bootstrap.min.css')}}">                                  <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="{{asset('assets/user/fontawesome/css/fontawesome-all.min.css')}}">                <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/user/slick/slick.css')}}"/>                       <!-- http://kenwheeler.github.io/slick/ -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/user/slick/slick-theme.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/user/css/tooplate-style.css')}}">                               <!-- Templatemo style -->

    <script>document.documentElement.className="js";var supportsCssVars=function(){var e,t=document.createElement("style");return t.innerHTML="root: { --tmp-var: bold; }",document.head.appendChild(t),e=!!(window.CSS&&window.CSS.supports&&window.CSS.supports("font-weight","var(--tmp-var)")),t.parentNode.removeChild(t),e};supportsCssVars()||alert("Please view this in a modern browser such as latest version of Chrome or Microsoft Edge.");</script>

    <script src="https://kit.fontawesome.com/44d59e8324.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="preloader">
        <div class="loading">
          <img src="{{asset('assets/user/img/Blinking squares.gif')}}" width="100">
        </div>
    </div>
    <div id="tm-bg"></div>
    <div id="tm-wrap">

        <div class="tm-main-content">
            <div class="container tm-site-header-container">
                <div class="row">
                    <div class="col-12">
                        @if (session('pesan'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                  {{session('pesan')}}
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                  </button>
                            </div>
                        @endif
                    </div>
                    @include('user.layouts.banner')
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="content">
                            <div class="grid">
                                @include('user.layouts.profile')

                                @include('user.layouts.partner')

                                @yield('modal_tracking')

                                @yield('modal_harga')

                                @include('user.layouts.tracking')

                                @include('user.layouts.kontak')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('user.layouts.footer')
        </div> <!-- .tm-main-content -->
    </div>
    <!-- load JS -->
    <script src="{{asset('assets/user/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('assets/user/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/user/slick/slick.min.js')}}"></script>
    <script src="{{asset('assets/user/js/anime.min.js')}}"></script>
    <script src="{{asset('assets/user/js/main.js')}}"></script>
    @yield('js')

    <script>
        $(document).ready(function(){
            $(".preloader").fadeOut();
        })
    </script>

    <script>

        function setupFooter() {
            var pageHeight = $('.tm-site-header-container').height() + $('footer').height() + 100;

            var main = $('.tm-main-content');

            if($(window).height() < pageHeight) {
                main.addClass('tm-footer-relative');
            }
            else {
                main.removeClass('tm-footer-relative');
            }
        }

        /* DOM is ready
        ------------------------------------------------*/
        $(function(){

            setupFooter();

            $(window).resize(function(){
                setupFooter();
            });
        });

    </script>

</body>
</html>
