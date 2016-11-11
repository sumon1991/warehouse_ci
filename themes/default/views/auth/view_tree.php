<script>
    $(document).ready(function () {
        'use strict';
        var oTable = $('#UsrTable').dataTable({
            "aaSorting": [[2, "asc"], [3, "asc"]],
            "aLengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "<?= lang('all') ?>"]],
            "iDisplayLength": <?= $Settings->rows_per_page ?>,
            'bProcessing': true, 'bServerSide': true,
            'sAjaxSource': '<?= site_url('auth/getUsers') ?>',
            'fnServerData': function (sSource, aoData, fnCallback) {
                aoData.push({
                    "name": "<?= $this->security->get_csrf_token_name() ?>",
                    "value": "<?= $this->security->get_csrf_hash() ?>"
                });
                $.ajax({'dataType': 'json', 'type': 'POST', 'url': sSource, 'data': aoData, 'success': fnCallback});
            },
            "aoColumns": [{
                "bSortable": false,
                "mRender": checkbox
            }, null, null, null, null, null, null, null, {"mRender": user_status}, {"bSortable": false}]
        }).fnSetFilteringDelay().dtFilter([
            {column_number: 1, filter_default_label: "[<?=lang('first_name');?>]", filter_type: "text", data: []},
            {column_number: 2, filter_default_label: "[<?=lang('last_name');?>]", filter_type: "text", data: []},
            {column_number: 3, filter_default_label: "[<?=lang('email_address');?>]", filter_type: "text", data: []},
            {column_number: 4, filter_default_label: "[<?=lang('company');?>]", filter_type: "text", data: []},
            {column_number: 5, filter_default_label: "[<?=lang('award_points');?>]", filter_type: "text", data: []},
            {column_number: 6, filter_default_label: "[<?=lang('group');?>]", filter_type: "text", data: []},
			{column_number: 7, filter_default_label: "[<?=lang('created_by');?>]", filter_type: "text", data: []},
            {
                column_number: 8, select_type: 'select2',
                select_type_options: {
                    placeholder: '<?=lang('status');?>',
                    width: '100%',
                    minimumResultsForSearch: -1,
                    allowClear: true
                },
                data: [{value: '1', label: '<?=lang('active');?>'}, {value: '0', label: '<?=lang('inactive');?>'}]
            }
        ], "footer");
    });
</script>
<style>.table td:nth-child(6) {
        text-align: right;
        width: 10%;
    }

    .table td:nth-child(8) {
        text-align: center;
    }</style>
<?php if ($Owner) {
    echo form_open('auth/user_actions', 'id="action-form"');
} ?>
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i class="fa-fw fa fa-users"></i><?= lang('view_tree'); ?>: <?php echo $user->first_name.' '.$user->last_name; ?></h2>
    </div>
    <div class="box-content">
        <div class="row">
            <div class="col-lg-12">
            <?php if(!empty($tree)) {?>
    <div class="chart" id="view-tree"></div>
    <script>

    var config = {
        container: "#view-tree",
        connectors: {
            type: 'step'
        },
        node: {
            HTMLclass: 'nodeExample1'
        }
    },
	item_<?php echo $user->id; ?> = {
        text: {
            name: "<?php echo $user->first_name.' '.$user->last_name; ?>",
            title: "<?php echo $user->company; ?> - <?php echo $user->group_name; ?>",
            contact: "<?php echo lang("tel"); ?>: <?php echo $user->phone; ?>",
        },
		<?php if(hasAccess(17,7)) {?>
		link: {
            href: "<?php echo site_url("auth/profile/".$user->id); ?>"
        },
		<?php }?>
        image: "<?php if(!empty($user->avatar)) echo base_url().'assets/uploads/avatars/thumbs/'.$user->avatar; ?>"
    },
	<?php 
	$ids123 = array();
	//$newSub = $tree;
	$i1 = 0;
	$c1 = count($tree);
	foreach($tree as $tr) {$i1++;
		$newSub = $tr['sub'];
		$name = $tr['first_name'].' '.$tr['last_name'];
		?>
		item_<?php echo $tr['id']; ?> = {
		<?php if($tr['created_by'] != 0) {?>
		parent: item_<?php echo $tr['created_by']; ?>,
		stackChildren: true,
		<?php }?>
        text: {
            name: "<?php echo $name; ?>",
            title: "<?php echo $tr['company']; ?> - <?php echo $tr['group_name']; ?>",
            contact: "<?php echo lang("tel"); ?>: <?php echo $tr['phone']; ?>",
        },
		<?php if(hasAccess(17,7)) {?>
		link: {
            href: "<?php echo site_url("auth/profile/".$tr['id']); ?>"
        },
		<?php }?>
        image: "<?php if(!empty($tr['avatar'])) echo base_url().'assets/uploads/avatars/thumbs/'.$tr['avatar']; ?>"
    },
	<?php array_push($ids123,$tr['id']); ?>
	<?php while(!empty($newSub)) {?>
	<?php 
	$i = 0;
	$c = count($newSub);
	foreach($newSub as $t) { 
	$i++;
		$name = $t['first_name'].' '.$t['last_name'];
		echo "
		";
	?>
	item_<?php echo $t['id']; ?> = {
		<?php if($t['created_by'] != 0) {?>
		parent: item_<?php echo $t['created_by']; ?>,
		stackChildren: true,
		<?php }?>
        text: {
            name: "<?php echo $name; ?>",
            title: "<?php echo $t['company']; ?> - <?php echo $t['group_name']; ?>",
            contact: "<?php echo lang("tel"); ?>: <?php echo $t['phone']; ?>",
        },
		<?php if(hasAccess(17,7)) {?>
		link: {
            href: "<?php echo site_url("auth/profile/".$t['id']); ?>"
        },
		<?php }?>
        image: "<?php if(!empty($t['avatar'])) echo base_url().'assets/uploads/avatars/thumbs/'.$t['avatar']; ?>"
    },
	<?php array_push($ids123,$t['id']); ?>
	<?php 
	$newSub = $t['sub']; 
	?>	
	<?php }?>
   <?php }?>
   <?php } ?>
    <?php echo "
	"; ?>	
	chart_config = [config,item_<?php echo $user->id; ?><?php if(!empty($ids123)) {?>,<?php $j = 0;$c1 = count($ids123);foreach($ids123 as $id123) {$j++;?>item_<?php echo $id123; ?><?php if($j != $c1) echo ',';}?><?php }?>];
    </script>
<script>
new Treant( chart_config );
</script>
<?php } else {?>
<?php echo lang("No sub levels found.."); ?>
<?php }?>

            </div>

        </div>
    </div>
</div>
<?php //if ($Owner) { ?>
    <div style="display: none;">
        <input type="hidden" name="form_action" value="" id="form_action"/>
        <?= form_submit('performAction', 'performAction', 'id="action-form-submit"') ?>
    </div>
    <?= form_close() ?>

    <script language="javascript">
        $(document).ready(function () {
            $('#set_admin').click(function () {
                $('#usr-form-btn').trigger('click');
            });

        });
    </script>

<?php //} ?>