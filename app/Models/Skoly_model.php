<?php namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;

class Skoly_model
{
	
    protected $db;
    public function __construct(ConnectionInterface &$db){
        $this->db =& $db;
    }

    function getSchool()
    {
        $builder= $this->db->table('pocet_prijatych');
        $builder->select('
            skola_tab.nazev AS skola_nazev, 
            pocet, 
            pocet_prijatych.id AS prijati_id,
            skola_tab.id AS skola_id,
            skola_tab.mesto AS mesto_id,
            mesto_tab.nazev AS mesto_nazev,
            obor_tab.nazev AS obor_nazev,

            
        ');
        $builder->join('obor AS obor_tab', 'obor_tab.id = pocet_prijatych.obor');
        $builder->join('skola AS skola_tab', 'skola_tab.id = pocet_prijatych.skola');
        $builder->join('mesto AS mesto_tab', 'skola_tab.mesto  = mesto_tab.id');

       $builder->orderBy('skola_tab.nazev');
       //$builder->groupBy('skola_tab.id');


        $school =  $builder->get()->getResult();
        return $school;
    }

    function add($s, $m, $p, $o)
    {

        $pocet_prijatych = $this->db->table('pocet_prijatych');

        $pocet_prijatych->set('obor', $p);
        $pocet_prijatych->set('skola', $s);
        $pocet_prijatych->set('pocet', $o);
        $pocet_prijatych->set('rok', 2019);
        $pocet_prijatych->insert(); 
    }

    function getSchool_edit($id_school)
    {
        $builder= $this->db->table('pocet_prijatych');
        $builder->select('
            skola_tab.nazev AS skola_nazev, 
            pocet, 
            pocet_prijatych.id AS prijati_id,
            skola_tab.id AS skola_id,
            skola_tab.mesto AS mesto_id,
            mesto_tab.nazev AS mesto_nazev,
            obor_tab.id AS obor_id,

            
        ');
        $builder->join('obor AS obor_tab', 'obor_tab.id = pocet_prijatych.obor');
        $builder->join('skola AS skola_tab', 'skola_tab.id = pocet_prijatych.skola');
        $builder->join('mesto AS mesto_tab', 'skola_tab.mesto  = mesto_tab.id');
        
        $builder->where('pocet_prijatych.id', $id_school);



        $school =  $builder->get()->getResult();
        return $school;
    }

    function edit($id_school, $s, $m, $p, $o)
    {
        $pocet_prijatych = $this->db->table('pocet_prijatych');

        $pocet_prijatych->set('obor', $p);
        $pocet_prijatych->set('skola', $s);
        $pocet_prijatych->set('pocet', $o);
        $pocet_prijatych->set('rok', 2019);
        $pocet_prijatych->where('id', $id_school );
        $pocet_prijatych->update();  
    }
}