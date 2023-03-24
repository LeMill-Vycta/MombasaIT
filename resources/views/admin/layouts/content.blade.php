<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
		<div class="container-fluid">
				<div class="d-flex mb-3 mb-md-5 align-items-start">
					<div class="mr-auto d-none d-lg-block">
						<h3 class="text-primary font-w600">Welcome to Mombasa IT Company!</h3>
						@if(auth()->check()&& auth()->user()->role->name === 'admin')
						<p class="lead">This is the Admin Dashboard</p>
						@endif
						@if(auth()->check()&& auth()->user()->role->name === 'staff')
						<p class="lead">This is the Staff Dashboard</p>
						@endif
					</div>
					@if (session()->has('flash_notification.success')) 
					<div class="ml-auto d-inline-flex alert alert-success">
						{!! session('flash_notification.success') !!}
					    <button type="button" class="close" data-dismiss="alert">&nbsp;×</button>    
					</div>
					@endif
				</div>
            <div class="row">
			  <div class="col-xl-6 col-xxl-12">
				<div class="row">							
					<div class="col-xl-3 col-lg-6 col-sm-6">
						<div class="widget-stat card bg-danger">
							<div class="card-body  p-4">
								<div class="media">
									<span class="mr-3">
									<svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24" fill="white" width="40" height="40"><path d="M0,3v8H11V0H3A3,3,0,0,0,0,3Z"/><path d="M0,21a3,3,0,0,0,3,3h8V13H0Z"/><path d="M13,13V24h8a3,3,0,0,0,3-3V13Z"/><polygon points="17 11 19 11 19 7 23 7 23 5 19 5 19 1 17 1 17 5 13 5 13 7 17 7 17 11"/></svg>
									</span>
									<div class="media-body text-white text-right">
										<p class="mb-1" style="font-size: 15px; font-weight: 600;">New Appointments</p>
										@if (auth()->check()&& auth()->user()->role->name === 'staff')
										<h3 class="text-white">{{$newappstaff->count()}}</h3>
										@endif
										@if (auth()->check()&& auth()->user()->role->name === 'admin')
										<h3 class="text-white">{{$newappall->count()}}</h3>
										@endif
									</div>
								</div>
							</div>
						</div>
                    </div>
					<div class="col-xl-3 col-lg-6 col-sm-6">
						<div class="widget-stat card bg-primary">
							<div class="card-body p-4">
								<div class="media">
									<span class="mr-3">
									<svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24" fill="white" width="40" height="40"><circle cx="9" cy="6" r="6"/><path d="M13.043,14H4.957A4.963,4.963,0,0,0,0,18.957V24H18V18.957A4.963,4.963,0,0,0,13.043,14Z"/><polygon points="21 10 21 7 19 7 19 10 16 10 16 12 19 12 19 15 21 15 21 12 24 12 24 10 21 10"/></svg>
									</span>
									<div class="media-body text-white text-right">
										<p class="mb-1" style="font-size: 15px; font-weight: 600;">Total<br>Clients</p>
										<h3 class="text-white">{{$totalClients->count()}}</h3>
									</div>
								</div>
							</div>
						</div>
                    </div>
					<div class="col-xl-3 col-lg-6 col-sm-6">
						<div class="widget-stat card bg-info">
							<div class="card-body p-4">
								<div class="media">
									<span class="mr-3">
									<svg id="Layer_1" height="40" fill="white" viewBox="0 0 24 24" width="40" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1"><path d="m8.474 11a5.5 5.5 0 1 1 5.5-5.5 5.506 5.506 0 0 1 -5.5 5.5zm8.526-1a7 7 0 1 0 7 7 7.008 7.008 0 0 0 -7-7zm2 10.414-3-3v-4.414h2v3.586l2.414 2.414zm-11-3.414a8.938 8.938 0 0 1 .947-4h-3.947a5.006 5.006 0 0 0 -5 5v6h11.349a8.98 8.98 0 0 1 -3.349-7z"/></svg>									</span>
									<div class="media-body text-white text-right">
										<p class="mb-1" style="font-size: 15px; font-weight: 600;">Total<br>Staff</p>
										<h3 class="text-white">{{$totalStaff->count()}}</h3>
									</div>
								</div>
							</div>
						</div>
                    </div>
					<div class="col-xl-3 col-lg-6 col-sm-6">
						<div class="widget-stat card bg-success">
							<div class="card-body p-4">
								<div class="media">
									<span class="mr-3">
									<svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24" fill="white" width="40" height="40"><circle cx="7" cy="22" r="2"/><circle cx="17" cy="22" r="2"/><path d="M22.813,9.583A6,6,0,0,1,12.8,3H4.242L4.2,2.648A3,3,0,0,0,1.222,0H0V2H1.222a1,1,0,0,1,.993.883L3.8,16.351A3,3,0,0,0,6.778,19H20V17H6.778a1,1,0,0,1-.993-.884L5.654,15H21.836Z"/><path d="M17.111,9.542h-.033a1.872,1.872,0,0,1-1.345-.6l-2.306-2.4L14.868,5.16,17.112,7.5,21.3,3.3l1.414,1.414L18.446,8.989A1.873,1.873,0,0,1,17.111,9.542Z"/></svg>
									</span>
									<div class="media-body text-white text-right">
										@if (auth()->check()&& auth()->user()->role->name === 'staff')
										<p class="mb-1" style="font-size: 15px; font-weight: 600;">Your<br>Service Revenue</p>
										<h3 class="text-white">Ksh. {{$staffRevenue}}</h3>
										@endif
										@if (auth()->check()&& auth()->user()->role->name === 'admin')
										<p class="mb-1" style="font-size: 15px; font-weight: 600;">Total<br>Service Revenue</p>
										<h3 class="text-white">Ksh. {{$adminRevenue}}</h3>
										@endif
									</div>
								</div>
							</div>
						</div>
                    </div>
					
                </div>
              </div>
            </div>
					
			<div class="col-lg-12">
				<div class="card">
					<div class="card-header"><h4 class="card-title">Appointment Schedule</h4></div>
						<div class="card-body">
							<div id="calendar"></div>
							<style>
						    .fc-scroller {
										overflow-y: hidden !important;
										}
							</style>
						</div> 
					</div>							
				</div>
			</div>
			<div class="row">
			  <div class="col-xl-6 col-xxl-12">
				<div class="row">
					<div class="col-lg-3">
						<div class="card">
							<div class="social-graph-wrapper widget-facebook">
								<span class="s-icon"><i class="fa fa-facebook-square"></i></span>
							</div>
							<div class="row">
								<div class="col-6 border-right">
									<div class="pt-3 pb-3 pl-0 pr-0 text-center">
										<h4 class="m-1"><span class="counter">89</span> k</h4>
										<p class="m-0">Friends</p>
									</div>
								</div>
								<div class="col-6">
									<div class="pt-3 pb-3 pl-0 pr-0 text-center">
										<h4 class="m-1"><span class="counter">19</span> k</h4>
										<p class="m-0">Posts</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="card">
							<div class="social-graph-wrapper" style="background-color:purple;">
								<span class="s-icon"><i class="fa fa-instagram"></i></span>
							</div>
							<div class="row">
								<div class="col-6 border-right">
									<div class="pt-3 pb-3 pl-0 pr-0 text-center">
										<h4 class="m-1"><span class="counter">27</span> k</h4>
										<p class="m-0">Followers</p>
									</div>
								</div>
								<div class="col-6">
									<div class="pt-3 pb-3 pl-0 pr-0 text-center">
										<h4 class="m-1"><span class="counter">2</span> k</h4>
										<p class="m-0">Posts</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="card">
							<div class="social-graph-wrapper widget-twitter">
								<span class="s-icon"><i class="fa fa-twitter"></i></span>
							</div>
							<div class="row">
								<div class="col-6 border-right">
									<div class="pt-3 pb-3 pl-0 pr-0 text-center">
										<h4 class="m-1"><span class="counter">89</span> k</h4>
										<p class="m-0">Followers</p>
									</div>
								</div>
								<div class="col-6">
									<div class="pt-3 pb-3 pl-0 pr-0 text-center">
										<h4 class="m-1"><span class="counter">23</span> k</h4>
										<p class="m-0">Tweets</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="card">
							<div class="social-graph-wrapper" style="background-color:#25D366;">
								<span class="s-icon"><i class="fa fa-whatsapp"></i></span>
							</div>
							<div class="row">
								<div class="col-6 border-right">
									<div class="pt-3 pb-3 pl-0 pr-0 text-center">
										<h4 class="m-1"><span class="counter">50</span> k</h4>
										<p class="m-0">Friends</p>
									</div>
								</div>
								<div class="col-6">
									<div class="pt-3 pb-3 pl-0 pr-0 text-center">
										<h4 class="m-1"><span class="counter">3</span> k</h4>
										<p class="m-0">Chats</p>
									</div>
								</div>
							</div>
						</div>
					</div>
                </div>
              </div>
            </div>
        </div>
        </div>

        <!--**********************************
            Content body end
        ***********************************-->