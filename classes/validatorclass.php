<?php

class Validator
{
    public function Clean($input)
    {
        return trim(strip_tags(stripslashes($input)));
    }

    public function Validate($input, $flag)
    {
        $status = true;

        switch ($flag) {
            case 1:
                # code...
                if (empty($input)) {
                    $status = false;
                }
                break;

            case 2:
                # code ....
                if(empty($content)){
                    $errors['content'] = "Field Required";
                    }elseif(strlen($input)<50 ){
                    $errors['content'] = " content must be 50 char";
                    }


        

            case 4:
                if(!empty($_FILES['image']['name'])){

                    $imgName     = $_FILES['image']['name'];
                    $imgTempPath = $_FILES['image']['tmp_name'];
                    $imagSize    = $_FILES['image']['size'];
                    $imgType     = $_FILES['image']['type'];
                
                
                    $imgExtensionDetails = explode('.',$imgName);
                    $imgExtension        = strtolower(end($imgExtensionDetails));
                
                    $allowedExtensions   = ['png','jpg','gif'];
                
                       
                    if(in_array($imgExtension ,$allowedExtensions)){
                            
                          
                        $finalName = rand().time().'.'.$imgExtension;
                
                         $disPath = './upload/'.$finalName;
                          
                        if(move_uploaded_file($imgTempPath,$disPath)){
                            echo 'Image Uploaded';
                        }else{
                            echo 'Error Try Again';
                        }
        }

        return $status;
    }
        }
    }    
    
          
    

     

}
?>