<?php require_once APP_ROOT . '/views/admin/inc/head.php'; ?>
<script src="moment.js"></script>
	<section class="tg-dash intro-manual" data-step="1" data-hint="Hello start with  this one">
		<h1>Dashboard</h1>
	</section>
	<?php if($data['user'][0]->user_type == 1):?>
	<section class="main-section mar-30">
		<div class="row" data-intro='Here you will see the graphical representation of <em>Monthly/Pending request, Chemicals in laboratory and number of Registered student</em>".' data-step="7">
			<div class="col-4">
				<sup><i class="fal fa-question-circle" style="font-size:12px;" title="Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eligendi est eaque laborum eum sit? Ipsa earum dolor velit non praesentium architecto hic cupiditate fugiat sed. Maiores quod repellendus aliquam commodi."></i></sup>
				<div class="col-wrap pad-30">
					<figure>
						<img src="/img/icons/col-1.png">				
					</figure>
					<div class="col-content">
						<p><?php print_r($data['avg'])?></p>
						<h3>Avg. Request/month</h3>
						<a href="#" class="graphDetails" data-intro='To check the statistics of the request click <em>view details</em>".' data-step="8">view details <i class="fal fa-angle-right"></i></a>						
					</div>
				</div>
			</div>
			<div class="col-4">
				<sup><i class="fal fa-question-circle" style="font-size:12px;" title="Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eligendi est eaque laborum eum sit? Ipsa earum dolor velit non praesentium architecto hic cupiditate fugiat sed. Maiores quod repellendus aliquam commodi."></i></sup>
				<div class="col-wrap pad-30">
					<figure>
						<img src="/img/icons/clock.png">				
					</figure>
					<div class="col-content">
						<p><?php print_r($data['pending'])?></p>
						<h3>Pending Request</h3>
						<a href="#">view details <i class="fal fa-angle-right"></i></a>
					</div>
				</div>
			</div>
			<div class="col-4">
				<sup><i class="fal fa-question-circle" style="font-size:12px;" title="Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eligendi est eaque laborum eum sit? Ipsa earum dolor velit non praesentium architecto hic cupiditate fugiat sed. Maiores quod repellendus aliquam commodi."></i></sup>
				<div class="col-wrap pad-30">
					<figure>
						<img src="/img/icons/chemistry.png">				
					</figure>
					<div class="col-content">
						<p><?php print_r($data['chem'])?></p>
						<h3>Chemical in Lab</h3>
						<a href="#">view details <i class="fal fa-angle-right"></i></a>
					</div>
				</div>
			</div>
			<div class="col-4">
				<sup><i class="fal fa-question-circle" style="font-size:12px;" title="Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eligendi est eaque laborum eum sit? Ipsa earum dolor velit non praesentium architecto hic cupiditate fugiat sed. Maiores quod repellendus aliquam commodi."></i></sup>
				<div class="col-wrap pad-30">
					<figure>
						<img src="/img/icons/col-4.png">				
					</figure>
					<div class="col-content">
						<p><?php print_r($data['user_count'])?></p>
						<h3>University Users</h3>
						<a href="#">view details <i class="fal fa-angle-right"></i></a>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="offices-msgs dataGraph things-notdone">
		<div class="alerts-notif">
			<div class="alert-content" style="height:400px;">
				<div class="content-head">
					<h2>Monthly Request <sup><i class="fal fa-question-circle" style="font-size:12px;" title="Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eligendi est eaque laborum eum sit? Ipsa earum dolor velit non praesentium architecto hic cupiditate fugiat sed. Maiores quod repellendus aliquam commodi."></i></sup></h2>
				</div>
				<div id="log">
					<canvas id="monthlyRequest" height="270"></canvas>
				</div>
			</div>
		</div>
		<div class="alerts-notif">
			<div class="alert-content" style="height:400px;">
				<div class="content-head">
					<h2>Request Origin <sup><i class="fal fa-question-circle" style="font-size:12px;" title="Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eligendi est eaque laborum eum sit? Ipsa earum dolor velit non praesentium architecto hic cupiditate fugiat sed. Maiores quod repellendus aliquam commodi."></i></sup></h2>
				</div>
				<div class="ad-log">
					<canvas id="departmentRequest" height="270"></canvas>
				</div>
			</div>
		</div>
		<div class="alerts-notif">
			<div class="alert-content" style="height:400px;">
				<div class="content-head">
					<h2>Chemical Requested <sup><i class="fal fa-question-circle" style="font-size:12px;" title="Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eligendi est eaque laborum eum sit? Ipsa earum dolor velit non praesentium architecto hic cupiditate fugiat sed. Maiores quod repellendus aliquam commodi."></i></sup></h2>
				</div>
				<div class="ad-log">
					<canvas id="mostReqChem" height="270"></canvas>
				</div>
			</div>	
		</div>
	</section>
	
	<section class="offices-msgs" style="justify-content:left;"  data-step="2" data-hint="Number of request from idela users">
		<div class="alerts-notif" style="width:40%;">
			<div class="alert-content" data-intro='Users needs to be verified before requesting chemicals. Here are the list of <em>Registration request</em>".' data-step="9">
				<div class="content-head">
					<h2>Latest Registration <sup><i class="fal fa-question-circle" style="font-size:12px;" title="Admin can approve the student registration in here. Account listed in here are not allowed to request anything. Red are Faculty"></i></sup></h2>
				</div>
				<div class="ad-log" style="padding:5px;">
					<ul class="mCustomScrollbar content fluid light" data-mcs-theme="inset-2-dark" style="height: 400px;width: 100%;">
					<!-- 	<li>							
							<span class="tg-adverified cat_chemical">Department</span>
							<h3>Clint Anthony Abueva</h3>
							<time datetime="2017-08-08">01 Day Ago</time>									
						</li> -->
					</ul>
				</div>
			</div>
		</div>
		<div class="alerts-notif" style="width:60%;">
			<div class="alert-content" data-intro='Any attempt to access or any activity is login in here with the <em>Origin of the request</em>".' data-step="10">
				<div class="content-head">
					<h2>System Logs <sup><i class="fal fa-question-circle" style="font-size:12px;" title="Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eligendi est eaque laborum eum sit? Ipsa earum dolor velit non praesentium architecto hic cupiditate fugiat sed. Maiores quod repellendus aliquam commodi."></i></sup></h2>
				</div>
				<div id="log">
					<ul id="content-log-list" class="mCustomScrollbar content fluid light" data-mcs-theme="inset-2-dark" style="height: 400px;width: 100%;">
					</ul>
				</div>
			</div>
		</div>
	</section>
    <?php endif;?>

	<section class="updates-msgs things-notdone" style="display:flex;flex-direction:row;">
	<?php if($data['user'][0]->user_type == 1):?>
		<div class="msgs-acc" style="width:66.66%;">
			<div class="msgs-container" data-intro='Communication is essential. Here you can <em>Message</em> the registered faculty".' data-step="11">
				<div class="content-head">
					<h2>Faculty Messages</h2>
				</div>	
				<div id="msgs-update-3-col">
					<div class="msgs-3-col-item" style="width:40.33%;">
						<div id="search-sort" class="job-search-field" style="margin: 10px 15px;">
							<input type="text" name="search" autocomplete="off" placeholder="Search Here" style="width: 100%;">
							<i class="fal fa-search"></i>
						</div>
						<ul class="jobs-updates bidders">
							<li>
								<div>
								<img src="/img/icons/small-prof.jpg" /> <span>Lissa Heir</span>									
								</div>
								<span class="acc-status-online"></span>
							</li>
						</ul>
					</div>
					<div class="msgs-3-col-item" style="width:59.66%;">
						<div class="message-container">
							<div class="message-reciever">
								<img src="/img/icons/small-prof.jpg" />
								<div class="msg-content">
									<p>Duis aute irure dolor in reprehenderit in voluptate velit esse
									cillum dolore eu fugiat nulla pariatur.</p>
									<span>Jan. 13, 2019</span>
								</div>
							</div>
							<div class="current-user-sender">
								<div class="msg-content">
									<p>Duis aute irure dolor in reprehenderit in voluptate velit esse
									cillum dolore eu fugiat nulla pariatur.</p>
									<span>Jan. 13, 2019 <i class="far fa-check"></i></span>
								</div>
								<img src="/img/icons/small-prof.jpg" />
							</div>
							<div class="message-reciever">
								<img src="/img/icons/small-prof.jpg" />
								<div class="msg-content">
									<p>Duis aute irure dolor in reprehenderit in voluptate velit esse
									cillum dolore eu fugiat nulla pariatur.</p>
									<span>Jan. 13, 2019</span>
								</div>
							</div>
							<div class="message-reciever">
								<img src="/img/icons/small-prof.jpg" />
								<div class="msg-content">
									<p>Duis aute irure dolor in reprehenderit in voluptate velit esse
									cillum dolore eu fugiat nulla pariatur.</p>
									<span>Jan. 13, 2019</span>
								</div>
							</div>
						</div>
						<div class="input-msgs-content">
							<div class="container-of-msgs">
								<div class="ctl-msg" contenteditable>
									<label for="typing-msg">Type here your message</label>
								</div>
								<div class="cta-buttons">
									<i class="fal fa-thumbs-up"></i>
									<i class="fal fa-thumbs-down"></i>
									<span>Send</span>
								</div>
							</div>
						</div>
					</div>
				</div>			
			</div>			
		</div>
	<?php else:?>		
		<div class="row" style="display: grid;grid-template-columns: repeat(2,1fr);width: 66.66%;grid-template-rows: repeat(2,1fr);grid-gap: 10px;" data-intro='Here you will see the graphical representation of <em>Monthly/Pending request, Chemicals in laboratory and number of Registered student</em>".' data-step="7">
			<div class="col-4" style="width:unset;margin:unset;">
				<sup><i class="fal fa-question-circle" style="font-size:12px;" title="Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eligendi est eaque laborum eum sit? Ipsa earum dolor velit non praesentium architecto hic cupiditate fugiat sed. Maiores quod repellendus aliquam commodi."></i></sup>
				<div class="col-wrap pad-30" style="margin-top:50px;">
					<figure style="width:100px;">
						<img src="/img/icons/col-1.png">				
					</figure>
					<div class="col-content">
						<p style="font-size:35px;"><?php print_r($data['avg'])?></p>
						<h3 style="font-size: 24px;">Avg. Request/month</h3>
					</div>
				</div>
			</div>
			<div class="col-4" style="width:unset;margin:unset;">
				<sup><i class="fal fa-question-circle" style="font-size:12px;" title="Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eligendi est eaque laborum eum sit? Ipsa earum dolor velit non praesentium architecto hic cupiditate fugiat sed. Maiores quod repellendus aliquam commodi."></i></sup>
				<div class="col-wrap pad-30" style="margin-top:50px;">
					<figure style="width:100px;">
						<img src="/img/icons/clock.png">				
					</figure>
					<div class="col-content">
						<p style="font-size:35px;"><?php print_r($data['pending'])?></p>
						<h3 style="font-size: 24px;">Pending Request</h3>
					</div>
				</div>
			</div>
			<div class="col-4" style="width:unset;margin:unset;">
				<sup><i class="fal fa-question-circle" style="font-size:12px;" title="Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eligendi est eaque laborum eum sit? Ipsa earum dolor velit non praesentium architecto hic cupiditate fugiat sed. Maiores quod repellendus aliquam commodi."></i></sup>
				<div class="col-wrap pad-30" style="margin-top:50px;">
					<figure style="width:100px;">
						<img src="/img/icons/chemistry.png">				
					</figure>
					<div class="col-content">
						<p style="font-size:35px;"><?php print_r($data['chem'])?></p>
						<h3 style="font-size: 24px;">Chemical in Lab</h3>
					</div>
				</div>
			</div>
			<div class="col-4" style="width:unset;margin:unset;">
				<sup><i class="fal fa-question-circle" style="font-size:12px;" title="Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eligendi est eaque laborum eum sit? Ipsa earum dolor velit non praesentium architecto hic cupiditate fugiat sed. Maiores quod repellendus aliquam commodi."></i></sup>
				<div class="col-wrap pad-30" style="margin-top:50px;">
					<figure style="width:100px;">
						<img src="/img/icons/col-4.png">				
					</figure>
					<div class="col-content">
						<p style="font-size:35px;"><?php print_r($data['user_count'])?></p>
						<h3 style="font-size: 24px;">University Users</h3>
					</div>
				</div>
			</div>
		</div>
	<?php endif ?>
		<div class="alerts-notif">
			<div class="alert-content" data-intro='With every request from the user, will be shown in here categories by user type.' data-step="12">
				<div class="content-head">
					<h2>Request <sup><i class="fal fa-question-circle" style="font-size:12px;" title="Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eligendi est eaque laborum eum sit? Ipsa earum dolor velit non praesentium architecto hic cupiditate fugiat sed. Maiores quod repellendus aliquam commodi."></i></sup></h2>
				</div>
				<div class="ad-log" style="padding:5px;">
					<ul class="mCustomScrollbar content fluid light" data-mcs-theme="inset-2-dark" style="height: 545px;width: 100%;">
					</ul>
				</div>
			</div>	
		</div>
	</section>

<?php require_once APP_ROOT . '/views/admin/inc/footer.php'; ?>
