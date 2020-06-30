<?php require_once APP_ROOT . '/views/admin/inc/head.php'; ?>

	<section class="tg-dash">
		<h1>Administrator Messages</h1>
	</section>

	<section class="updates-msgs">
		<div class="msgs-acc">
			<div class="msgs-container">
				<div class="content-head">
					<h2>Faculty Messages</h2>
				</div>	
				<div id="msgs-update-3-col">
					<div class="msgs-3-col-item">
						<div id="search-sort" class="job-search-field">
							<input type="text" name="search" autocomplete="off" placeholder="Search Here" style="width: 100%;">
							<i class="fal fa-search"></i>
						</div>
						<ul class="jobs-updates">
							<?php
								foreach ($data['dept'] as $department):
								if($department->name == 'Chemistry'):?>
									<li id="dept_<?php echo $department->id;?>" style="background-color: #f7f7f7;"><?php echo $department->name;?> Department</li>
								<?php else:?>
									<li id="dept_<?php echo $department->id;?>"><?php echo $department->name;?> Department</li>
								<?php endif; $i++;?>
							<?php endforeach;?>
						</ul>
					</div>
					<div class="msgs-3-col-item">
						<ul class="jobs-updates bidders">
							<?php 
								$color = ['#283593','#4caf50','#424242','#424242','#455a64','#1b5e20'];
								foreach ($data['list'] as $list): ?>
								<li class="chat-user" data-sender="<?=$list->userId;?>">
									<div>
										<?php if($list->profile):?>
										<img src="<?=URL_ROOT?>/img/icons/small-prof.jpg" /> 
										<?php else: ?>
											<span class="no-icon-prof" style="background-color: <?=$color[rand(0,5)];?>"><?=substr($list->fname, 0,1);?></span>
										<?php endif;?>
										<span><?=$list->fname . ' '.$list->lname;?></span>								
									</div>
									<div class="pep-chat-list">
										<span class="trash"><i class="fal fa-trash"></i></span>	
										<span class="acc-status-online"></span>									
									</div>
								</li>
							<?php endforeach;?>
						</ul>
					</div>
					<div class="msgs-3-col-item">
						<div class="mCustomScrollbar messaging fluid light" data-mcs-theme="inset-2-dark" style="height: 400px;width: 100%;">
							<div class="message-reciever">
								<img src="<?=URL_ROOT?>/img/icons/small-prof.jpg" />
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
								<img src="<?=URL_ROOT?>/img/icons/small-prof.jpg" />
							</div>
							<div class="message-reciever">
								<img src="<?=URL_ROOT?>/img/icons/small-prof.jpg" />
								<div class="msg-content">
									<p>Duis aute irure dolor in reprehenderit in voluptate velit esse
									cillum dolore eu fugiat nulla pariatur.</p>
									<span>Jan. 13, 2019</span>
								</div>
							</div>
							<div class="message-reciever">
								<img src="<?=URL_ROOT?>/img/icons/small-prof.jpg" />
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