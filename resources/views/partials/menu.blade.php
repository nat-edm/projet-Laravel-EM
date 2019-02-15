<!-- As a heading -->
<nav class="navbar navbar-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <span class="navbar-brand mb-0 h1"><strong>Boutique</strong> La maison</span>
            </div>
        </div>
    </div>
</nav>

<!-- As links -->
<nav class="navbar navbar-expand-lg navbar-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="container">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/')}}">Accueil</a>
                    </li>

                    @if(Route::is('admin.*') == false)
                    <li class="nav-item">
                        <a class="nav-item nav-link" href="{{url('product/solde')}}">Soldes</a>
                    </li>
                    @foreach ($categories as $id => $title)
                    <li class="nav-item">
                        <a class="nav-item nav-link"  href="{{url('category', $id)}}">{{$title}}</a>
                    </li>
                    @endforeach
                    @endif
                
                    <li class="nav-item">
                        @if(Auth::check())
                        <a class="nav-item nav-link" href="{{route('admin.index')}}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-item nav-link" href="{{route('admin.create')}}">Ajouter un produit</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-item nav-link text-right" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                                    document.getElementById('logout-form').submit();">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                        @else
                    </li>
                    <li class="nav-item">
                        <a class="nav-item nav-link" href="{{route('login')}}">Login</a>
                    </li>
                        @endif
                </ul>
            </div>
        </div>
    </div>
  </div>
</nav>

