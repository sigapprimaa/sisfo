<?php

require_once APPPATH . 'third_party/dompdf/dompdf_config.inc.php';
require_once APPPATH . 'third_party/dompdf/autoload.inc.php';
use Dompdf\Dompdf;

class Pdf extends Dompdf    
	{
		public function __construct()
			{
					 parent::__construct();      
				$dompdf = new Dompdf(); 
			}
	}
