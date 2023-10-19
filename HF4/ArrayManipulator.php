<?php
class ArrayManipulator {
    private $data = [];

    // __get magic metódus
    public function __get($key) {
        if (isset($this->data[$key])) {
            return $this->data[$key];
        } else {
            return null;
        }
    }

    // __set magic metódus
    public function __set($key, $value) {
        $this->data[$key] = $value;
    }

    // __isset magic metódus
    public function __isset($key) {
        return isset($this->data[$key]);
    }

    // __unset magic metódus
    public function __unset($key) {
        if (isset($this->data[$key])) {
            unset($this->data[$key]);
        }
    }

    // __toString magic metódus
    public function __toString() {
        return json_encode($this->data);
    }

    // __clone magic metódus
    public function __clone() {
        $this->data = array_map(function($item) {
            if (is_object($item) && method_exists($item, '__clone')) {
                return clone $item;
            } else {
                return $item;
            }
        }, $this->data);
    }
}

// Tesztelés

$obj = new ArrayManipulator();
$obj->foo = 'bar';
$obj->number = 42;
echo $obj->foo . "\n"; 
echo $obj->number . "\n"; 

var_dump(isset($obj->foo)); 
var_dump(isset($obj->nonexistent)); /

unset($obj->foo);
var_dump(isset($obj->foo)); 

$obj->data = ['alma', 'banan', 'cseresznye'];
echo $obj . "\n"; 

$clone = clone $obj;
$obj->data[0] = 'updated';
echo $clone->data[0] . "\n"; 
