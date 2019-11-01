<?php
/*--------------- 1st WAY-------------------------*/

class Php{
	function showName($name){
		echo $name;
	}
}

class Php2 extends Php{
	function showSubject(){
		echo '<br>My Subject : Computer Science';
	}
}
class Php3 extends Php2{
	function showCar(){
		echo '<br>My Car : COOPER';
	}
}

$obj = new Php3();
echo $obj->showName('Debendra');
$obj->showSubject();
$obj->showCar();
echo "<br><br>";
unset($obj);

/*--------------- 2nd WAY-------------------------*/

class Base {
    public function sayHello() {
        echo 'Hello ';
    }
}

trait SayWorld {
    public function hello() {
        parent::sayHello(); //get parent class method
        echo 'World!';
    }
}

class MyHelloWorld extends Base {
    use SayWorld;
}

$obj = new MyHelloWorld();
$obj->hello();

echo "<br><br>";
/******---------------------- 3rd Way ---------------------------*********/

trait A {
    public function smallC() {
        echo 'a';
    }
    public function bigC() {
        echo 'A';
    }
}

trait B {
    public function smallC() {
        echo 'b';
    }
    public function bigC() {
        echo 'B';
    }
}

class Talker {
    use A, B {
        B::smallC insteadof A;
        A::bigC insteadof B;
    }
}

class Aliased_Talker {
    use A, B {
        B::smallC insteadof A;
        A::bigC insteadof B;
        B::bigC as CC;
    }
}

$ob = new Aliased_Talker();
$ob->CC();