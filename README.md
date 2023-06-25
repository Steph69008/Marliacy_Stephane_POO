# Marliacy_Stephane_POO
Les méthodes magiques en PHP :
1/
    __construct(): C'est une méthode magique qui est automatiquement appelée lorsque vous créez un nouvel objet d'une classe. 
    Elle est généralement utilisée pour initialiser les propriétés de l'objet.

Exemple :

class MyClass {
    public function __construct() {
        echo "Un nouvel objet de MyClass a été créé.";
    }
}

2 /
 __get($variable): Cette méthode est automatiquement appelée lorsque vous essayez d'accéder à une propriété inexistante ou inaccessible (privée ou protégée) d'un objet.

class MyClass {
    private $* = "Hello, world!";

    public function __get($variable) {
        echo "Vous avez essayé d'accéder à $variable.";
    }
}

3/

    __set($property, $value): Cette méthode est automatiquement appelée lorsque vous essayez de définir une valeur pour une propriété inexistante ou inaccessible (privée ou protégée) d'un objet.


class MyClass {
    private $myProperty;

    public function __set($property, $value) {
        echo "Vous avez essayé de définir $property à $value.";
    }
}

4/

   __sleep(): Cette méthode est invoquée lorsque nous utilisons la fonction serialize() sur un objet. Elle est généralement utilisée pour nettoyer certains éléments de l'objet qui ne sont pas nécessaires à la sérialisation.

Exemple :

class MyClass {
    public $data1 = 'data1';
    public $data2 = 'data2';

    public function __sleep() {
        // Ici, nous décidons que seul 'data1' doit être sérialisé.
        return array('data1');
    }
}

5/
__toString(): Cette méthode est appelée lorsque nous essayons de convertir un objet en une chaîne de caractères. Si cette méthode n'est pas définie dans une classe et qu'une tentative est faite pour convertir un objet en chaîne, une erreur fatale sera générée.

Exemple :

php

class MyClass {
    public function __toString() {
        return "Ceci est un objet de MyClass.";
    }
}
