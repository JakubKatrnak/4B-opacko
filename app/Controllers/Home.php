<?php

namespace App\Controllers;

use \App\Models\Skoly_model;

class Home extends BaseController
{

    public function home()
    {
        $this->ionAuth = new \IonAuth\Libraries\IonAuth(); 

        $db = db_connect();
	    $skoly_model = new Skoly_model($db);

        $data['home'] = $skoly_model->getSchool();

        if ( $this->ionAuth->loggedIn() ) {

                echo view('layout/header_in');
                //echo view('home', $data);
                echo view('layout/footer');
            }
        else 

        echo view('layout/header');
        echo view('home', $data);
        echo view('layout/footer');

    }

    public function add()
    {
    
            $error = $this->validate([
                'skola'			=>	'required|min_length[3]',
                'mesto'		=>	'required|min_length[3]',
                'pocet'	=>	'required|numeric|min_length[1]'
            ]);
            
            if(!$error)
            {
                echo view('layout/header_in');
                echo view('add', ['error' 	=> $this->validator]);
                echo view('layout/footer');
            }
            else{
                
                $db = db_connect();
                $skoly_model = new Skoly_model($db);
    
                $skoly_model->add(
                    $s = $this->request->getVar('skola'),
                    $m = $this->request->getVar('mesto'),
                    $o = $this->request->getVar('obor'),
                    $p = $this->request->getVar('pocet'),
                );
    
                echo view('layout/header_in');
                echo view('add');
                echo view('layout/footer');
            }
            
    }
   
	public function edit_school($id_school)
	{
	   $this->ionAuth = new \IonAuth\Libraries\IonAuth(); 
	   
       $db = db_connect();
       $skoly_model = new Skoly_model($db);
   
	   if ( $this->ionAuth->loggedIn() ) {

				$data['edit_school'] = $skoly_model->getSchool_edit($id_school);


				$error = $this->validate([
                    'skola'			=>	'required|min_length[3]',
                    'mesto'		=>	'required|min_length[3]',
                    'pocet'	=>	'required|numeric|min_length[1]'
				]);
				
				if(!$error)
				{
					echo view('layout/header_in');
					echo view('edit', $data, ['error' 	=> $this->validator]);
					echo view('layout/footer');

				}
				else{
	   
				   $kino_model->edit_update(
						$id_school,
                        $s = $this->request->getVar('skola'),
                        $m = $this->request->getVar('mesto'),
                        $o = $this->request->getVar('obor'),
                        $p = $this->request->getVar('pocet'),
				   );
				   	
				 	  echo view('layout/header_in');
					echo view('edit', $data);
					echo view('layout/footer');
				}
		   }
	   else 
   
	   throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
   
   }
}
