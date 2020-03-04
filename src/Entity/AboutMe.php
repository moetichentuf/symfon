<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AboutMeRepository")
 */
class AboutMe
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $name = "unknown";

    public function showName(): string
    {
        return $this->name;

    }
    public function typedName(): string
    {
        if(isset($_POST['name'])){
            $_SESSION['TheName']=$_POST['name'];
           $this->name= $_POST['name'];
        }
        elseif (isset($_SESSION['TheName'])){

            $this->name=$_SESSION['TheName'];
        }
    else{

        $this->name= $this->showName();
    }

        return $this->name;
    }
}
