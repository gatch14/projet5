<?php

namespace Acme\Domain;

class DailyData
{

	private $id;
	private $user_id;
	private $daily_date;
	private $physical_form;
	private $physical_form_desc;
	private $psycho_form;
	private $psycho_form_desc;
	private $pain;
	private $pain_desc;
    private $temperature;
    private $weather;
	private $symptom;
    private $symptom_desc;
	private $other_city;
	private $lunch;
	private $other;

    public function getId() {

        return $this->id;

    }


    public function setId($id) {

        $this->id = $id;

        return $this;

    }

    public function getUser_id() {

        return $this->user_id;

    }


    public function setUser_id($user_id) {

        $this->user_id = $user_id;

        return $this;

    }

    public function getDaily_date() {

        return $this->daily_date;

    }


    public function setDaily_date($daily_date) {

        $this->daily_date = $daily_date;

        return $this;

    }

    public function getPhysical_form() {

        return $this->physical_form;

    }


    public function setPhysical_form($physical_form) {

        $this->physical_form = $physical_form;

        return $this;

    }

    public function getPhysical_form_desc() {

        return $this->physical_form_desc;

    }


    public function setPhysical_form_desc($physical_form_desc) {

        $this->physical_form_desc = $physical_form_desc;

        return $this;

    }

    public function getPsycho_form() {

        return $this->psycho_form;

    }


    public function setPsycho_form($psycho_form) {

        $this->psycho_form = $psycho_form;

        return $this;

    }

    public function getPsycho_form_desc() {

        return $this->psycho_form_desc;

    }


    public function setPsycho_form_desc($psycho_form_desc) {

        $this->psycho_form_desc = $psycho_form_desc;

        return $this;

    }

    public function getPain() {

        return $this->pain;

    }


    public function setPain($pain) {

        $this->pain = $pain;

        return $this;

    }

    public function getPain_desc() {

        return $this->pain_desc;

    }


    public function setPain_desc($pain_desc) {

        $this->pain_desc = $pain_desc;

        return $this;

    }

    public function getTemperature() {

        return $this->temperature;

    }


    public function setTemperature($temperature) {

        $this->temperature = $temperature;

        return $this;

    }

    public function getWeather() {

        return $this->weather;

    }


    public function setWeather($weather) {

        $this->weather = $weather;

        return $this;

    }

    public function getSymptom() {

        return $this->symptom;

    }


    public function setSymptom($symptom) {

        $this->symptom = $symptom;

        return $this;

    }

    public function getSymptom_desc() {

        return $this->symptom_desc;

    }


    public function setSymptom_desc($symptom_desc) {

        $this->symptom_desc = $symptom_desc;

        return $this;

    }

    public function getOther_city() {

        return $this->other_city;

    }


    public function setOther_city($other_city) {

        $this->other_city = $other_city;

        return $this;

    }

    public function getLunch() {

        return $this->lunch;

    }


    public function setLunch($lunch) {

        $this->lunch = $lunch;

        return $this;

    }

    public function getOther() {

        return $this->other;

    }


    public function setOther($other) {

        $this->other = $other;

        return $this;

    }
}