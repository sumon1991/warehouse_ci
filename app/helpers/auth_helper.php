<?php defined('BASEPATH') OR exit('No direct script access allowed');

if(! function_exists('groupHasAccess')) {
    function groupHasAccess($module,$rule,$group_id = '') {
        $CI =& get_instance();
		$permissions = $CI->config->item("group");
		if($group_id == "") {
			$group_id = $CI->session->userdata("group_id");
		}
		if(isset($permissions[$group_id][$module][$rule]) && $permissions[$group_id][$module][$rule] == 1)
        return true;
		else
		return false;
    }
}

if(! function_exists('userHasAccess')) {
    function userHasAccess($module,$rule,$user_id = '',$group_id = '') {
        $CI =& get_instance();
		$permissions_groups = $CI->config->item("group");
		$permissions_users = $CI->config->item("user");
		
		if($user_id == "") {
			$user_id = $CI->session->userdata("user_id");
		}
		
		if($group_id == "") {
			$group_id = $CI->session->userdata("group_id");
		}
		
		if($user_id == 1 && $rule != 24) {
			return TRUE;
		}
		elseif(in_array($group_id,array(1,2)) && $rule == 24) {
			return TRUE;
		}
		else {
			if(isset($permissions_users[$user_id])) {
				if(isset($permissions_users[$user_id][$module][$rule]) && $permissions_users[$user_id][$module][$rule] == 1) {
					return TRUE;
				}
				else {
					return FALSE;
				}
			}
			else {
				if(isset($permissions_groups[$group_id][$module][$rule]) && $permissions_groups[$group_id][$module][$rule] == 1) {
					return TRUE;
				}
				else {
					return FALSE;
				}
			}
		}
		return false;
		
		/*$permissions1 = $CI->config->item("user");
		if($user_id == "") {
			$user_id = $CI->session->userdata("user_id");
		}
		if(isset($permissions1[$user_id][$module][$rule]) && $permissions1[$user_id][$module][$rule] == 1)
        return true;
		else
		return false;*/
    }
}

if(! function_exists('checkAccess')) {
    function checkAccess($module,$rule) {
		if(!hasAccess($module,$rule)) {
			$this->session->set_flashdata('warning', 'Access Denied! You don\'t have right to access the requested page. If you think, it\'s by mistake, please contact administrator.');
            redirect(site_url());
		}
		return TRUE;
	}
}

if(! function_exists('hasAccess')) {
    function hasAccess($module,$rule) {
        $CI =& get_instance();
		$permissions_groups = $CI->config->item("group");
		$permissions_users = $CI->config->item("user");
		$group_id = $CI->session->userdata("group_id");
		$user_id = $CI->session->userdata("user_id");
		if($user_id == 1 && $rule != 24) {
			return TRUE;
		}
		elseif(in_array($group_id,array(1,2)) && $rule == 24) {
			return FALSE;
		}
		else {
			if(isset($permissions_users[$user_id])) {
				if(isset($permissions_users[$user_id][$module][$rule]) && $permissions_users[$user_id][$module][$rule] == 1) {
					return TRUE;
				}
				else {
					return FALSE;
				}
			}
			else {
				if(isset($permissions_groups[$group_id][$module][$rule]) && $permissions_groups[$group_id][$module][$rule] == 1) {
					return TRUE;
				}
				else {
					return FALSE;
				}
			}
		}
		return false;
    }
}


if(! function_exists('enableDisableID')) {
    function enableDisableID() {
        return 0;
    }
}
