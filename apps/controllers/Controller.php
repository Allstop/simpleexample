<?php
class Controller{
function show(){
$Model = new Model();//選取合適的模型
$data = $Model->get();//獲取相應的數據
$View = new View();//選擇相應的視圖
$View->display($data);//展示給用戶
}
}
?>
