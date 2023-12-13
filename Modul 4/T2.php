<?php

namespace MyNamespace;

// Trait
trait GreetTrait {
    public function greet() {
        return "Hello, ";
    }
}

// Abstract class
abstract class Animal {
    protected $name;
    protected $sound;

    // Abstract method
    abstract public function makeSound();

    public function setName($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }
}

// Class yang mewarisi dari abstract class dan menggunakan trait
class Dog extends Animal {
    use GreetTrait;

    public function __construct($name) {
        $this->name = $name;
        $this->sound = "GukGuk";
    }

    // Implementasi abstract method
    public function makeSound() {
        return $this->sound;
    }

    // Magic method
    public function __toString() {
        return $this->greet() . $this->name . "! I'm a Dog. I say " . $this->makeSound();
    }
}

// Class lain yang mewarisi dari abstract class
class Cat extends Animal {
    public function __construct($name) {
        $this->name = $name;
        $this->sound = "Meow";
    }

    // Implementasi abstract methodgm
    public function makeSound() {
        return $this->sound;
    }

    // Magic method
    public function __toString() {
        return "Meow! I'm a Cat named " . $this->name . ". I say " . $this->makeSound();
    }
}

// Contoh penggunaan
$dog = new Dog("Buddy");
echo $dog . "\n";

$cat = new Cat("Whiskers");
echo $cat . "\n";
