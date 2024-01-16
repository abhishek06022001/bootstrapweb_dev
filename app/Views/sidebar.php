<!-- <nav class="navbar navbar-expand-lg navbar-light bg-light position-fixed w-100">
	<a class="navbar-brand" href="#"></a>
	<div id="open-menu" class="menu-bar">
		<div class="bars"></div>
	</div>
	
</nav> -->
<nav class="navbar navbar-expand-lg navbar-light bg-light position-fixed w-100">


	<div id="open-menu" class="menu-bar">
		<div class="bars"></div>
	</div>

	<div class="navbar-collapse justify-content-end">
		<ul class="navbar-nav">

			<li class="nav-item">
				<form action="<?= base_url('logout') ?>" method="GET">
					<a class="nav-link btn btn-link" style="color:white; cursor:pointer;"
						onclick="this.parentNode.submit(); return false;">Logout</a>
				</form>
			</li>
		</ul>
	</div>
</nav>
<div class="side-bar show-menu">
	<div class="side-bar-links">
		<div class="side-bar-logo text-center py-3">
			<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQMYFlbwssdYaw5BnGLChsIMXSj1WMyqcwAjaxRI5M_yDvA42Dj44zF1YtmVJjBFvqrxEE&usqp=CAU"
				class="img-fluid rounded-circle border bg-secoundry mb-3">
			<h5>ADMIN</h5>
		</div>
		<ul class="navbar-nav">
			<li class="nav-item">
				<a href="<?= base_url('header'); ?>" class="nav-links d-block"><i class="fa fa-home pr-2"></i>
					Header</a>

			</li>
			<li class="nav-item">
				<a href="<?= base_url('product'); ?>" class="nav-links d-block"><i class="fa fa-home pr-2"></i>
					Product</a>
			</li>
			<li class="nav-item">
				<a href="<?= base_url('slidertable'); ?>" class="nav-links d-block"><i class="fa fa-home pr-2"></i>
					Slider</a>
			</li>

		</ul>
	</div>

</div>