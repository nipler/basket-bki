<?php
if($items) {
    
    
    foreach($items as $item) { 
    
        echo $item['good']->title.'<br/>
            '.$item['count'].'<br/>
            '.$item['good']->price.'<br/>
            '.($item['good']->price*$item['count']).'<br/><br/><br/>';
    
    }
    

}

?>