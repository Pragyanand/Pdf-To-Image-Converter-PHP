<?php session_start();
//Function to delete a whole folder
function delTree($dir)
    { 
        $files = array_diff(scandir($dir), array('.', '..')); 

        foreach ($files as $file) { 
            (is_dir("$dir/$file")) ? delTree("$dir/$file") : unlink("$dir/$file"); 
        }

        return rmdir($dir); 
    } 



//Function to create a zip file

Class ZipArchiver {
    
    /**
     * Zip a folder (including itself).
     * 
     * Usage:
     * Folder path that should be zipped.
     * 
     * @param $sourcePath string 
     * Relative path of directory to be zipped.
     * 
     * @param $outZipPath string 
     * Path of output zip file. 
     *
     */
    public static function zipDir($sourcePath, $outZipPath){
        $pathInfo = pathinfo($sourcePath);
        $parentPath = $pathInfo['dirname'];
        $dirName = $pathInfo['basename'];
    
        $z = new ZipArchive();
        $z->open($outZipPath, ZipArchive::CREATE);
        $z->addEmptyDir($dirName);
        if($sourcePath == $dirName){
            self::dirToZip($sourcePath, $z, 0);
        }else{
            self::dirToZip($sourcePath, $z, strlen("$parentPath/"));
        }
        $z->close();
        
        return true;
    }
    
    /**
     * Add files and sub-directories in a folder to zip file.
     * 
     * @param $folder string
     * Folder path that should be zipped.
     * 
     * @param $zipFile ZipArchive
     * Zip file where files end up.
     * 
     * @param $exclusiveLength int 
     * Number of text to be excluded from the file path. 
     *
     */
    private static function dirToZip($folder, &$zipFile, $exclusiveLength){
        $handle = opendir($folder);
        while(FALSE !== $f = readdir($handle)){
            // Check for local/parent path or zipping file itself and skip
            if($f != '.' && $f != '..' && $f != basename(__FILE__)){
                $filePath = "$folder/$f";
                // Remove prefix from file path before add to zip
                $localPath = substr($filePath, $exclusiveLength);
                if(is_file($filePath)){
                    $zipFile->addFile($filePath, $localPath);
                }elseif(is_dir($filePath)){
                    // Add sub-directory
                    $zipFile->addEmptyDir($localPath);
                    self::dirToZip($filePath, $zipFile, $exclusiveLength);
                }
            }
        }
        closedir($handle);
    }
    
}




$filename = $_FILES['file']['name'];

$_SESSION["see"] = "fhfghf";

if ($filename == "") {

  echo "<script> alert('Please Choose a File First!'); 
    window.location.href = 'index.php';
    </script>";
} else { 
    
    $pdfAbsolutePath = __DIR__."/".$filename;
    
    if (move_uploaded_file($_FILES['file']["tmp_name"], $pdfAbsolutePath)) {
    
          $im = new imagick($pdfAbsolutePath);
    
          $noOfPagesInPDF = $im->getNumberImages(); 
    
          if ($noOfPagesInPDF) { 
    
              for ($i = 0; $i < $noOfPagesInPDF; $i++) { 
    
                  $url = $pdfAbsolutePath.'['.$i.']'; 
				  
                  $im->setResolution(300, 300);
				  $im->readImage($url);
				  $im->setImageFormat("jpg"); 
				  $nameWithOutExtension = pathinfo($filename, PATHINFO_FILENAME);
				  $imageDirectory = $nameWithOutExtension."_images";


				  if(!is_dir($imageDirectory)){
				  		mkdir($imageDirectory);
					}

        
    
                  $im->writeImage(__DIR__."/".$imageDirectory."/".$nameWithOutExtension."_Page - ".($i+1).'.jpg');

                  
                  $zipper = new ZipArchiver;
                  $zip = $zipper->zipDir($imageDirectory, $imageDirectory.".zip");


				 
				}
				
				//delete Original File & Folder Created
    			delTree($imageDirectory);
				unlink($filename);

    		  	echo "<br> deleted <br> <br><br>";
    		 
              echo "All pages of PDF is converted to images";
    
          }
		  else
			  
          echo "PDF doesn't have any pages";
    
    }
    
    }
    ?> 