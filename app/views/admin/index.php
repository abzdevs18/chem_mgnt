<?php require_once APP_ROOT . '/views/admin/inc/head.php'; ?>

	<section class="tg-dash">
		<h1>Dashboard</h1>
	</section>

	<section class="main-section mar-30">
		<div class="row">
			<div class="col-4">
				<sup><i class="fal fa-question-circle" style="font-size:12px;" title="Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eligendi est eaque laborum eum sit? Ipsa earum dolor velit non praesentium architecto hic cupiditate fugiat sed. Maiores quod repellendus aliquam commodi."></i></sup>
				<div class="col-wrap pad-30">
					<figure>
						<img src="<?=URL_ROOT;?>/img/icons/col-1.png">				
					</figure>
					<div class="col-content">
						<p>562</p>
						<h3>Monthly Request</h3>
						<a href="#">view details <i class="fal fa-angle-right"></i></a>						
					</div>
				</div>
			</div>
			<div class="col-4">
				<sup><i class="fal fa-question-circle" style="font-size:12px;" title="Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eligendi est eaque laborum eum sit? Ipsa earum dolor velit non praesentium architecto hic cupiditate fugiat sed. Maiores quod repellendus aliquam commodi."></i></sup>
				<div class="col-wrap pad-30">
					<figure>
						<img src="<?=URL_ROOT;?>/img/icons/clock.png">				
					</figure>
					<div class="col-content">
						<p>562</p>
						<h3>Pending Request</h3>
						<a href="#">view details <i class="fal fa-angle-right"></i></a>
					</div>
				</div>
			</div>
			<div class="col-4">
				<sup><i class="fal fa-question-circle" style="font-size:12px;" title="Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eligendi est eaque laborum eum sit? Ipsa earum dolor velit non praesentium architecto hic cupiditate fugiat sed. Maiores quod repellendus aliquam commodi."></i></sup>
				<div class="col-wrap pad-30">
					<figure>
						<img src="<?=URL_ROOT;?>/img/icons/chemistry.png">				
					</figure>
					<div class="col-content">
						<p>562</p>
						<h3>Chemical in Lab</h3>
						<a href="#">view details <i class="fal fa-angle-right"></i></a>
					</div>
				</div>
			</div>
			<div class="col-4">
				<sup><i class="fal fa-question-circle" style="font-size:12px;" title="Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eligendi est eaque laborum eum sit? Ipsa earum dolor velit non praesentium architecto hic cupiditate fugiat sed. Maiores quod repellendus aliquam commodi."></i></sup>
				<div class="col-wrap pad-30">
					<figure>
						<img src="<?=URL_ROOT;?>/img/icons/col-4.png">				
					</figure>
					<div class="col-content">
						<p>562</p>
						<h3>Registered Student</h3>
						<a href="#">view details <i class="fal fa-angle-right"></i></a>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="offices-msgs">
		<div class="alerts-notif">
			<div class="alert-content">
				<div class="content-head">
					<h2>System Logs <sup><i class="fal fa-question-circle" style="font-size:12px;" title="Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eligendi est eaque laborum eum sit? Ipsa earum dolor velit non praesentium architecto hic cupiditate fugiat sed. Maiores quod repellendus aliquam commodi."></i></sup></h2>
				</div>
				<div id="log">
					<ul id="content-log-list" class="mCustomScrollbar content fluid light" data-mcs-theme="inset-2-dark" style="height: 400px;width: 100%;">
						<?php for($i = 0; $i <= 10; $i++) :?>
						<li>
							<h3>You Posted A Chemical - Carpenter Required</h3>
							<time>02 Minutes Ago</time>
						</li>
						<?php endfor;?>
					</ul>
				</div>
			</div>
		</div>
		<div class="alerts-notif">
			<div class="alert-content">
				<div class="content-head">
					<h2>Recent Activity <sup><i class="fal fa-question-circle" style="font-size:12px;" title="Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eligendi est eaque laborum eum sit? Ipsa earum dolor velit non praesentium architecto hic cupiditate fugiat sed. Maiores quod repellendus aliquam commodi."></i></sup></h2>
				</div>
				<div class="ad-log">
					<ul class="mCustomScrollbar content fluid light" data-mcs-theme="inset-2-dark" style="height: 400px;width: 100%;">
						<?php for($i = 0; $i <= 10; $i++) :?>
						<li>							
							<span class="tg-adverified cat_chemical">Salt</span>
							<h3>Sodium Orthophosphate</h3>
							<time datetime="2017-08-08">01 Day Ago</time>									
						</li>
						<?php endfor;?>
					</ul>
				</div>
			</div>
		</div>
		<div class="alerts-notif">
			<div class="alert-content">
				<div class="content-head">
					<h2>Request <sup><i class="fal fa-question-circle" style="font-size:12px;" title="Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eligendi est eaque laborum eum sit? Ipsa earum dolor velit non praesentium architecto hic cupiditate fugiat sed. Maiores quod repellendus aliquam commodi."></i></sup></h2>
				</div>
				<div class="ad-log">
					<ul class="mCustomScrollbar content fluid light" data-mcs-theme="inset-2-dark" style="height: 400px;width: 100%;">
						<?php for($i = 0; $i <= 10; $i++) :?>
						<li style="padding-bottom:10px;">							
							<span class="tg-adverified"><i class="fal fa-atom" style="padding-right:5px;"></i> user identification</span>
							<div class="request_icon_wrapper">
								<div class="req_icon" style="margin-top:13px;">
									<span>IV</span>
									<!-- <img src="<?=URL_ROOT;?>/img/icons/danger.png" alt="" style="width:100%;"> -->
								</div>
								<div style="margin:5px;" class="m_notif_content">
									<b>Kate Saycon</b>
									<h3>EDTA Disodium Salt dihydrate, crystal  </h3>
									<time datetime="2017-08-08">01 Day Ago</time>
								</div>
							</div>									
						</li>
						<?php endfor;?>
					</ul>
				</div>
			</div>	
		</div>
	</section>

	<section class="updates-msgs">
		<div class="msgs-acc">
			<div class="msgs-container">
				<div class="content-head">
					<h2>Faculty Messages</h2>
				</div>	
				<div id="msgs-update-3-col">
					<div class="msgs-3-col-item">
						<ul class="jobs-updates">
							<li>Geology Department</li>
							<li>Pharmacy Department</li>
							<li>Chemistry Department</li>
						</ul>
					</div>
					<div class="msgs-3-col-item">
						<ul class="jobs-updates bidders">
							<li>
								<div>
								<img src="<?=URL_ROOT;?>/img/icons/small-prof.jpg" /> <span>Lissa Heir</span>									
								</div>
								<span class="acc-status-online"></span>
							</li>
						</ul>
					</div>
					<div class="msgs-3-col-item">
						<div class="message-container">
							<div class="message-reciever">
								<img src="<?=URL_ROOT;?>/img/icons/small-prof.jpg" />
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
								<img src="<?=URL_ROOT;?>/img/icons/small-prof.jpg" />
							</div>
							<div class="message-reciever">
								<img src="<?=URL_ROOT;?>/img/icons/small-prof.jpg" />
								<div class="msg-content">
									<p>Duis aute irure dolor in reprehenderit in voluptate velit esse
									cillum dolore eu fugiat nulla pariatur.</p>
									<span>Jan. 13, 2019</span>
								</div>
							</div>
							<div class="message-reciever">
								<img src="<?=URL_ROOT;?>/img/icons/small-prof.jpg" />
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
	</section>

<?php require_once APP_ROOT . '/views/admin/inc/footer.php'; ?>
