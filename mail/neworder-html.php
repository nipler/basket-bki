<?php

use yii\helpers\Html;

?>
<?php
if($items) {
    
    echo '<table width="100%" border="1"><tr><th></th><th>Наименование</th><th>Количество</th><th>Стоимость</th><th>Сумма</th></tr>';
    foreach($items as $item) { 
    
        echo '<tr>
            <td align="center"><img src="/images/goods/'.$item['good']->goodImages[0]->file.'" height="200"></td>
            <td>'.$item['good']->title.'</td>
            <td>'.$item['count'].'</td>
            <td>'.$item['good']->price.' руб.</td>
            <td>'.($item['good']->price*$item['count']).' руб.</td>
        </tr>';
    
    }
    
    echo '</table>';

}

?>