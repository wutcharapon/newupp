<?php
$zip = new ZipArchive;
$res = $zip->open('test.zip', ZipArchive::CREATE);
if ($res === TRUE) {
    $zip->addFromString('test.txt', 'file content goes here');
	/*
    $zip->addFile('6265619dc8431_1650811293.pdf');
    $zip->renameName('6265619dc8431_1650811293.pdf','1.pdf');
    $zip->addFile('6265619ddc1a9_1650811293.pdf');
    $zip->renameName('6265619ddc1a9_1650811293.pdf','2.pdf');
	*/
    $zip->close();
    echo 'ok';
	header('Content-disposition: attachment; filename=files.zip');
	header('Content-type: application/zip');
	readfile($tmp_file);
} else {
    echo 'failed';
}