<?php

namespace App\Http\Controllers;

use Nette\IOException;

class FileHandlerController extends Controller {
    public static function fileHandler($filePath) {
        $handle = fopen($filePath, 'r'); // mode r --> Read only

        if ($handle) {  //if file opened success
            $words = [];

            while (($data = fgetcsv($handle)) !== false) {
                $words[] = $data[0];
            }

            fclose($handle);

            if (empty($words)) {
                throw new IOException("Die Datei ist leer."); //throws a exception if file is empty
            }

            return $words;
        } else {
            throw new IOException("Die Datei konnte nicht geöffnet werden."); //throws exception if file cannot be opened
        }
    }
}

