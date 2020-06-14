<?php require_once APP_ROOT . '/views/admin/inc/head.php'; ?>

	<section class="tg-dash">
		<h1>Student</h1>
	</section>
	<form id="chemicalAdd">
	<section class="offices-msgs">
		<div class="alerts-notif" style="width: 66.66%;">
			<div class="alert-content no-fixed-height" style="display: flex;flex-direction: column;border:1px solid #d5d5d5;overflow: unset !important;">
				<div class="content-head" style="margin-bottom:10px;">
					<h2>Student Details</h2>
				</div>
				<div class="changepass-holder half-row">
					<div class="form-group half-form-group">
						<input type="text" name="chemWt" class="form-control" id="student-name">
						<label for="chemWt">Firstname</label>
					</div>
					<div class="form-group half-form-group">
						<input type="text" name="chemAssay" class="form-control" id="student-id">
						<label for="chemAssay">Student No.</label>
					</div>
				</div>
				<div class="changepass-holder third-row">
					<div class="form-group half-form-group">
						<input type="date" name="chemExpiration" class="form-control" id="student-birth">
						<label for="chemExpiration">Birth date</label>
					</div>
					<div class="form-group half-form-group">
                        <div class="smart-drop-wrapper" id="studentDepartment">
                            <input type="text" name="chemBrand" class="cusDrop meta-selected-department" id="student-department" value="" placeholder="Select department" data-name="department">
                            <div class="options-wrapper wrapper-department">
                                <div class="options">
                                    <?php foreach ($data['dept'] as $dept) : ?>
                                        <div class="options-item temp-remover" id="content-wrap-<?=$dept->id?>" data-meta="department" data-id="<?=$dept->id?>" data-name="<?=$dept->name?>">                                        
                                            <input type="text" name="" class="hidden-container" data-id="<?=$dept->id?>" value="<?=$dept->name;?>" style="display:none;"/>
                                            <span class="smart-drop-add-btn remove-term" data-item="department" data-id="<?=$dept->id;?>">Delete</span>
                                            <span class="brand-name" value="<?=$dept->id;?>"><?=$dept->name;?>  <i class="fas fa-pencil-alt edit-smart-option" data-id="<?=$dept->id?>"></i></span>
                                        </div>
                                    <?php endforeach; ?>
                                    <div class="options-item smart-drop-add top-form-add" style="display:flex;">
                                        <input type="text" name="" class="add-meta-value-department" placeholder="+ add"/>
                                        <span class="smart-drop-add-btn add-term" data-item="department">Add</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <label for="studentDepartment">Department</label>
					</div>
					<div class="form-group half-form-group">
						<select style="width: 100%;" name="chemBrand" id="student-gender">
							<optgroup>
									<option value="1">Male</option>
									<option value="0">Female</option>
							</optgroup>
						</select>
						<label for="chemBrand">Gender</label>
					</div>
				</div>
				<div class="prof-container">
					<div>
						<button class="tg-btn save-btn student-save" type="button">Save <img src="/img/gif/save.gif" style="width: 20px;position: absolute;top: 25%;bottom: 0;right: 5px;display:none;" id="save-form"></button>
					</div>
				</div>
			</div>
		</div>
	</section>
</form>
<?php require_once APP_ROOT . '/views/admin/inc/footer.php'; ?>