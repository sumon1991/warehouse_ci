<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Cron extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        show_404();
    }

    function run()
    {
        $this->load->model('cron_model');
        if ($m = $this->cron_model->run_cron()) {
            echo '<!doctype html><html><head><title>Cron Job</title><style>p{background:#F5F5F5;border:1px solid #EEE; padding:15px;}</style></head><body>';
            echo '<p>Corn job successfully run.</p>' . $m;
            echo '</body></html>';
        } else {
            echo 'Corn job failed!';
        }
    }

    function log_corn($msg, $val = NULL)
    {
        $this->load->library('logs');
        return (bool)$this->logs->write('corn', $msg, $val);
    }
	
	
	function database()
	{
		$query = $this->db->query("SHOW TABLES FROM dowgroup_reza123");
		$res = $query->result_array();
		$html = '<table border="1" cellspacing="0" cellpadding="10">';
		
		foreach($res as $k => $v) {
			$table = str_replace("sma_","",$v['Tables_in_dowgroup_reza123']);
			$html .= '<tr>';
			$html .= '<td valign="top"><b>'.$table.'</b></td>';
			$html .= '<td><table border="1" cellspacing="0" cellpadding="5">';
			$fields = $this->db->field_data($table);
			foreach ($fields as $field)
			{
			   $html .= '<tr>';
			   $html .= '<td>'.$field->name.'</td>';
			   $html .= '<td>'.$field->type.'</td>';
			   $html .= '<td>'.$field->max_length.'</td>';
			   $html .= '<td>'.$field->primary_key.'</td>';
			   $html .= '</tr>';
			}
			$html .= '</tr></table></td>';
			$html .= '</tr>';
		}
		
		$html .= '</table>';
		echo $html;
		//print '<pre>'; print_r($res); exit;
	}

}
