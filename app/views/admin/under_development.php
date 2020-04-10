<?php require_once APP_ROOT . '/views/admin/inc/head.php'; ?>

<!-- <section class="tg-dash">
		<h1>Chemical</h1>
	</section> -->
<form id="chemicalAdd">
    <section class="offices-msgs">
        <div class="alerts-notif" style="width: 66.66%;">
            <div class="alert-content no-fixed-height" style="display: flex;flex-direction: column;overflow:unset;">
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
                        <select style="width: 100%;" name="label" id="pre_warning_label">
                            <optgroup>
                                <option>Choose precaution label</option>
                                <option value="1">Nature Friendly</option>
                                <option value="2">Proceed with Caution</option>
                                <option value="3">Dispose properly</option>
                                <option value="4">Biohazad</option>
                            </optgroup>
                        </select>
                        <label for="label">Precautionary Label <sup style="position;absolute;right:0;"><i
                                    class="fal fa-question-circle" style="font-size:12px;"
                                    title="How dangerous is this chemical."></i></sup></label>
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
                        <label for="chemName" style="z-index: 99;">Chemical Formula</label>
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
                        <div style="width: 100%;" id="chemBrand">
                            <input type="text" name="chemBrand" class="cusDrop" value="BrandX">
                            <div class="options-wrapper">
                                <div class="options">
                                    <a href="#" class="options-item">
                                    <!-- <span class="brand-name">Brand X</span> -->
                                    <input type="text" name="" id="" value="Brand"/>
                                    </a>
                                    <a href="#" class="options-item">
                                        <span class="brand-name">Brand X</span>
                                    </a>
                                    <a href="#" class="options-item">
                                        <span class="brand-name">Brand X</span>
                                    </a>
                                    <a href="#" class="options-item">
                                        <span class="brand-name">Brand X</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <label for="chemBrand">Brand</label>
                    </div>
                </div>
                <div class="prof-container">
                    <div>
                        <button class="tg-btn save-btn" type="submit">Save</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="alerts-notif">
            <div class="alert-content no-fixed-height">
                <div class="content-head">
                    <h2>Disposal Guideles</h2>
                </div>
                <div class="changepass-holder" style="display:flex;flex-direction:column;">
                    <div class="form-group">
                        <!-- <input type="text" name="emFirst" placeholder="First Name*" class="form-control"> -->
                        <textarea name="note" id="note" cols="30" rows="40" class="form-control"
                            style="resize: vertical;height: 200px;"></textarea>
                        <label for="note">Guidelines</label>
                    </div>
                </div>
                <div class="request_icon_wrapper guide_icons caution_note_label" style="display:none;">
                    <div class="req_icon warning_icon">
                        <!-- <span>IV</span> -->
                        <img id="precaution_icon" src="/img/icons/safety/precaution.png" alt=""
                            style="width:100%;margin:10px;">
                    </div>
                    <div class="m_notif_content warning_content">
                        <b id="precaution_label">Proceed with Caution</b>
                        <!-- <b>Warning</b> -->
                        <h3 id="precaution_content">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptas
                            commodi incidunt similique corporis recusandae esse veritatis quam adipisci, molestias
                            cupiditate earum placeat mollitia excepturi, error quidem odio fugiat quaerat quo.</h3>
                        <!-- <time datetime="2017-08-08">01 Day Ago</time> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</form>
<?php require_once APP_ROOT . '/views/admin/inc/footer.php'; ?>