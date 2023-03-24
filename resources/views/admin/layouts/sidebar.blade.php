<!--**********************************
            Sidebar start
        ***********************************-->
        <div class="deznav">
            <div class="deznav-scroll">
				<ul class="metismenu" id="menu">
                    <li><a href="{{url ('/dashboard')}}" aria-expanded="false">
							<span class="nav-text">Dashboard</span>
						</a>
                    </li>
                    @if(auth()->check()&& auth()->user()->role->name === 'admin')
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<span class="nav-text">Users</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="{{route ('staff.create')}}"><span class="font4a">Create New Account</span></a></li>
                            <li><a href="{{route ('staff.index')}}"><span class="font4a">Staff & Admin List</span></a></li>
                            <li><a href="{{route ('clients.index')}}"><span class="font4a">Clients List</span></a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<span class="nav-text">Appointments</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="{{route ('client.list')}}"><span class="font4a">Today's Appointments</span></a></li>
                            <li><a href="{{route ('client.listall')}}"><span class="font4a">All Appointments</span></a></li>
                            <li><a href="{{route ('client.cancelled')}}"><span class="font4a">Cancelled Appointments</span></a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<span class="nav-text">Services</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="{{route ('service.create')}}"><span class="font4a">Add Service</span></a></li>
                            <li><a href="{{route ('service.index')}}"><span class="font4a">View All</span></a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<span class="nav-text">Progress Reports</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="{{route ('adminprogress.index')}}"><span class="font4a">My Progress Reports</span></a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<span class="nav-text">Invoices</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="{{route ('admin-invoices.index')}}"><span class="font4a">My Invoices</span></a></li>
                        </ul>
                    </li>
                    @endif
                    @if (auth()->check()&& auth()->user()->role->name ==='staff')
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<span class="nav-text">Appointment Slots</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="{{route ('appointment.create')}}"><span class="font4a">Create New</span></a></li>
                            <li><a href="{{route ('appointment.index')}}"><span class="font4a">Check</span></a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<span class="nav-text">Appointments</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="{{route ('booking.list')}}"><span class="font4a">Today's Appointments</span></a></li>
                            <li><a href="{{route ('booking.listall')}}"><span class="font4a">All Appointments</span></a></li>  
                            <li><a href="{{route ('booking.cancelled')}}"><span class="font4a">Cancelled Appointments</span></a></li>  
                        </ul>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<span class="nav-text">Progress Reports</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="{{route ('progress.index')}}"><span class="font4a">My Progress Reports</span></a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<span class="nav-text">Invoices</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="{{route ('staff-invoices.index')}}"><span class="font4a">My Invoices</span></a></li>
                        </ul>
                    </li>
                     
                </ul>
                <a href="{{route ('appointment.create')}}">
				<button class="plus-box text-left" style="padding-top: 5px; padding-bottom: 15px !important;">
					<strong style="color:#e0333b !important;">&nbsp; Add New<br><span style="color: #450b5a;">Appointment Slot</span></strong>
                </button>
                </a>
                @endif 
                <div class="copyright" style="position: absolute; bottom: 0; margin-bottom: 0px !important;">
					<p><strong style="color:#450b5a !important">Mombasa IT Company</strong> © 2021 All Rights Reserved</p>
				</div>
			</div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->