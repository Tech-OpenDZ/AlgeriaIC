<?php

//pdf.php

require_once '/var/www/vhosts/algeriainvest.com/httpdocs/AlgeriaIC/resources/views/frontend/signup/dompdf/autoload.inc.php';

use Dompdf\Dompdf;

class Pdf extends Dompdf{

	public function __construct(){
		parent::__construct();
	}
}

?>