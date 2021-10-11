<?php

namespace App\Controllers;

use \App\Models\Skoly_model;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;

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
                echo view('home', $data);
                echo view('layout/footer');
            }
        else{ 

            echo view('layout/header');
            echo view('home', $data);
            echo view('layout/footer');

        }

    }

    public function add()
    {

        $db = db_connect();
	    $skoly_model = new Skoly_model($db);

        $data['home'] = $skoly_model->getSchool();
    
            $error = $this->validate([
                'pocet'	=>	'required|numeric|min_length[1]'
            ]);
            
            if(!$error)
            {
                echo view('layout/header_in');
                echo view('add', $data, ['error' 	=> $this->validator]);
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
                echo view('add', $data);
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
                $data['home'] = $skoly_model->getSchool();


				$error = $this->validate([
                    'pocet'	=>	'required|numeric|min_length[1]'
				]);
				
				if(!$error)
				{
					echo view('layout/header_in');
					echo view('edit', $data, ['error' 	=> $this->validator]);
					echo view('layout/footer');

				}
				else{
	   
				   $skoly_model->edit(
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

   public function map($id_map) {
         
    $db      = \Config\Database::connect();
    $builder = $db->table('skola');  

    $query = $builder->select('geo-lat AS lat, geo-long AS long, id, nazev')->limit(20)->where('id', $id_map)->get();
    $data = $query->getResult();

    $markers = [];

    foreach($data as $value) {
      $markers[] = [
        $value->nazev, $value->lat, $value->long
      ];
      $infowindow[] = [
        "<div class=info_content><h3>".$value->nazev."</h3><p>".$value->nazev."</p></div>"
       ];          
    }
    $location['markers'] = json_encode($markers);
    $location['infowindow'] = json_encode($infowindow);
    
    echo view('layout/header_in');
    echo view('map',$location);
    echo view('layout/footer');
    }
}
