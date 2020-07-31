<?php
error_reporting(E_ALL &~ E_NOTICE &~ E_DEPRECATED);

function pdfEncrypt ($origFile, $password, $destFile){
//include the FPDI protection http://www.setasign.de/products/pdf-php-solutions/fpdi-protection-128/
require_once('fpdi/FPDI_Protection.php');

$pdf = new FPDI_Protection();
// set the format of the destinaton file, in our case 6×9 inch
$pdf->FPDF('P', 'in', array('8.5','11'));

//calculate the number of pages from the original document
$pagecount = $pdf->setSourceFile($origFile);

// copy all pages from the old unprotected pdf in the new one
for ($loop = 1; $loop <= $pagecount; $loop++) {
$tplidx = $pdf->importPage($loop);
$pdf->addPage();
$pdf->useTemplate($tplidx);
}

// protect the new pdf file, and allow no printing, copy etc and leave only reading allowed
$pdf->SetProtection(array(), $password);
$pdf->Output($destFile, 'F');

return $destFile;
}


$filename = $_FILES['file']['name'];

if($filename == "" && $_POST["password"] == ""){

echo "<script> alert('Please Choose a File & Enter a Password !'); 
	  window.location.href = 'index.php';
	  </script>";

}
elseif ($filename == "") {

	echo "<script> alert('Please Choose a File First!'); 
	  window.location.href = 'index.php';
	  </script>";
	}

elseif ($_POST["password"] == "") {

	echo "<script> alert('Please Enter a Password!'); 
	  window.location.href = 'index.php';
	  </script>";
	}
	
else{
echo "\n \n \n <br> <br>";  
$pdfAbsolutePath = __DIR__.$filename;
$pdfAbsolutePathConverted = __DIR__."\EncryptedPdf\\"."Protected_".$filename;


if (move_uploaded_file($_FILES['file']["tmp_name"], $pdfAbsolutePath)) {

	$origFile = $pdfAbsolutePath;

      }
else
	  
  echo "PDF doesn't have any pages";

    

//password for the pdf file (I suggest using the email adress of the purchaser)
$password = $_POST['password'];

//name of the original file (unprotected)
$origFile = $pdfAbsolutePath;

//name of the destination file (password protected and printing rights removed)
$destFile =$pdfAbsolutePathConverted;

//encrypt the book and create the protected file
pdfEncrypt($origFile, $password, $destFile );
//unlink($filename);
echo "<script> alert('Encrytion Successful !'); 
	  window.location.href = 'index.php';
	  </script>";
}

?>