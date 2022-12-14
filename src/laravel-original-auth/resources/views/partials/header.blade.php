<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
    <span class="sr-only">Toggle navigation</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="#">認証デモ</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav navbar-right">

        {{-- ログインしているか判定 --}}
    @if(Auth::check())
        <li><a href="{{ route('user.logout') }}">ログアウト</a></li>
    @else
        <li><a href="{{route('user.signup')}}"><i class="fa fa-shopping-cart" aria-hidden="true"></i> 新規登録</a></li>
        <li><a href="#"><i class="fa fa-shopping-cart" aria-hidden="true"></i> ログイン</a></li>
    @endif
    </ul>
    </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
