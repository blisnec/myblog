<?php
$config = array(
       'users/signup' => array(
                    array(
                         'field' => 'fname',
                         'label' => 'FullName',
                         'rules' => 'trim|xss_clean|required|min_length[4]|max_length[25]'
                        ),
                    array(
                         'field' => 'username',
                         'label' => 'Username',
                         'rules' => 'trim|xss_clean|required|min_length[4]|max_length[25]|callback_username_check[$username]'
                         ),
                    array(
                         'field' => 'password',
                         'label' => 'Password',
                         'rules' => 'trim|xss_clean|required'
                         ),
                    array(
                         'field' => 'passconf',
                         'label' => 'PasswordConfirmation',
                         'rules' => 'required|min_length[5]|matches[password]'
                         ),
                    array(
                         'field' => 'email',
                         'label' => 'Email',
                         'rules' => 'trim|xss_clean|required|min_length[4]|max_length[25]|callback_email_check[$email]'
                         )
                    )
         );