<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
require_once dirname(__FILE__) . '/tcpdf/tcpdf.php';

class Pdf extends TCPDF
{
    function __construct()
    {
        parent::__construct();
    }

    public function Header()
    {
        // Logo
        $image_file = K_PATH_IMAGES . 'logo.png';
        $this->setJPEGQuality(90);
        $this->Image($image_file, 16, 14, 40, 20, 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        $this->SetY(15);
        $table = "<table align=\"center\">
       <tr>
           <td><h1>Slip Gaji</h1></td>
       </tr>
       <tr>
           <td><strong>PPKH Kec. Wanasari Kab. Brebes</strong></td>
       </tr>
       <tr>
            <td>Jalan Raya Pantura No.18. <br>
            Desa Pesantunan. Kecamatan Wanasari. Kabupaten Brebes</td>
        </tr>
       </table>";
        $this->writeHTML($table, true, false, false, false, '');
        $this->writeHTML("<hr>", true, false, false, false, '');
        $this->SetMargins(10, 40, 10, true);
    }
}
