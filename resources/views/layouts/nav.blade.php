<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{URL::to('/')}}">Brand</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      
      <ul class="nav navbar-nav navbar-right">
        <li><a href="{{URL::to('/cart')}}" class=" pulse animated ">
            <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart 
            <span class="badge badge-pill badge-info">{{session()->has('cart') ? session()->get('cart')->totalQt : ''}}</span>
        </a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-user" aria-hidden="true"></i> User
           <span class="caret"></span></a>
          <ul class="dropdown-menu">
            @if(! auth()->user())
              <li><a href="/register">Sign Up </a></li>
              <li><a href="/login">Login </a></li>
            @endif
            @if(auth()->user())
              <li><a href="/logout">Logout</a></li>
            @endif
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
