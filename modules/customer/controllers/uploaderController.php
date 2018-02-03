<?php

class uploaderController extends Controller
{
    public function __construct() {

        parent::__construct();
        Session::accesoEstricto(array('customer'));
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
            $target = ROOT."public/uploads/customer/profile/$user_id/";

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

    public function renter_docs($week_id = 'trash',$reservation_id='')
    {

        if (empty($_FILES['renter_docs']))
        {
            echo json_encode(['error'=>'No files found for upload.']);
            return;
        }

        $images = $_FILES['renter_docs'];
        $success = null;

        $paths= [];

        $filenames = $images['name'];
        for($i=0; $i < count($filenames); $i++)
        {
            $filename = basename($filenames[$i]);
            $target = ROOT."public/uploads/renter_docs/$week_id/$reservation_id/";

            if (!file_exists($target)) {
                mkdir($target, 0777, true);
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

    public function buyer_docs($week_id = 'trash',$buyer_id = '')
    {

        if (empty($_FILES['buyer_docs']))
        {
            echo json_encode(['error'=>'No files found for upload.']);
            return;
        }

        $images = $_FILES['buyer_docs'];
        $success = null;

        $paths= [];

        $filenames = $images['name'];
        for($i=0; $i < count($filenames); $i++)
        {
            $filename = basename($filenames[$i]);
            $target = ROOT."public/uploads/buyer_docs/$week_id/$buyer_id/";
            if (!file_exists($target)) {
                mkdir($target, 0777, true);
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

    public function owner_docs($week_id = 'trash')
    {

        if (empty($_FILES['owner_docs']))
        {
            echo json_encode(['error'=>'No files found for upload.']);
            return;
        }

        $images = $_FILES['owner_docs'];
        $success = null;

        $paths= [];

        $filenames = $images['name'];
        for($i=0; $i < count($filenames); $i++)
        {
            $filename = basename($filenames[$i]);
            $target = ROOT."public/uploads/owner_docs/$week_id/";

            if (!file_exists($target)) {
                mkdir($target, 0777, true);
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

    public function ownerp_docs($week_id = 'trash')
    {

        if (empty($_FILES['ownerp_docs']))
        {
            echo json_encode(['error'=>'No files found for upload.']);
            return;
        }

        $images = $_FILES['ownerp_docs'];
        $success = null;

        $paths= [];

        $filenames = $images['name'];
        for($i=0; $i < count($filenames); $i++)
        {
            $filename = basename($filenames[$i]);
            $target = ROOT."public/uploads/ownerp_docs/$week_id/";
            if (!file_exists($target)) {
                mkdir($target, 0777, true);
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



    public function migration_file()
    {
        if (empty($_FILES['migration_file']))
        {
            echo json_encode(['error'=>'No files found for upload.']);
            return;
        }

        $images = $_FILES['migration_file'];
        $success = null;

        $paths= [];

        $filenames = $images['name'];
        for($i=0; $i < count($filenames); $i++)
        {
            $filename = basename($filenames[$i]);
            $target = ROOT."public/uploads/migration/";
            if (!file_exists($target)) {
                mkdir($target, 0777, true);
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