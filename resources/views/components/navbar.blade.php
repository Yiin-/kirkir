<div class="navbar">
	@auth
		@include ('components.navbar.user_info')
	@else
		@include ('components.navbar.auth_links')
	@endguest
</div>
