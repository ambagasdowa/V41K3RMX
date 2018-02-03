<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 5/5/16
 * Time: 1:42 PM
 */

class activateController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->model=$this->loadModel('db');
        $this->actions=$this->loadModel('actions');
    }

    public function index($id=null)
    {

    }

    public function user($user_id=false)
    {
        if( !empty($user_id))
        {
            $this->getLibrary('encrypt');
            $encrypt=new Encryption(HASH_KEY);

            $user_id=$encrypt->decrypt($user_id);
            $user=$this->model->select_row('vw_system_users','*',array('user_id'=>$user_id));
            $this->_view->form=1;

            if($user)
            {

                $this->_view->status=true;
                if($user['val']==1)
                {
                    $this->_view->msg='Your account <span class="text-green">has<br> already been activated</span>, <br>please login.';

                }else{

                    $data['user_id']=$user['user_id'];
                    $data['val']=1;
                    $data['val_on']=date('Y-m-d H:i:s');


                    $val=$this->model->select_count('validations','user_id',array('user_id'=>$user['user_id']));

                    if($val['count']==0)
                    {
                        $res=$this->model->insert('validations',$data,array('user_id'=>$user['user_id']),array());
                    }else{
                        $res=$this->model->update('validations',$data,array('user_id'=>$user['user_id']),array());
                    }

                    if($res['status']=='success')
                    {
                        //event control
                        #$event_description='Member id '.$user_id.' activated';

                        $toString = $user['username'];
                        $userType = $user['type_id'];

                        $this->_view->msg='Your account <span class="text-green">has been<br> successfully activated</span>,<br> please login.';




                        if($userType == 3)
                        {
                            $file_template = 'welcome_cycler.html';
                            $subject = 'Welcome to VIKER.MX';

                            $template_data = array( '{{customer_name}}',
                                '{{user_id}}',
                                '{{username}}',
                                '{{password}}',
                                '{{url}}',
                                '{{mail_company}}'
                            );

                            $template_replace = array(  $user['first_name'] . ' ' . $user['last_name'],
                                $encrypt->encrypt($user['user_id']),
                                $user['username'],
                                $user['password_clean'],
                                APP_URL,
                                EMAIL_COMPANY
                            );

                            $htmlContent = $this->getEmailTemplate($file_template, $template_data, $template_replace);
                            $this->sendMail(EMAIL_COMPANY, $toString, $subject, $htmlContent);
                        }

                    }else{

                        //event control
                        #$event_description='Member id '.$member_id.'. error activating account';
                        $this->_view->msg='There was a problem<br> activating your account.<br><span class="text-green"> Please contact us</span>';
                        $this->_view->form=2;
                    }
                }

            }else{

                $this->_view->msg='User does not exist';
                $this->_view->form=0;
            }
        }

        $this->_view->renderizar('user');
    }
}
