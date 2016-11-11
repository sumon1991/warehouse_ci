<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-2x">&times;</i>
            </button>
            <h4 class="modal-title" id="myModalLabel"><?php echo lang('edit_rule'); ?></h4>
        </div>
        <?php $attrib = array('data-toggle' => 'validator', 'role' => 'form');
        echo form_open_multipart("system_settings/edit_translation/" . $translation->id, $attrib); ?>
        <div class="modal-body">
            <p><?= lang('update_info'); ?></p>


            <div class="form-group">
                <?= lang('english', 'english'); ?>
                <?= form_input('english', $translation->english, 'class="form-control" id="english" required="required"'); ?>
            </div>
            
            <div class="form-group">
                <?= lang('arabic', 'arabic'); ?>
                <?= form_input('arabic', $translation->arabic, 'class="form-control" id="arabic" required="required"'); ?>
            </div>
            
            <div class="form-group">
                <?= lang('farsi', 'farsi'); ?>
                <?= form_input('farsi', $translation->farsi, 'class="form-control" id="farsi" required="required"'); ?>
            </div>


      
            <?php echo form_hidden('id', $translation->id); ?>
        </div>
        <div class="modal-footer">
            <?php echo form_submit('edit_translation', lang('edit_translation'), 'class="btn btn-primary"'); ?>
        </div>
    </div>
    <?php echo form_close(); ?>
</div>
<script type="text/javascript" src="<?= $assets ?>js/custom.js"></script>
<?= $modal_js ?>