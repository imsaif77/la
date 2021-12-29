
        <div class="deznav">
            <div class="deznav-scroll">
				<ul class="metismenu" id="menu">
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i class="flaticon-381-networking"></i>
							<span class="nav-text">Dashboard</span>
						</a>
                        <ul aria-expanded="false">
							<li><a href="{{route('dashboard')}}">Dashboard</a></li>
							<!-- <li><a href="workout-statistic.html">Workout Statistic</a></li>
							<li><a href="workout-plan.html">Workout Plan</a></li>
							<li><a href="distance-map.html">Distance Map</a></li>
							<li><a href="food-menu.html">Diet Food Menu</a></li> -->
							<li><a href="personal-record.html">Personal Record</a></li>
						</ul>
                    </li>
                    <li><a href="widget-basic.html" class="ai-icon" aria-expanded="false">
							<i class="flaticon-381-settings-2"></i>
							<span class="nav-text">Bounty</span>
						</a>
					</li>
					<li><a href="{{route('buy-token')}}" class="ai-icon" aria-expanded="false">
							<i class="flaticon-381-settings-2"></i>
							<span class="nav-text">Buy Token</span>
						</a>
					</li>

					<hr>

					@role('Admin')
					<li><a class="has-arrow ai-icon" href="javascript:void()" >
							<i class="flaticon-381-networking"></i>
							<span class="nav-text">Access</span>
						</a>
                        <ul >
							<li><a href="{{route('user.index')}}">User Management</a></li>
							<li><a href="{{route('roles.index')}}">Role Management</a></li>
						</ul>
                    </li>

					<li><a class="has-arrow ai-icon" href="javascript:void()" >
							<i class="flaticon-381-networking"></i>
							<span class="nav-text">Setting</span>
						</a>
                        <ul >
							<li><a href="{{route('token-setting')}}">Token Setting</a></li>
						</ul>
                    </li>

					<li><a class="has-arrow ai-icon" href="javascript:void()" >
							<i class="flaticon-381-networking"></i>
							<span class="nav-text">Debug Site</span>
						</a>
                        <ul >
							<li><a href="{{ route('log-viewer::dashboard') }}">Debug Dashboard</a></li>
							<li><a href="{{ route('log-viewer::logs.list') }}">Logs</a></li>
						</ul>
                    </li>
					@endrole


                   
                </ul>
				<div class="drum-box">
					<img src="images/card/drump.png" alt="">
					<p class="fs-18 font-w500 mb-4">Start Plan Your Workout</p>
					<a class="" href="javascript:;">Check schedule
					<svg class="ml-3" width="6" height="12" viewBox="0 0 6 12" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M0 12L6 6L0 0" fill="#BCD7FF"/>
					</svg>
					</a>
				</div>
				<div class="copyright">
					<p><strong>Fito Fitness Admin Dashboard</strong> ©All Rights Reserved</p>
					<p>by </p>
				</div>
			</div>
        </div>