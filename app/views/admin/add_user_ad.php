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
					<div style="margin-bottom:0px;background:url('<?=URL_ROOT?>/img/default/kalen-emsley-Bkci_8qcdvQ-unsplash.jpg');background-position: center;background-size: cover;background-repeat: no-repeat;border: none;box-shadow: var(--box-shadow);width: 50%;border-radius: 50%;margin: 20px auto 0px;">
					</div>
				</div>
				<div class="prof-container admin-prof">
					<div>
						<p>Drop files anywhere to upload</p>
						<p>Or</p>
						<button class="tg-btn open_file_ex" type="button">Select Files</button>
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
						<select style="width: 100%;" name="chemBrand">
							<optgroup>
								<?php foreach ($data['brand'] as $brand) : ?>
									<option value="<?=$brand->id;?>"><?=$brand->name;?></option>
								<?php endforeach; ?>
							</optgroup>
						</select>
						<label for="chemBrand">Gender</label>
					</div>
					<div class="form-group">
						<select style="width: 100%;" name="chemBrand">
							<optgroup>
								<?php foreach ($data['brand'] as $brand) : ?>
									<option value="<?=$brand->id;?>"><?=$brand->name;?></option>
								<?php endforeach; ?>
							</optgroup>
						</select>
						<label for="chemBrand">User Privilege level</label>
					</div>
					<div class="form-group">
						<input type="text" name="password" placeholder="Username" class="form-control">
					</div>
					<div class="form-group">
						<input type="email" name="password" placeholder="Email*" class="form-control">
					</div>
					<div class="form-group">
						<input type="text" name="password" placeholder="First Name*" class="form-control">
					</div>
					<div class="form-group">
						<input type="text" name="password" placeholder="Phone Number*" class="form-control">
					</div>
					<button class="tg-btn" type="button">Save</button>
				</div>
			</div>
		</div>
	</section>

<?php require_once APP_ROOT . '/views/admin/inc/footer.php'; ?>