<?php

namespace Acme\Domain;

class Medic extends Person
{

    private $speciality;



    public function getSpeciality() {

        return $this->speciality;

    }


    public function setSpeciality($speciality) {

        $this->speciality = $speciality;

        return $this;

    }
	
}