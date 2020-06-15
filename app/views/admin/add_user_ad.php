<?php require_once APP_ROOT . '/views/admin/inc/head.php'; ?>


	<section class="tg-dash">
		<h1>Update Settings</h1>
	</section>
	<section class="offices-msgs"  style="justify-content:left;">
		<div class="alerts-notif">
			<div class="alert-content no-fixed-height" style="border:1px solid #d5d5d5;display:flex;flex-direction:column;">
				<div class="content-head">
					<h2>User Photo</h2>
				</div>
				<div class="prof-container admin-prof new_user_photo_set" style="display:none;">
					<div id="profContainer" style="margin-bottom:0px;background-position: center;background-size: cover;background-repeat: no-repeat;border: none;box-shadow: var(--box-shadow);width: 50%;border-radius: 50%;margin: 20px auto 0px;">
					</div>
				</div>
				<div class="prof-container admin-prof">
					<div>
						<p>Drop files anywhere to upload</p>
						<p>Or</p>
						<div style="position: relative;text-align: center;">
							<input type="file" name="" id="user-photo" style="background: red;width: 100%;position: absolute;z-index: 99;height: 100%;border-radius: 35px;opacity: 0;">
							<button class="tg-btn open_file_ex" type="button">Select Files</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="alerts-notif">
			<div class="alert-content no-fixed-height" style="border:1px solid #d5d5d5;">
				<div class="content-head">
					<h2>User Details</h2>
				</div>
				<div class="changepass-holder">
					<div class="form-group">
						<select style="width: 100%;" name="gender" id="add-user-gender">
							<optgroup>
									<option value="1">Male</option>
									<option value="0">Female</option>
							</optgroup>
						</select>
						<label for="chemBrand">Gender</label>
					</div>
					<div class="form-group">
						<select style="width: 100%;" name="chemBrand" id="add-user-type">
							<optgroup>
									<option value="0">Administrator</option>
									<option value="1">Attendant</option>
							</optgroup>
						</select>
						<label for="chemBrand">User Privilege level</label>
					</div>
					<div class="form-group">
						<input type="text" placeholder="Username" class="form-control" id="add-user-uname">
					</div>
					<div class="form-group">
						<input type="email" placeholder="Email*" class="form-control" id="add-user-email">
					</div>
					<div class="form-group">
						<input type="text" placeholder="First Name*" class="form-control" id="add-user-name">
					</div>
					<div class="form-group">
						<input type="text" placeholder="Phone Number*" class="form-control" id="add-user-phone">
					</div>
					<button class="tg-btn add-user-save-btn" type="button" style="padding:0px 40px;border-radius:3px;">Save <img src="/img/gif/save.gif" style="width: 20px;position: absolute;top: 25%;bottom: 0;right: 5px;display:none;" id="save-form"></button>
				</div>
			</div>
		</div>
	</section>

<?php require_once APP_ROOT . '/views/admin/inc/footer.php'; ?>