<html>
    <head>
        <style>
             .polotno {
             font-size: 14px;
             line-height: 14px;
             letter-spacing:3px;
   }
  </style>
    </head>
    <body>
 <div class="polotno">
 
 
 <?php

 Class krug 
 {
   public $x;
   public $y;
   public $z;
   public $n;  //будет хранить колл-во символов "X" в строке
   public $er; //массив ошибок
   
  
   
   function __construct()
   {
      $this->x=$_GET['x']; 
      $this->y=$_GET['y'];
      $this->z=$_GET['z'];
   
   }
   
   
   public function ifint($a) //проверка на целое положительное
   {
        if((!intval($a) || ($a < 1) || (!preg_match('/^\+?\d+$/', $a))))
            {
                return false; 
            }
        else
            {
                 return true; 
            }  
   }

   public function show(array $m)   //проверяем соответствие условиям  параметров
   {
        if(!(($this->x>0) && ($this->x<=10) && ($this->ifint($this->x))))
         $this->er['x']="значение X"; 
        
        if(!(($this->y>0) && ($this->y<=10) && ($this->ifint($this->y))))
         $this->er['y']='значение Y';
        
        if(!(($this->z>0) && ($this->z<=3) && ($this->ifint($this->z))))
         $this->er['z']='значение Z'; 
                    
                           
    if(isset($this->er))    // если ошибки имеются выводим их
        {
            echo "<p>Не верно введены следующие параметры: </p>";
            foreach ($this->er as $key)
                echo $key."</br>";

        }
        
        else   //если полученные данные соответсвуют условиям то 
        { //формируем массив
            $this->n=4*$this->z+1;  //кол-во символов в самой длинной строке;
            $this->y=$this->y+$this->z; //начальная координата+ смещение y
            $this->x=$this->x+2*$this->z; //начальная координата+ смещение x
            
            
            for($sh=0;$sh<=$this->z;++$sh)  //шаг равен радиусу+1 = количество строк с символами
            {       if ($sh) $this->n=$this->n-2;
                    $xs=$this->x-($this->n-1)/2; //смещение на первый символ 
                    $j=0;              
                for($i=$this->n;$i>0;--$i) //колличество символов в строке
                    {   
                        if($sh==0)  $m[$this->y][$xs+$j]='&Chi;';
                                
                        else
                            {
                              $m[$this->y-$sh][$xs+$j]='&Chi;';
                              $m[$this->y+$sh][$xs+$j]='&Chi;';
                            }
                        $j++; 
                    }
                    
            } 
         for($i=0;$i<19;$i++)      //вывод массива
            {       
                for($j=0;$j<25;$j++)
                    echo  $m[$i][$j]; 
                    echo "</br>";   
            }    
        }
   }
 }       
     
        
 //конец описания класса    
     
       $m=array(); //создаем массив строк
        for($i=0;$i<19;$i++)
            {   $m[$i]=array(); //создаем массив столбцов
                for($j=0;$j<25;$j++)
                    {
                        $m[$i][$j]='&#8722;';  //заполняем массив "пустыми" символами
                    }
                   
            } 
            
  $c =  new krug;
      $c->show($m);
    
 ?>
 </div>
    </body>
</html>





