<?php

namespace App\Models;

use JsonSerializable;

class Pokemon implements JsonSerializable
{
    private $id;
    private $name;
    private $url;
    private $frontImage;
    private $backImage;
    private $types;
    private $height;
    private $weight;
    private $abilities;

    public function __construct($name, $url)
    {
        $this->name = ucwords(str_replace('-', ' ', $name));
        $this->url = $url;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function setUrl($url)
    {
        $this->url = $url;
    }

    public function getFrontImage()
    {
        return $this->frontImage;
    }

    public function setFrontImage($frontImage)
    {
        $this->frontImage = $frontImage;
    }

    public function getBackImage()
    {
        return $this->backImage;
    }

    public function setBackImage($backImage)
    {
        $this->backImage = $backImage;
    }

    public function getTypes()
    {
        return $this->types;
    }

    public function setTypes($types)
    {
        $this->types = $types;
    }

    public function getHeight()
    {
        return $this->height;
    }

    public function setHeight($height)
    {
        $this->height = $height;
    }

    public function getWeight()
    {
        return $this->weight;
    }

    public function setWeight($weight)
    {
        $this->weight = $weight;
    }

    public function getAbilities()
    {
        return $this->abilities;
    }

    public function setAbilities($abilities)
    {
        $this->abilities = $abilities;
    }

    public function jsonSerialize()
    {
        $vars = get_object_vars($this);

        return $vars;
    }
}
