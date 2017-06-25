<?php

namespace Acme\Domain;

class User extends Person
{

    private $maladie;

    private $city;

    private $medic;



    public function getMaladie() {

        return $this->maladie;

    }


    public function setMaladie($maladie) {

        $this->maladie = $maladie;

        return $this;

    }

    public function getTraitement() {

        return $this->traitement;

    }


    public function setTraitement($traitement) {

        $this->traitement = $traitement;

        return $this;

    }

    public function getMedic() {

        return $this->medic;

    }


    public function setMedic($medic) {

        $this->medic = $medic;

        return $this;

    }
	
}