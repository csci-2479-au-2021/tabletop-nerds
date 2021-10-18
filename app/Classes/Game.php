<?php 
namespace App\classes;

class Game {

public string $name;
public string $description;
public string $image;


function __construct(string $name, string $description, string $image) {
    $this->name= $name;
    $this->description = $description;
    $this->image = $image;
    
  }



}