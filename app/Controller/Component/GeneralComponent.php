<?php
App::uses('Component', 'Controller');

class GeneralComponent extends Component {
    // the other component your component uses
    // public $components = array('Existing');

    public function upload_image($file, $path) {
    	$fname = $file['logo']['name'];
        if (!empty($fname)) {
            $ext = explode('.', $fname);
            $extension = array('jpg', 'jpeg', 'png','gif','SVG','JPG','JPEG');
            $isValidFile = in_array($ext[1], $extension);
        }
        $errors = array();
        $editMethod = false;
        if(!empty($file['logo']['name'] )) {
          
            if (($file['logo']['error'] == 1)) {
                $errors [] = "Please upload jpg, jpeg, SVG, or png files with size 2 MB.";
            }
            else if ($file['logo']['size'] >= 2097152) {
                $errors [] = "Please upload image with size 2 MB.";
            }
            else if ($isValidFile !=1){
                $errors [] = "Please select file in jpg, png, jpeg format only.";
            }
        }
        if (!empty($errors)){
            return implode("\n", $errors);
        }else{
          	$uploadPath = WWW_ROOT . $path;
            $fpath =  $uploadPath . "/" . $file['logo']['name'];
            move_uploaded_file($file['logo']['tmp_name'], $fpath);
        	return true;
        }
    }

    public function upload_single_image($file, $path) {
        $fname = $file['name'];
        if (!empty($fname)) {
            $ext = explode('.', $fname);
            $extension = array('jpg', 'jpeg', 'png','gif','SVG','JPG','JPEG');
            $isValidFile = in_array($ext[1], $extension);
        }
        $errors = array();
        $editMethod = false;
        if(!empty($file['name'] )) {
          
            if (($file['error'] == 1)) {
                $errors [] = "Please upload jpg, jpeg, SVG, or png files with size 2 MB.";
            }
            else if ($file['size'] >= 2097152) {
                $errors [] = "Please upload image with size 2 MB.";
            }
            else if ($isValidFile !=1){
                $errors [] = "Please select file in jpg, png, jpeg format only.";
            }
        }
        if (!empty($errors)){
            return implode("\n", $errors);
        }else{
            $uploadPath = WWW_ROOT . $path;
            $fpath =  $uploadPath . "/" . $file['name'];
            move_uploaded_file($file['tmp_name'], $fpath);
            $imagesnames = $path.'/'.$file['name'];
            return $imagesnames;
        }
    }
    public function multiple_images_upload($files, $path){
        $imagesnames = array();
        if (is_array($files)) {
            foreach ($files as $images) {
                $fname = $images['name'];
                if (!empty($fname)) {
                    $ext = explode('.', $fname);
                    $extension = array('jpg', 'jpeg', 'png');
                    $isValidFile = in_array($ext[1], $extension);
                }
                $errors = array();
                $editMethod = false;
                 // It will work for Update Method
                if(!empty($this->data['Category']['id'])){
                  if(!empty($images['name'] )){
                    if (($images['error'] == 1)){
                        $errors [] = "Please upload jpg, jpeg or png files with size 2 MB.";
                    }
                    else if ($images['size'] >= 10097152) {
                        $errors [] = "Please upload image with size 5 MB.";
                    }
                    else if ($isValidFile !=1){
                        $errors [] = "Please select file in jpg, png, jpeg format only.";
                    }
                  }
                }
                // It will work for Create Method
                else{
                    if(!empty($images['name'] )) {
                      
                        if (($images['error'] == 1)) {
                            $errors [] = "Please upload jpg, jpeg or png files with size 2 MB.";
                        }
                        else if ($images['size'] >= 2097152) {
                            $errors [] = "Please upload image with size 2 MB.";
                        }
                        else if ($isValidFile !=1){
                            $errors [] = "Please select file in jpg, png, jpeg format only.";
                        }
                    }

                }
                // if error found it will display or move uploaded file 
                if (!empty($errors))
                {
                    return implode("\n", $errors);
                }else{
                  $uploadPath = WWW_ROOT . $path;
                    $fpath =  $uploadPath . "/" . $images['name'];
                    move_uploaded_file($images['tmp_name'], $fpath);
                    $imagesnames[] = $path.'/'.$images['name'];
                }
            }
        }
        return $imagesnames;
    }
    
    public function create_thumbnail($imgs, $target_folder){

    }

    /* Generate Random String  */
    public function generateRandomString($length = 6) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        // echo $randomString;
        return $randomString;
    }

    public function GetCountriesState(){
        $countrycitylist = file_get_contents(APP.'Plugin/Country-State-City-Database-master/Countries.json');
        $jsondata = json_decode($countrycitylist,true);
        return $jsondata;
    }

    public function GetCountries(){
        $countryArray = array();
        $countrycitylist = $this->GetCountriesState();
        foreach ($countrycitylist as $countries) {
            foreach ($countries as $country) {
            $countryArray[] = $country['CountryName'];
            }
        }
        return $countryArray;
    }   

    public function GetState($CountryCode){
        $stateArray = array();
        $countrycitylist = $this->GetCountriesState();
        foreach ($countrycitylist as $countries) {
            $country = $countries[$CountryCode];
        }
        foreach ($country as $stateslist) {
            if (count($stateslist) > 0 && is_array($stateslist)) {
                foreach ($stateslist as $states) {
                    $stateArray[] = $states['StateName'];
                }
            }
        }
        return $stateArray;
    }

    function objectToArray($d) {
        if (is_object($d)) {
            // Gets the properties of the given object
            // with get_object_vars function
            $d = get_object_vars($d);
        }
        
        if (is_array($d)) {
            /*
            * Return array converted to object
            * Using __FUNCTION__ (Magic constant)
            * for recursive call
            */
            return array_map(__FUNCTION__, $d);
        }
        else {
            // Return array
            return $d;
        }
    }

};