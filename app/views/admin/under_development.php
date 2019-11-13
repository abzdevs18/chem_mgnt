<?php require_once APP_ROOT . '/views/admin/inc/head.php'; ?>

	<!-- <section class="tg-dash">
		<h1>Chemical</h1>
	</section> -->
	<form id="chemicalAdd">
	<section class="offices-msgs">
		<div class="alerts-notif" style="width: 66.66%;">
			<div class="alert-content no-fixed-height" style="display: flex;flex-direction: column;">
				<div class="content-head">
					<h2>Chemical Details</h2>
				</div>
			<!-- 	<div class="changepass-holder" style="text-align: center;">
					<button class="tg-btn open-cat" type="button">Select Category</button>
				</div> -->
				<div class="changepass-holder half-row" style="margin-top: 30px;">
					<div class="form-group half-form-group">
						<!-- <input type="text" name="title" class="form-control"> -->
						<select style="width: 100%;" name="category">
							<optgroup>
								<?php foreach ($data['category'] as $category) : ?>
									<option value="<?=$category->id;?>"><?=$category->name;?></option>
								<?php endforeach; ?>
							</optgroup>
						</select>
						<label for="category">Category</label>
					</div>
					<div class="form-group half-form-group">
						<!-- <input type="text" name="title" class="form-control"> -->
						<select style="width: 100%;" name="label">
							<optgroup>
								<?php foreach ($data['label'] as $label) : ?>
									<option value="<?=$label->id;?>"><?=$label->name;?></option>
								<?php endforeach; ?>
							</optgroup>
						</select>
						<label for="label">Precautionary Label</label>
					</div>
				</div>
				<div class="changepass-holder half-row">
					<div class="form-group">
						<input type="text" name="chemName" class="form-control">
						<label for="chemName">Chemical Name</label>
					</div>
				</div>
				<div class="changepass-holder half-row">
					<div class="form-group">
                        <textarea id="chemicalFormula" name="mytextarea" value=""></textarea>
						<label for="chemName">Chemical Formula</label>
                    </div>
				</div>
				<div class="changepass-holder half-row">
					<div class="form-group half-form-group">
						<input type="text" name="chemWt" class="form-control">
						<label for="chemWt">Mol. Wt.</label>
					</div>
					<div class="form-group half-form-group">
						<input type="text" name="chemAssay" class="form-control">
						<label for="chemAssay">Assay</label>
					</div>
				</div>
				<div class="changepass-holder third-row">
					<div class="form-group half-form-group">
						<input type="text" name="chemQuantity" class="form-control">
						<label for="chemQuantity">Quantiy</label>
					</div>
					<div class="form-group half-form-group">
						<input type="date" name="chemExpiration" class="form-control">
						<label for="chemExpiration">Expiration</label>
					</div>
					<div class="form-group half-form-group">
						<select style="width: 100%;" name="chemBrand">
							<optgroup>
								<?php foreach ($data['brand'] as $brand) : ?>
									<option value="<?=$brand->id;?>"><?=$brand->name;?></option>
								<?php endforeach; ?>
							</optgroup>
						</select>
						<label for="chemBrand">Brand</label>
					</div>
				</div>
				<div class="prof-container">
					<div>
						<button class="tg-btn save-btn" type="button">Save</button>
					</div>
				</div>
			</div>
		</div>
		<div class="alerts-notif">
<!-- 			<div class="alert-content no-fixed-height">
				<div class="content-head">
					<h2>Enable Offers/Messages</h2>
				</div>
				<div class="changepass-holder">
					<div class="form-group tg-checkbox">
						<input id="enb-msgs" type="checkbox" name="msg/offers">
						<label for="enb-msgs" style="font: var(--font-quick-400-13);">Enable offers/messages option in this Post</label>
					</div>
				</div>				
			</div>	 -->
			<div class="alert-content no-fixed-height">
				<div class="content-head">
					<h2>Disposal Guideles</h2>
				</div>
				<div class="changepass-holder">
					<div class="form-group">
						<!-- <input type="text" name="emFirst" placeholder="First Name*" class="form-control"> -->
						<textarea name="note" id="note" cols="30" rows="40" class="form-control" style="resize: vertical;height: 200px;"></textarea>
						<label for="note">Guidelines</label>
					</div>
			<!-- 		<div class="form-group">
						<input type="text" name="emLast" placeholder="Last Name*" class="form-control">
					</div>
					<div class="form-group">
						<input type="text" name="emPhone" placeholder="Phone Number*" class="form-control">
					</div>
					<div class="form-group">
						<input type="text" name="emCity" placeholder="City" class="form-control">
					</div>
					<div class="form-group">
						<input type="email" name="emEmail" placeholder="Email*" class="form-control">
					</div> -->
					<!-- <button class="tg-btn" type="button">Post Chemical</button> -->
				</div>
			</div>
		</div>
	</section>
</form>
<?php require_once APP_ROOT . '/views/admin/inc/footer.php'; ?>