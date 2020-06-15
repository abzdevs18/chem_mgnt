<?php require_once APP_ROOT . '/views/admin/inc/head.php'; ?>

<!-- <section class="tg-dash">
		<h1>Chemical</h1>
	</section> -->
<form id="chemicalAdd">
    <section class="offices-msgs" id="step1">
        <div class="alerts-notif" style="width: 66.66%;">
            <div class="alert-content no-fixed-height form-holder cc-main-form" style="display: flex;flex-direction: column;overflow:unset;">
                <div class="content-head">
                    <h2>Chemical Details</h2>
                </div>
                <!-- 	<div class="changepass-holder" style="text-align: center;">
					<button class="tg-btn open-cat" type="button">Select Category</button>
				</div> -->
                <div class="changepass-holder half-row" style="margin-top: 30px;">
                    <div class="form-group half-form-group">
                        <div class="smart-drop-wrapper" id="chemCat">
                            <input type="text" name="category" class="cusDrop meta-selected-category" placeholder="Select category" value="" data-name="category" data-filled="false">
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
                        <label for="chemCat">Category</label>
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
                        <div class="smart-drop-wrapper" id="chemBrand">
                            <input type="text" name="chemBrand" class="cusDrop meta-selected-brand" value="" placeholder="Select brand" data-name="brand">
                            <div class="options-wrapper wrapper-brand">
                                <div class="options">
                                    <?php foreach ($data['brand'] as $brand) : ?>
                                        <div class="options-item temp-remover" id="content-wrap-<?=$brand->id?>" data-meta="brand" data-id="<?=$brand->id?>" data-name="<?=$brand->name?>">                                        
                                            <input type="text" name="" class="hidden-container" data-id="<?=$brand->id?>" value="<?=$brand->name;?>" style="display:none;"/>
                                            <span class="smart-drop-add-btn remove-term" data-item="brand" data-id="<?=$brand->id;?>">Delete</span>
                                            <span class="brand-name" value="<?=$brand->id;?>"><?=$brand->name;?>  <i class="fas fa-pencil-alt edit-smart-option" data-id="<?=$brand->id?>"></i></span>
                                        </div>
                                    <?php endforeach; ?>
                                    <div class="options-item smart-drop-add top-form-add" style="display:flex;">
                                        <input type="text" name="" class="add-meta-value-brand" placeholder="+ add"/>
                                        <span class="smart-drop-add-btn add-term" data-item="brand">Add</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <label for="chemBrand">Brand</label>
                    </div>
                </div>
                <div class="prof-container">
                    <div>
                        <button class="tg-btn save-btn" type="submit">Save <img src="/img/gif/save.gif" style="width: 20px;position: absolute;top: 25%;bottom: 0;right: 5px;display:none;" id="save-form"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="alerts-notif note-wrapper" style="position:relative;">

            <div class="alert-content no-fixed-height xpandable-note" style="position:relative;overflow:unset;">      
                <div class="x-note-container"></div>                          
                <div class="note-path" id="add-note-modal" data-click="false">
                    <span id="icon-holder">
                        <i class="fal fa-angle-left caret-left caret"></i>
                        <i class="fal fa-angle-right caret-right caret"></i>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="67" viewBox="0 0 20 67">
                            <metadata>
                                <!--?xpacket begin="﻿" id="W5M0MpCehiHzreSzNTczkc9d"?-->
                                <x:xmpmeta xmlns:x="adobe:ns:meta/"
                                    x:xmptk="Adobe XMP Core 5.6-c138 79.159824, 2016/09/14-01:09:01">
                                    <rdf:rdf xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#">
                                        <rdf:description rdf:about=""></rdf:description>
                                    </rdf:rdf>
                                </x:xmpmeta>
                                <!--?xpacket end="w"?-->
                            </metadata>
                            <path id="bg" class="cls-1"
                                d="M20,27.652V39.4C20,52.007,0,54.728,0,67.265,0,106.515.026-39.528,0-.216-0.008,12.32,20,15.042,20,27.652Z">
                            </path>
                        </svg>
                    </span>
                </div>
                <div class="content-head">
                    <h2>Disposal Guideles</h2>
                </div>
                <div class="changepass-holder x-border-left" style="display:flex;flex-direction:column;">
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