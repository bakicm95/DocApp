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
			<li><a>Roles &amp; Permissions</a>
				<ul>
					<li><a href="{{ route('roles.index') }}">Roles</a></li>
					<li><a href="{{ route('permissions.index') }}">Permissions</a></li>
				</ul>
			</li>
		</ul>
		
	</aside>
</div>