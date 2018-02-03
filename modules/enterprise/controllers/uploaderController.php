<?php

class uploaderController extends Controller
{
    public function __construct() {

        parent::__construct();
        Session::accesoEstricto(array('enterprise'));
        $this->model=$this->loadModel('db');
    }

    public function index()
    {
        $this->_view->getPlugins(array('bootstrap-fileinput'));
        $this->_view->getPlugins(array('clockpicker'));
        $this->_view->setJs(array('weeks'));
        $this->_view->renderizar('index');
    }

    public function photo_profile($user_id = 'trash')
    {
        if (empty($_FILES['photo_profile']))
        {
            echo json_encode(['error'=>'No files found for upload.']);
            return;
        }

        $images = $_FILES['photo_profile'];
        $success = null;

        $paths= [];
        $filenames = $images['name'];
        for($i=0; $i < count($filenames); $i++)
        {
            $filename = basename($filenames[$i]);
            $target = ROOT."public/uploads/enterprise/profile/$user_id/";

            if (!file_exists($target)) {
                mkdir($target);
            }


            if(move_uploaded_file($images['tmp_name'][$i], $target.'profile.jpg')) {
                $success = true;
                $paths[] = $target.$filename;
            } else {
                $success = false;
                break;
            }
        }

        if ($success === true)
        {
            $output = ['uploaded' => $paths];
        } elseif ($success === false) {
            $output = ['error'=>'Error while uploading images. Contact the system administrator'];
            foreach ($paths as $file) {
                unlink($file);
            }
        } else {
            $output = ['error'=>'No files were processed.'];
        }
        echo json_encode($output);
    }

    public function photo_product($stuff_id)
    {
        if (empty($_FILES['photo_product']))
        {
            echo json_encode(['error'=>'No files found for upload.']);
            return;
        }
        
        $target = ROOT."public/uploads/enterprise/stuff/$stuff_id/";
        if (!file_exists($target))
        {
            mkdir($target);
        }
        
        $handle = opendir($target);
        while($file = readdir($handle))
        {
            if(is_file($target.$file))
            {
                unlink($target.$file);
            }
        }

        $images = $_FILES['photo_product'];
        $success = null;

        $paths= [];
        $filenames = $images['name'];
        for($i=0; $i < count($filenames); $i++)
        {
            $filename = basename($filenames[$i]);
            $target = ROOT."public/uploads/enterprise/stuff/$stuff_id/";
            if (!file_exists($target)) {
                mkdir($target);
            }


            if(move_uploaded_file($images['tmp_name'][$i], $target.$filename)) {
                $success = true;
                $paths[] = $target.$filename;
            } else {
                $success = false;
                break;
            }
        }

        if ($success === true)
        {
            $output = ['uploaded' => $paths];
        } elseif ($success === false) {
            $output = ['error'=>'Error while uploading images. Contact the system administrator'];
            foreach ($paths as $file) {
                unlink($file);
            }
        } else {
            $output = ['error'=>'No files were processed.'];
        }
        echo json_encode($output);
    }

    public function delete_docs()
    {
        $u = $_POST['user_id'];
        $f = $_POST['name'];
        $d = $_POST['dir'];

        $rm = ROOT.'public/uploads/'.$d.'/'.$u.'/'.$f;
        if(unlink($rm)){
            $result = true;
            $message = 'File deleted successfully';
        }else{
            $result=false;
            $message = 'There was an error to try delete "'.$f.'" file...';
        }

        $response = array('result' => $result, 'message' => $message);
        echo json_encode($response);
    }

}