<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<style>
    .table td:first-child {
        font-weight: bold;
    }

    label {
        margin-right: 10px;
    }
</style>
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i class="fa-fw fa fa-folder-open"></i><?= lang('user_permissions'); ?></h2>
    </div>
    <div class="box-content">
        <div class="row">
            <div class="col-lg-12">

                <p class="introtext"><?= lang("set_permissions"); ?></p>

                <?php //if (!empty($p)) {
                   // if ($p->user_id != 1) {
					   $group_id = $user->group_id;
                        echo form_open("auth/user_permissions/" . $id); ?>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">

                                <thead>
                                <tr>
                                    <th colspan="6"
                                        class="text-center"><?php echo $this->lang->line("user_permissions").': '.$user->first_name . ' ' . $user->last_name; ?></th>
                                </tr>
                                <tr>
                                    <th width="10%" class="text-center"><?= lang("module_name"); ?>
                                    </th>
                                    <th width="5%" class="text-center CheckAll"><input type="checkbox" id="CheckAll" /></th>
                                    <th width="10%" class="text-center"><?= lang("enable_disable"); ?></th>
                                    <th width="80%"><?= lang("permissions"); ?></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach($privileges as $privilege) {
									
									$renderAll = TRUE;
										   if($this->loginID != 1) {
										   		if(!userHasAccess($privilege['id'],enableDisableID(),$this->loginID,$this->loginGroupID))
										  	 	$renderAll = FALSE;
										   }
										   if($renderAll) {
									?>
                                <tr>
                                    <td><?= $privilege['name']; ?>
                                    <input type="hidden" name="privilege[]" value="<?php echo $privilege['id']; ?>" />
                                    </td>
                                     <td class="RowClickEvent text-center">
                                    <input type="checkbox" id="CheckAllRow-<?php echo $privilege['id']; ?>" class="CheckAllRow" value="" />
                                    </td>
                                    <td>
                                       <?php 
										   $cl = "";
										   if(userHasAccess($privilege['id'],enableDisableID(),$id,$group_id))
										   $cl = 'checked="checked"';
										   ?>
                                        <input type="checkbox" <?php echo $cl; ?> value="1" class="checkbox CheckAllRow-<?php echo $privilege['id']; ?>" name="hide[<?php echo $privilege['id']; ?>]"> <label s="padding05"></label>
                                              </td>
                                    </td>
                                    <td>
                                       <?php foreach($privilege['rules'] as $rul) {
										   $cl = "";
										   if(userHasAccess($privilege['id'],$rul['id'],$id,$group_id))
										   $cl = 'checked="checked"';
										   $renderItem = TRUE;
										   if($this->loginID != 1) {
										   		if(!userHasAccess($privilege['id'],$rul['id'],$this->loginID,$this->loginGroupID))
										  	 	$renderItem = FALSE;
										   }
										   if($renderItem) {
										   ?>
                                      <div class="permission-item">  <input type="checkbox" <?php echo $cl; ?> value="1" class="checkbox CheckAllRow-<?php echo $privilege['id']; ?>" name="rule[<?php echo $privilege['id']; ?>][<?php echo $rul['id']; ?>]"> <label s="padding05"><?php echo $rul['name']; ?></label></div>
                                                <?php }}?></td>
                                    </td>
                                </tr>
                                <?php }?>
<?php }?>
                          
                                </tbody>
                            </table>
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary"><?=lang('update')?></button>
                        </div>
                        <?php echo form_close();
                    
					/*} else {
                        echo $this->lang->line("group_x_allowed");
                    }*/
               /* } else {
                    echo $this->lang->line("group_x_allowed");
                }*/ ?>


            </div>
        </div>
    </div>
</div>