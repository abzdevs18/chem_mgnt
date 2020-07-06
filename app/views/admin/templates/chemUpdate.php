
<form action="#" id="chemicalAddUpdate">
<div class="changepass-holder half-row" style="margin-top: 30px;">
    <div class="form-group half-form-group">
        <div class="smart-drop-wrapper" id="chemCat">
            <input type="text" name="category" class="cusDrop meta-selected-category" placeholder="Select category" value="" data-name="category" data-filled="false">
            <div class="options-wrapper wrapper-category">
                <div class="options">
                    <div class="mCustomScrollbar cc-ajax-wrap" data-mcs-theme="inset-2-dark" style="max-height: 300px;overflow: hidden;">
                    <?php foreach ($data['category'] as $category) : ?>
                        <div class="options-item temp-remover" id="content-wrap-<?=$category->id?>" data-meta="category" data-id="<?=$category->id?>" data-name="<?=$category->name?>">                                        
                            <input type="text" name="" class="hidden-container" data-id="<?=$category->id?>" value="<?php if($data['chem']->cat_id == $category->id){echo $category->name;}?>" style="display:none;"/>
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
        <input type="text" name="chemName" class="form-control" value="<?=$data['chem']->chemical_name?>">
        <label for="chemName">Chemical Name</label>
    </div>
</div>
<div class="changepass-holder half-row">
    <div class="form-group">
        <textarea id="chemicalFormula" name="mytextarea"></textarea>
        <label for="chemName" style="z-index: 99;">Chemical Formula</label>
    </div>
</div>
<div class="changepass-holder half-row">
    <div class="form-group half-form-group">
        <input type="text" name="chemWt" class="form-control" value="<?=$data['chem']->mol_wt?>">
        <label for="chemWt">Mol. Wt.</label>
    </div>
    <div class="form-group half-form-group">
        <input type="text" name="chemAssay" class="form-control" value="<?=$data['chem']->assay?>">
        <label for="chemAssay">Assay</label>
    </div>
</div>
<div class="changepass-holder third-row">
    <div class="form-group half-form-group">
        <input type="text" name="chemQuantity" class="form-control" value="<?=$data['chem']->quantity?>">
        <label for="chemQuantity">Quantiy</label>
    </div>
    <div class="form-group half-form-group">
        <input type="date" name="chemExpiration" class="form-control" value="<?=$data['chem']->expiry_date?>">
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
<div class="changepass-holder x-border-left" style="display:flex;flex-direction:column;">
    <div class="form-group">
        <!-- <input type="text" name="emFirst" placeholder="First Name*" class="form-control"> -->
        <textarea name="note" id="note" cols="30" rows="40" class="form-control"
            style="resize: vertical;height: 200px;"><?php echo $data['chem']->chem_note;?></textarea>
        <label for="note">Guidelines</label>
    </div>
</div>
</form>