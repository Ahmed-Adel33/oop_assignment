<?php


require 'dbclass.php';
require 'validatorclass.php';
class User
{
    private $title;
    private $content;
    private $image;

    

    public function Register($title, $content , $image )
{

        $validator = new Validator();
       
        # Clean ....
        $this->title     = $validator->Clean($title);
        $this->content    = $validator->Clean($content);
        $this->image = $validator->Clean($image);

        # Validation .....
        $errors = [];

        # Validate Title ...
        if (!$validator->Validate($this->Title, 1)) {
            $errors['Title'] = 'Field Required';
        }

        # Validate Email
        if(empty($content)){
            $errors['content'] = "Field Required";
            }elseif(strlen($content)<50 ){
            $errors['content'] = " content must be 50 char";
            }

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
             $_SESSION['Message']='Message';     
            }

          
    
    }
    public function info(){
        echo "name";
    }
}
    
       ?>
      


         





