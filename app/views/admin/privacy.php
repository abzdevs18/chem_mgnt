<?php require_once APP_ROOT . '/views/admin/inc/head.php'; ?>
	<section class="tg-dash">
		<h1>Privacy Settings</h1>
	</section>
	<section class="offices-msgs" style="justify-content:left;">
		<div class="alerts-notif privacy_settings">
			<div class="alert-content no-fixed-height">
				<div class="content-head">
					<h2>Privacy configuration <sup><i class="fal fa-question-circle" style="font-size:12px;" title="Edit user privileges and give additional functionality."></i></sup></h2>
				</div>
				<div class="changepass-holder">     
                    <ul>
                        <li class="privacy_items">            
                            <div class="tg-checkbox">
                                <input id="tg-privacylogin" type="checkbox" name="privacy settings" value="yes" checked="">
                                <label for="tg-privacylogin" style="margin-left:30px;">Receive email notification each time some login as ADMIN.</label>
                            </div>
                        </li>
                        <li class="privacy_items">            
                            <div class="tg-checkbox">
                                <input id="tg-privacyemail" type="checkbox" name="privacy settings" value="yes" checked="">
                                <label for="tg-privacyemail" style="margin-left:30px;">I want to receive e-mail alerts about new request</label>
                            </div>
                        </li>
                        <li class="privacy_items">            
                            <div class="tg-checkbox">
                                <input id="tg-privacydesktop" type="checkbox" name="privacy settings" value="yes" checked="">
                                <label for="tg-privacydesktop" style="margin-left:30px;">I want to receive desktop notifications.</label>
                            </div>
                        </li>
                        <li class="privacy_items">            
                            <div class="tg-checkbox">
                                <input id="tg-privacymessaging" type="checkbox" name="privacy settings" value="yes" checked="">
                                <label for="tg-privacymessaging" style="margin-left:30px;">Allow messaging feature to Laboratory manager.</label>
                            </div>
                        </li>
                        <li class="privacy_items">            
                            <div class="tg-checkbox">
                                <input id="tg-privacymanager" type="checkbox" name="privacy settings" value="yes" checked="">
                                <label for="tg-privacymanager" style="margin-left:30px;">Allow Laboratory manager to APPROVE CHEMICAL request.</label>
                            </div>
                        </li>
                        <li class="privacy_items">            
                            <div class="tg-checkbox">
                                <input id="tg-privacylab" type="checkbox" name="privacy settings" value="yes" checked="">
                                <label for="tg-privacylab" style="margin-left:30px;">Allow Laboratory manager to add STUDENT.</label>
                            </div>
                        </li>
                        <li class="privacy_items">            
                            <div class="tg-checkbox">
                                <input id="tg-privacychemical" type="checkbox" name="privacy settings" value="yes" checked="">
                                <label for="tg-privacychemical" style="margin-left:30px;">Allow Laboratory manager to add CHEMICALS.</label>
                            </div>
                        </li>
                    </ul>
					<button class="tg-btn" type="button">Save</button>
				</div>
			</div>
		</div>
		<div class="alerts-notif privacy_settings">
			<div class="alert-content no-fixed-height" style="background:rgba(217,83,79,0.10);overflow:unset">
				<div class="content-head">
					<h2 style="color:#a94442;">Delete user <sup><i class="fal fa-question-circle" style="font-size:12px;" title="Delete user for some reason."></i></sup></h2>
				</div>
                <form action="" method="POST" id="tinymce">
				<div class="changepass-holder">
					<div class="form-group">
                        <select class="selected-user">
                            <optgroup>
                                <?php foreach ($data['user'] as $user) : ?>
                                    <option selected value="<?php echo $user->id?>"><?php echo $user->username?></option>
                                    <?php endforeach; ?>
                            </optgroup>
                        </select>
					</div>
					<div class="form-group">
                        <div class="smart-drop-wrapper" id="chemCat">
                            <input type="text" name="category" class="cusDrop meta-selected-deleteUser" placeholder="Select category" value="" data-name="deleteUser" data-filled="false">
                            <div class="options-wrapper wrapper-category">
                                <div class="options">
                                    <div class="mCustomScrollbar cc-ajax-wrap" data-mcs-theme="inset-2-dark" style="max-height: 300px;overflow: hidden;">
                                    <?php foreach ($data['category'] as $category) : ?>
                                        <div class="options-item temp-remover" id="content-wrap-<?=$category->id?>" data-meta="category" data-id="<?=$category->id?>" data-name="<?=$category->name?>">                                        
                                            <input type="text" name="" class="hidden-container" data-id="<?=$category->id?>" value="<?=$category->name;?>" style="display:none;"/>
                                            <span class="smart-drop-add-btn remove-term" data-item="category" data-id="<?=$category->id;?>">Delete</span>
                                            <span class="brand-name" value="<?=$category->id;?>"><?=$category->name;?>  <i class="fas fa-pencil-alt edit-smart-option" data-id="<?=$category->id?>"></i></span>
                                        </div>
                                    <?php endforeach; ?>
                                    </div>
                                    <div class="options-item smart-drop-add top-form-add" style="display:flex;justify-content:end;">
                                        <input type="text" name="" class="add-meta-value-category" placeholder="+ add"/>
                                        <span class="smart-drop-add-btn add-term" data-item="category">Add</span>
                                    </div>
                                </div>
                            </div>
                        </div>
					</div>
                    <div class="input-msgs-content">
                        <div class="container-of-msgs">
                            <div class="ctl-msg deleteDesc" contenteditable style="background-color:#fff;">									
                                <label for="typing-msg">Description*</label>
                            </div>
                        </div>
                    </div>
					<button class="tg-btn deleteUser" type="submit" style="margin-top:15px;background:#d9534f;padding:0px 40px;border-radius:3px;">Delete <img src="/img/gif/91.gif" style="width: 20px;position: absolute;top: 25%;bottom: 0;right: 5px;display:none;" id="save-form"></button>
				</div>
				</form>
			</div>	
		</div>
	</section>

<?php require_once APP_ROOT . '/views/admin/inc/footer.php'; ?>