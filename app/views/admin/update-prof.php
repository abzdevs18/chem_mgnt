<?php require_once APP_ROOT . '/views/admin/inc/head.php'; ?>


	<section class="tg-dash">
		<h1>Update Settings</h1>
	</section>
	<section class="offices-msgs">
		<div class="alerts-notif" data-step="13">
			<div class="alert-content no-fixed-height" id="prof1" style="border:1px solid #d5d5d5;display:flex;flex-direction:column;">
				<div class="content-head">
					<h2>User Photo</h2>
				</div>
				<div class="prof-container admin-prof new_user_photo_set">
					<?php if($data['account']->userImage):?>
						<div id="profContainer" style="background:url(<?php echo "/img/users/".$data['account']->userImage;?>);margin-bottom:0px;background-position: center;background-size: cover;background-repeat: no-repeat;border: none;box-shadow: var(--box-shadow);width: 200px;height:200px;border-radius: 50%;margin: 20px auto 0px;">
						</div>
					<?php else:?>
						<div id="profContainer" style="background-color: <?=DEF_COLOR[rand(0,5)]?>;margin-bottom:0px;background-position: center;background-size: cover;background-repeat: no-repeat;border: none;box-shadow: var(--box-shadow);width: 200px;height:200px;border-radius: 50%;margin: 20px auto 0px;">
							<p style="color:#fff;text-transform: uppercase;font-size: 50px;font-weight: 600;"><?php echo $data['account']->username[0];?></p>
						</div>
					<?php endif;?>
				</div>
				<div class="prof-container admin-prof">
					<div style="height: 50px;border: navajowhite;">
						<div style="position: relative;text-align: center;">
							<input type="file" name="" class="up-photo-btn" id="user-photo" style="background: red;width: 100%;position: absolute;z-index: 99;height: 100%;border-radius: 35px;opacity: 0;">
							<button class="tg-btn open_file_ex" type="button" data-usr="<?php echo $_SESSION['userName'];?>" style="padding:0px 40px;border-radius:3px;">Update profile  <img src="/img/gif/save.gif" style="width: 20px;position: absolute;top: 25%;bottom: 0;right: 5px;display:none;" id="save-form"></button>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="alerts-notif" data-step="14">
			<div class="alert-content no-fixed-height" id="prof2" >
				<div class="content-head">
					<h2>Profile Details</h2>
				</div>
				<div class="changepass-holder">
					<!-- <div class="form-group">
						<strong>I’m a:</strong>
						<div class="tg-selectgroup">
							<span class="tg-radio">
								<input id="tg-mail" type="radio" name="gender" value="mail" checked="">
								<label for="tg-mail">mail</label>
							</span>
							<span class="tg-radio">
								<input id="tg-femail" type="radio" name="gender" value="femail">
								<label for="tg-femail">femail</label>
							</span>
							<span class="tg-radio">
								<input id="tg-company" type="radio" name="gender" value="company">
								<label for="tg-company">Company</label>
							</span>
						</div>
					</div> -->
					<div class="form-group">
						<select style="width: 100%;" name="chemBrand" id="add-user-gender">
							<optgroup>
								<option value="0">Female</option>
								<option value="1">Male</option>
							</optgroup>
						</select>
						<label for="chemBrand">Gender</label>
					</div>
					<div class="form-group">
						<input type="text" name="text" placeholder="Username" class="form-control"  id="add-user-uname" value="<?php echo $data['account']->username;?>">
					</div>
					<div class="form-group">
						<input type="email" name="email" placeholder="Email*" class="form-control" id="add-user-email" value="<?php echo $data['account']->userEmail;?>">
					</div>
					<div class="form-group">
						<input type="text" name="text" placeholder="Last Name*" class="form-control" id="add-user-lname" value="<?php echo $data['account']->lastN;?>">
					</div>
					<div class="form-group">
						<input type="text" name="text" placeholder="First Name*" class="form-control" id="add-user-name" value="<?php echo $data['account']->firstN;?>">
					</div>
					<div class="form-group">
						<input type="text" name="number" placeholder="Phone Number*" class="form-control" id="add-user-phone" value="<?php echo $data['account']->userPhone;?>">
					</div>
					<button class="tg-btn update-admin-bio" type="button" data-usr="<?php echo $_SESSION['userName'];?>" style="padding:0px 40px;border-radius:3px;">Update Now  <img src="/img/gif/save.gif" style="width: 20px;position: absolute;top: 25%;bottom: 0;right: 5px;display:none;" id="save-bio-form"></button>
				</div>
			</div>
		</div>
		<div class="alerts-notif" data-step="15">
			<div class="alert-content no-fixed-height" id="prof3" >
				<div class="content-head">
					<h2>Change Password</h2>
				</div>
				<div class="changepass-holder">
					<div class="form-group">
						<input type="password" name="password" placeholder="Current Password" class="form-control" id="curr-pass">
					</div>
					<div class="form-group">
						<input type="password" name="password" placeholder="New Password" class="form-control" id="new-pass">
					</div>
					<div class="form-group">
						<input type="password" name="password" placeholder="Confirm Password" class="form-control" id="conf-pass">
					</div>
					<button class="tg-btn update-pass-ad" type="button" data-usr="<?php echo $_SESSION['userName'];?>" style="padding:0px 40px;border-radius:3px;">Change Now  <img src="/img/gif/save.gif" style="width: 20px;position: absolute;top: 25%;bottom: 0;right: 5px;display:none;" id="pass-save-form"></button>
				</div>
				
			</div>	
		</div>
	</section>

<?php require_once APP_ROOT . '/views/admin/inc/footer.php'; ?>