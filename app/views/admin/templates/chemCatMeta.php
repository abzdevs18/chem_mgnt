
<?php foreach ($data['category'] as $category) : ?>
    <div class="options-item temp-remover" id="content-wrap-<?=$category->id?>" data-id="<?=$category->id?>" data-name="<?=$category->name?>">                                        
        <input type="text" name="" class="hidden-container" data-id="<?=$category->id?>" value="<?=$category->name;?>" style="display:none;"/>
        <span class="smart-drop-add-btn remove-term" data-item="category" data-id="<?=$category->id;?>">Delete</span>
        <span class="brand-name" value="<?=$category->id;?>"><?=$category->name;?>  <i class="fas fa-pencil-alt edit-smart-option" data-id="<?=$category->id?>"></i></span>
    </div>
<?php endforeach; ?>