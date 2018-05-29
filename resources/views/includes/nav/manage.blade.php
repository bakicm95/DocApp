<div class="side-menu">
	<aside class="menu m-t-30 m-l-10">
		<p class="menu-label">General</p>
		<ul class="menu-list"> {{-- Dashboard Link --}}
			<li><a href="{{ route('manage.dashboard') }}">Dashboard</a></li>
		</ul>

		<p class="menu-label">Patients</p>
		<ul class="menu-list">
			<li><a href="{{ route('patients.index') }}">Manage Patients</a></li>
			<li><a href="{{ route('appointments.index') }}">Appointments</a></li>
		</ul>
		
		<p class="menu-label">Administration</p>
		<ul class="menu-list">
			<li><a href="{{ route('users.index') }}">Manage Users</a></li>
			<li><a class="has-submenu">Roles &amp; Permissions</a>
				<ul class="submenu">
					<li><a href="#">Roles</a></li>
					<li><a href="#">Permissions</a></li>
				</ul>
			</li>
		</ul>
		
	</aside>
</div>