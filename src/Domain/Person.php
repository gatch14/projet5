<?php

namespace Acme\Domain;

class Person
{
	private $id;

    private $pseudo;

	private $email;

	private $password;

    private $role;

    private $token;

    private $name;

    private $nickname;

    private $birthday;

    private $city;

    private $sexe;

    private $active;



    public function getId() {

        return $this->id;

    }


    public function setId($id) {

        $this->id = $id;

        return $this;

    }

    public function getPseudo() {

        return $this->pseudo;

    }


    public function setPseudo($pseudo) {

        $this->pseudo = $pseudo;

        return $this;

    }

    public function getEmail() {

        return $this->email;

    }


    public function setEmail($email) {

        $this->email = $email;

        return $this;

    }

    public function getPassword() {

        return $this->password;

    }


    public function setPassword($password) {

        $this->password = $password;

        return $this;

    }

    public function getRole() {

        return $this->role;

    }


    public function setRole($role) {

        $this->role = $role;

        return $this;

    }

    public function getToken() {

        return $this->token;

    }


    public function setToken($token) {

        $this->token = $token;

        return $this;

    }

    public function getName() {

        return $this->name;

    }


    public function setName($name) {

        $this->name = $name;

        return $this;

    }

    public function getNickname() {

        return $this->nickname;

    }


    public function setNickname($nickname) {

        $this->nickname = $nickname;

        return $this;

    }

    public function getCity() {

        return $this->city;

    }


    public function setCity($city) {

        $this->city = $city;

        return $this;

    }

    public function getSexe() {

        return $this->sexe;

    }


    public function setSexe($sexe) {

        $this->sexe = $sexe;

        return $this;

    }

    public function getBirthday() {

        return $this->birthday;

    }


    public function setBirthday($day, $month, $year) {

        $this->day = $day;
        $this->month = $month;
        $this->year = $year;
        $this->birthday = $year.'-0'.$month.'-0'.$day;

        return $this;

    }

    public function getActive() {

        return $this->active;

    }


    public function setActive($active) {

        $this->active = $active;

        return $this;

    }
}

