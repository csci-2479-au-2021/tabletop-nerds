<?php 
namespace App\classes;

class WishListGame {

public string $name;
public string $description;
public string $image;
public float $price;

function __construct(string $name, string $description, string $image, float $price ) {
    $this->name= $name;
    $this->description = $description;
    $this->image = $image;
    $this->price = $price;
  }



}