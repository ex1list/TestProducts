<?php

    class FactoryRobot {
        private $robot_types = []; 
        // method for added robot type 
        public function addType ($newRobots) {
            $this->robot_types[] = $newRobots;
            //var_dump($this->robot_types);  
            return $this->robot_types;
        }    
        public function createRobot ($count_copies, $Robot) {
            $robot_copies = []; 
            for ($i = 1; $i <= $count_copies; $i++) {
                $robot_copies[]=$Robot;
            } 
            //return array of objects
            return $robot_copies;
        }        
    }
    
    // class union of robots 
    
    class  MergeRobot {  
        public $merge_weight = 0;
        public $merge_height = 0;
        public $merge_velocity = 0;   
        public function addRobot  ($Robot) {  
            $this->merge_weight+= $Robot->weight;
            $this->merge_height+= $Robot->height;
            if ($this->merge_velocity == 0 ) {
                $this->merge_velocity = $Robot->velocity;
            } elseif ($Robot->velocity < $this->merge_velocity) {
                $this->merge_velocity = $Robot->velocity;  
            } 
        }
        public function getWeight() {  
            return "merge_weight: ".$this->merge_weight." ";
        }   
        public function getHeight() {  
            return "merge_height: ".$this->merge_height." ";
        } 
        public function getSpeed() {  
            return "merge_Speed: ".$this->merge_velocity." ";
        }                
    }          
        
    // create first robot  
    class Robot1 {
        public $weight = null;
        public $height = null;
        public $velocity = null;     
        function __construct($w,$h,$v) {
            $this-> weight = $w;
            $this->height = $h;
            $this->velocity = $v;     
        }    
    }
    // create second robot    
    class Robot2 {
        public $weight = null;
        public $height = null;
        public $velocity = null;
        function __construct($w,$h,$v) {
            $this-> weight = $w;
            $this->height = $h;
            $this->velocity = $v;     
        }     
    }   
    // Instance of class factory     
    $factory = new FactoryRobot;
    $R1 = $factory->addType(new Robot1(1,2,3)) ;
    // var_dump($R1); die();
    $R2 = $factory->addType(new Robot2(2,1,0)) ;
    // var_dump($R2); die();
    // cloning object of robot
    $clone = $factory->createRobot(5,$R1);
    // var_dump($clone);die();
    $mergeRobot = new MergeRobot();
    // start union different robots without cloning
    $mergeRobot->addRobot(new Robot2(2,1,23));
    $mergeRobot->addRobot(new Robot2(3,8,11));
    $mergeRobot->addRobot(new Robot2(4,1,15));
    $mergeRobot->addRobot(new Robot2(5,2,120));
    $mergeRobot->addRobot(new Robot2(4,3,25));
    //minimum speed of all robots 
    echo $mergeRobot->getSpeed();
    //the sum of all masses of robots 
    echo $mergeRobot->getWeight();
    //the sum of all masses of robots 
    echo $mergeRobot->getHeight();
    // added new type robot
    $factory->addType($mergeRobot );
    // add to union robots create with clonning
    //var_dump($mergeRobot->addRobot($factory->createRobot(5,$R2)));
    // array pointer to its first element 
    //$res = reset($factory->createMergeRobot(1));

?>