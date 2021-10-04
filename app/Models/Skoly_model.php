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
        $builder->select('*');
        $builder->join('obor', 'obor.id = pocet_prijatych.obor');
        $builder->join('skola', 'skola.id = pocet_prijatych.skola');
       // $builder->join('skola', 'skola.id = pocet_prijatych.obor');


        $films =  $builder->get()->getResult();
        return $films;
    }

    function add($s, $m, $p, $o)
    {

        $pocet_prijatych = $this->db->table('pocet_prijatych');

        $pocet_prijatych->set('obor', $o);
        $pocet_prijatych->set('skola', $s);
        $pocet_prijatych->set('pocet', $p);
        $pocet_prijatych->set('rok', 2019);
        $pocet_prijatych->insert(); 
    }

    function getSchool_edit($id_school)
    {
        $builder= $this->db->table('pocet_prijatych');
        $builder->select('*');
        $builder->join('obor', 'obor.id = pocet_prijatych.obor');
        $builder->join('skola', 'skola.id = pocet_prijatych.skola');
        $builder->where('pocet_prijatych.id', $id_school);
       // $builder->join('skola', 'skola.id = pocet_prijatych.obor');


        $films =  $builder->get()->getResult();
        return $films;
    }
}