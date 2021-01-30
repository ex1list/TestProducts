<?php

    interface Robots {
        public function getVelocity(): float;
        public function getWeight(): float;
        public function getHeight(): float;
    }

    class RobotProperties implements Robots {
        public $velocity;
        public $height;
        public $weight;
        public function __construct(float $velocity, float $weight, float $height) {
            $this->velocity=$velocity;
            $this->weight = $weight;
            $this->height = $height;     
        }
        public function getVelocity(): float {
            return $this->velocity;
        }
        public function getWeight(): float {
            return $this->weight;
        }
        public function getHeight(): float {
            return $this->height;
        }
    }
    
    class  MergeRobot {  
        public $merge_weight = null;
        public $merge_height = null;
        public $merge_velocity = null;   
        
        public function addRobot  ($Robot) {
            // var_dump($Robot); die();
            foreach ($Robot as $InstanceRobot) { 
                // var_dump($InstanceRobot); die();
                $this->merge_weight+= $InstanceRobot->weight;
                $this->merge_height+= $InstanceRobot->height;
                if ($this->merge_velocity == 0 ) {
                    $this->merge_velocity = $InstanceRobot->velocity;
                } elseif ($InstanceRobot->velocity < $this->merge_velocity) {
                     $this->merge_velocity = $InstanceRobot->velocity;  
                    } 
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
        
    class FactoryRobot {
        
        public static function addType ($velocity,$weight, $height): RobotProperties {
            return new RobotProperties ($velocity,$weight, $height);
        }
            
        public static function createRobot1 ($countcopies,$Robot1) {
            // var_dump($Robot1->velocity); die();
            $robot_copies = []; 
            if ($countcopies == 1) {
                 return $Robot1;
            } else {
                for ($i = 1; $i <= $countcopies; $i++) {             
                    $Robot1->velocity +=rand(1, 5);
                    $Robot1->weight +=rand(1, 5);
                    $Robot1->height +=rand(1, 5);           
                    $robot_copies[]=$Robot1;
                    // var_dump($robot_copies);
                }  
            }
            //return array of objects
            return $robot_copies;
        }
        
        public static function createRobot2 ($countcopies,$Robot2) {
            // var_dump($Robot2->velocity); die();
            $robot_copies = []; 
            if ($countcopies ==1) {
                 return $Robot2;
            } else {
                for ($i = 1; $i <= $countcopies; $i++) {             
                    $Robot2->velocity +=rand(1,5);
                    $Robot2->weight +=rand(1,5);
                    $Robot2->height +=rand(1,5);           
                    $robot_copies[]=$Robot2;
                    var_dump($robot_copies);
                }  
            }
            //return array of objects
            return $robot_copies;
        }      
        
    }  
           
    //Добавления типа Robot1 роботов которые создает фабрика
    
    $Robot1 = FactoryRobot::addType (500,100, 200);
    echo 'Velocity: ' . $Robot1->getVelocity();
    echo 'Height: ' . $Robot1->getWeight();
    echo 'Weight: ' . $Robot1->getHeight();
    
    // Массив из 5 объектов разных роботов первого типа
    
    $ArrayRobot1 = FactoryRobot::createRobot1 (5,$Robot1);
    
    //Добавления типа Robot2 роботов которые создает фабрика
    
    $Robot2 = FactoryRobot::addType (250,111, 320);
    echo 'Velocity: '. $Robot2->getVelocity();
    echo 'Height: ' . $Robot2->getWeight();
    echo 'Weight: ' . $Robot2->getHeight();
    
    // Массив из 2 объектов разных роботов второго типа
    
    $ArrayRobot2 = FactoryRobot::createRobot2 (2,$Robot2); 
    
    // Объединение роботов в один
    
    $mergeRobot1 = new MergeRobot();
    
    // start union different robots without cloning
    
    $mergeRobot1->addRobot($Robot2); 
    
    //minimum speed of all robots 
    
    echo $mergeRobot->getSpeed();
    
    //the sum of all masses of robots 
    
    echo $mergeRobot->getWeight();
    
    //the sum of all masses of robots 
    
    echo $mergeRobot->getHeight();
    
    // added new type robot
    
    $factory->addType($mergeRobot1);
    
    // array pointer to its first element 
    
    $res = reset($factory->createMergeRobot(1));
    
    //echo $res->getSpeed();