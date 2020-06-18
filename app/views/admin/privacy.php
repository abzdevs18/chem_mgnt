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
						<?php foreach($data['config'] AS $config) : ?>
                            <li class="privacy_items">            
                                <div class="tg-checkbox">
                                    <input id="tg-privacy-<?=$config->id?>" type="checkbox" name="privacy settings" value="yes" checked="<?=($config->config_value) ? "true" : "false";?>">
                                    <label for="tg-privacy-<?=$config->id?>" style="margin-left:30px;"><?=$config->config_desc?></label>
                                </div>
                            </li>
						<?php endforeach; ?>
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