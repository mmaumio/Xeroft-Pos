<div class="container" id="header">
	<div class="page-header">
	  <h1><a href="{{ URL::to('/') }}">Xeroft</a> - <small>Point Of Sale</small></h1>
	</div>
    @if(Auth::check())
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
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="{{ URL::to('/my-account') }}">{{ Auth::user()->name }}</a></li>
                        <li><a href="#">Dashboard</a></li>
                      	<li><a href="{{ route('customers.index') }}">Customers</a></li> 
                      	<li><a href="{{ URL::to('/items') }}">Items</a></li> 
                      	<li><a href="{{ URL::to('/suppliers') }}">Suppliers</a></li>
                        <li><a href="{{ URL::to('/receivings') }}">Receivings</a></li>
                      	<li><a href="#">Sales</a></li>
                        <li><a href="{{ URL::to('/employees') }}">Employees</a></li>
                        <li><a href="{{ URL::to('/logout') }}">Logout</a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>
    @endif    
</div>