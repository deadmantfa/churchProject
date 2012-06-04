<?php
require_once('tcpdf.php');
class baptismPdf extends FPDI
{
	 /**
     * "Remembers" the template id of the imported page
     */
    var $_tplIdx;
    
    /**
     * include a background template for every page
     */
    function Header() {
        if (is_null($this->_tplIdx)) {
            $this->setSourceFile('templates/pdf/baptism.pdf');
            $this->_tplIdx = $this->importPage(1);
        }
        $this->useTemplate($this->_tplIdx, null,30,220,190);
        
        $this->SetTextColor(255);
        $this->SetXY(47, 80);
    }
    
    function Footer() {}
	public function printData($model){
		$this->SetFont("helvetica", "", 10);
		
		$x = 46;
		$y = 80;
		$w = 24;
		$h = 5;
        $this->SetXY($x, $y);
		$this->Cell($w, $h, $model->year);
		$x += $w + 25 ;
		$w = 30;
		$this->SetX($x);
		$this->Cell($w, $h, $model->nationality->nationality);
		$x += $w + 11;
		$w = 30;
		$this->SetX($x);
		$this->Cell($w, $h, commonFunc::getGender($model->gender));
		$x += $w + 10;
		$w = 30;
		$this->SetX($x);
		$this->Cell($w, $h, $model->id);
		
		$y += 10;
		$x = 40;
		$w = 68;
		$this->SetXY($x, $y);
		$this->Cell($w, $h, date('d-m-Y',  strtotime($model->dateOfBaptism)));
		$x += $w + 20;
		$this->SetX($x);
		$this->Cell($w, $h, date('d-m-Y',  strtotime($model->dateOfBirth)));
		
		$y += 8;
		$x = 50;
		$w = 57;
		$this->SetXY($x, $y);
		$this->Cell($w, $h, $model->childName);
		$x += $w + 13;
		$this->SetX($x);
		$w = 78;
		$this->Cell($w, $h, $model->surname);
		
		$y += 8;
		$x = 40;
		$w = 68;
		$this->SetXY($x, $y);
		$this->Cell($w, $h, $model->fatherName);
		$x += $w + 14;
		$this->SetX($x);
		$w = 78;
		$this->Cell($w, $h, $model->domicile1);
		
		$y += 8;
		$x = 40;
		$w = 68;
		$this->SetXY($x, $y);
		$this->Cell($w, $h, $model->motherName);
		$x += $w + 14;
		$this->SetX($x);
		$w = 78;
		$this->Cell($w, $h, $model->domicile2);
		
		$y += 7;
		$x = 45;
		$w = 63;
		$this->SetXY($x, $y);
		$this->Cell($w, $h, $model->godFatherName);
		$x += $w + 14;
		$this->SetX($x);
		$w = 78;
		$this->Cell($w, $h, $model->domicile3);
		
		$y += 7;
		$x = 45;
		$w = 63;
		$this->SetXY($x, $y);
		$this->Cell($w, $h, $model->godMotherName);
		$x += $w + 14;
		$this->SetX($x);
		$w = 78;
		$this->Cell($w, $h, $model->domicile4);
		
		$y += 8;
		$x = 32;
		$w = 167;
		$this->SetXY($x, $y);
		$this->Cell($w, $h, $model->minister);
		
		$y += 7;
		$x = 30;
		$w = 167;
		$this->SetXY($x, $y);
		$this->Cell($w, $h, $model->remark);
		
		$x = 30;
		$y = 164;
		$w = 10;
		$this->SetXY($x, $y);
		$this->Cell($w, $h, date('d-m-Y'));
	}
}
?>
