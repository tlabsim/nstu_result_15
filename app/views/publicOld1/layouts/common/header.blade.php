<div class="row" style="margin: 0px;">
  <div class="col-md-12" style="padding: 0px;">
	  <nav class="navbar navbar-default" role="navigation">
		  <div class="container-fluid">
			  <div class="navbar-header">
				  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				  <span class="sr-only">Toggle navigation</span> 
				  <span class="icon-bar"></span> 
				  <span class="icon-bar"></span> 
				  <span class="icon-bar"></span>
				  </button> 
				  <a class="navbar-brand" href="#">NSTU Admission result 2014</a>
			  </div>
			  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				  <ul class="nav navbar-nav">
					  @yield('menu_items')
					  <li><a target="blank" href="http://www.nstu.edu.bd" style="margin: 0px 0px 0px 20px; padding: 0px;"><button type="button" class="btn btn-warning navbar-btn">Go to main site</button></a></li>
				  </ul>
				  <form class="navbar-form navbar-right" role="search" action="/search" method="post">
					  <div class="form-search search-only"><i class="search-icon glyphicon glyphicon-search"></i> 
					  <input name="keyword" title="Search by exam roll or HSC/SSC roll or registration number" class="form-control search-query" placeholder="Search">
					  </div>
				  </form>
			  </div>
		  </div>
	  </nav>
  </div>
</div>

