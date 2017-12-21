<?php
/**
 * Created by PhpStorm.
 * User: Eloïse
 * Date: 18/12/2017
 * Time: 13:55
 */

// Je crée ma classe
class Reservation
{
    // Je crée mes attributs
    private $date;
    private $ville;
    private $cp;
    private $description;
    private $valide;
    private $publie;
    private $photo_couverture;

    public function __construct()
    {
        $this->date = new DateTime();

    }


    public function getdate()
    {
        $this->date->format('d-m-Y');
        return $this->date;
    }



    public function getville()
    {
        return $this->ville;
    }

    public function getcp()
    {
        return $this->cp;
    }

    public function getdescription()
    {
        return $this->description;
    }

    public function getvalide()
    {
        return $this->valide;
    }

    public function getpublie()
    {
        return $this->publie;
    }

    public function getphoto_couverture()
    {
        return $this->photo_couverture;
    }

}