<?php
    class FactoryRobot {
        private $robot_types = []; 
        // Создаем метод:
        
        public function addType ($newRobots)
    {
      $this->robot_types[] = $newRobots;
                      //  var_dump($this->robot_types);  
      return $this->robot_types;
    }
        
      public function createRobot ($count_copies, $Robot) {
        $robot_copies = []; 
        for ($i = 1; $i <= $count_copies; $i++) {
             $robot_copies[]=$Robot;
        } 
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
        }  */
            // creation of massive
            // $massiv_of_robots = [];
            
         
        }
        
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
    
    
$factory = new FactoryRobot;

//$Robots = new Robot1(1,2,5);
      //  var_dump ($Robots); die();
 
$R1 = $factory->addType(new Robot1(null,null,null,null,)) ;
$R2 = $factory->addType(new Robot2(null,null,null,null,)) ;
   


$clone = $factory->createRobot(5,$R1);
var_dump($clone);


 /*
$factory->addType(new Robot1());
$factory->addType(new Robot2());

var_dump($factory->createRobot1(5));
var_dump($factory->createRobot2(2));

$mergeRobot = new MergeRobot();
$mergeRobot ->addRobot(new Robot2());
$mergeRobot ->addRobot($factory->createRobot2(2));
$factory->addType($mergeRobot );
$res = reset($factory->createMergeRobot(1));
echo $res->getSpeed();
$res->getWeight();
*/


    
?>