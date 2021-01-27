<?php
    class FactoryRobot {
        private $robot_types = []; 
        // method for added robot type 
        public function addType ($newRobots) {
            $this->robot_types[] = $newRobots;
            //  var_dump($this->robot_types);  
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
       /* 
        public function addType($a) {            
            $Class_robot = $a[0];
            $Class_robot  = new FactoryRobot;
            $Class_robot->type = $a[0];
            $Class_robot-> weight = $a[1];
            $Class_robot->height = $a[2];
            $Class_robot->velocity = $a[3];          
            return $Class_robot;           
        }  
      */          
    }
// class union of robots 
    class  MergeRobot {  
        public $merge_weight = null;
        public $merge_height = null;
        public $merge_velocity = null;   
        public function addRobot  ($w,$h,$v) {
            $robot_merge= []; 
            if(isset($merge_weight) or isset($merge_height) or isset($merge_velocity)) { 
                $merge_weight+=  $w;
                $merge_height+= $h;
                if ($v>$merge_velocity) {
                    $merge_velocity =  $v;  
                }        
            }
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
//$Robots = new Robot1(1,2,5);
//  var_dump ($Robots); die();
$R1 = $factory->addType(new Robot1(null,null,null)) ;
$R2 = $factory->addType(new Robot2(null,null,null)) ;
$clone = $factory->createRobot(5,$R1);
//var_dump($clone);
$mergeRobot = new MergeRobot();
// start union different robots without cloning
$mergeRobot->addRobot(new Robot2(1,2,3,4));
$mergeRobot->addRobot(new Robot2(1,4,6,8));
$mergeRobot->addRobot(new Robot2(1,9,2,1));
$mergeRobot->addRobot(new Robot2(1,4,5,2));
// add to union robots create with clonning
$mergeRobot->addRobot($factory->createRobot(5,$R2));
// added new type 
$factory->addType($mergeRobot );
// array pointer to its first element 
$res = reset($factory->createMergeRobot(1));
//minimum speed of all robots 
echo $res->getSpeed();
//the sum of all masses of robots 
$res->getWeight();
  
?>