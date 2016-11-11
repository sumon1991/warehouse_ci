<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Updating Permissions File</title>
<script type="text/javascript" src="<?php echo base_url(); ?>themes/default/assets/js/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	setTimeout("startImport()",2000);	
});
function startImport()
{
	var progressElem = $('#progressCounter');
	var url = '<?php echo site_url('auth/do_updatePermissionsFiles'); ?>';
	$.ajax({
		    xhr: function () {
        var xhr = new window.XMLHttpRequest();
        //Download progress
        xhr.addEventListener("progress", function (evt) {
           // console.log(evt.lengthComputable);
            if (evt.lengthComputable) {
                var percentComplete = evt.loaded / evt.total;
                progressElem.html(Math.round(percentComplete * 100) + "%");
            }
        }, false);
        return xhr;
    },
		url:url,
		type:'POST',
		data:{id: "<?php echo $id; ?>","category":"<?php echo $category; ?>","<?= $this->security->get_csrf_token_name() ?>":"<?= $this->security->get_csrf_hash() ?>"},
		success:function(data){
			var IS_JSON = true;
			 try
			 {
					 var json = $.parseJSON(data);
			 }
			 catch(err)
			 {
					 IS_JSON = false;
			 }   
			
			if(IS_JSON) {
			var parseData = JSON.parse(data);
				if(parseData.message) {
					$("#renderMessage").html(parseData.message);
				}
				if(parseData.result == 1) {
					
					if(parseData.redirect_link) {
						window.location = parseData.redirect_link;
					}
				}
			}
			else {
				$("#renderMessage").html(data);
			}
		}
	});
}
</script>
</head>
<body>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
	<tr>
    	<td align="center" id="renderMessage">
        	Please wait while system finishes the process....<br /><br /><img src="<?php echo base_url(); ?>themes/default/assets/images/loading_bar.gif" />
            <div id="progressCounter"></div>
        </td>
    </tr>
</table>
</body>
</html>