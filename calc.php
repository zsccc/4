<?php  
if(isset($argv) AND count($argv) <= 2) {
    $argv[1] = str_replace("?", '', $argv[1]);
    $params = explode('&', $argv[1]);
    $_REQUEST = array();
    foreach($params as $p) {
        //get the location of the '='
        $eq_loc = strpos($p, '=');
        $_REQUEST[substr($p, 0, $eq_loc)] = substr($p, $eq_loc + 1, strlen($p) - $eq_loc);
    }
    $_GET = $_REQUEST;
    $_POST = $_REQUEST;
}





    if (isset($_POST['sub'])){  
        echo "用户点击提交按钮，提交计算请求<br>";  
  
        if (!is_numeric($_POST['num1']) || !is_numeric($_POST['num2'])){  
            $isDo = false;  
            echo "其中一个运算元不是数字，不进行运算<br>";  
        }else{  
            $isDo = true;  
        }  
  
        $sum = "";  
  
        if ($isDo){
            switch ($_POST['ysf']){  
                case '+':  
                    $sum = $_POST['num1'] + $_POST['num2'];  
                    break;  
                case '-':  
                    $sum = $_POST['num1'] - $_POST['num2'];  
                    break;  
                case '*':  
                    $sum = $_POST['num1'] * $_POST['num2'];  
                    break;  
                case '/':  
                    $sum = $_POST['num1'] / $_POST['num2'];  
                    break;  
                case '%':  
                    $sum = $_POST['num1'] % $_POST['num2'];  
                    break;  
            }  
            echo $sum."<br>";  
        }  
    }else{  
        echo "用户刷新页面<br>";  
    }  
?>  
  
<html lang="en">  
<head>  
    <meta charset="UTF-8">  
    <title>简易计算器</title>  
</head>  
<body>  
<!--table 表格-->  
<!--border=1，表格周围的边框设置为1像素宽-->  
<!--width=400，表格宽度为400像素宽-->  
<!--align=center，表格水平对齐方式为居中对齐内容-->  
<!--caption 定义表格标题-->  
<!--<h1> 定义最大的标题。<h6> 定义最小的标题。-->  
<!--<tr> 标签定义 HTML 表格中的行。包含一个或多个th或td元素。-->  
<!--ysf 运算符的首字母。-->  
<!--colspan 规定单元格可横跨的列数。-->  
<table border="1" width="400" align="center">  
    <form action="calc.php" method="post">  
        <caption><h1>简易计算器</h1></caption>  
        <caption><h4>iwanghang</h4></caption>  
        <tr>  
            <!--第一个运算元-->  
<!--            <td><input type="text" size="5" name="num1" value=""></td>-->  
            <td><input type="text" size="5" name="num1" value="<?php  
                if (isset($_POST['sub'])){echo $_POST['num1'];} ?>"></td>  
            <!--运算符-->  
            <td>  
                <select name="ysf">  
<!--                    <option value="+"> + </option>-->  
<!--                    <option value="-"> - </option>-->  
<!--                    <option value="*"> * </option>-->  
<!--                    <option value="/"> / </option>-->  
<!--                    <option value="%"> % </option>-->  
                    <option <?php if (isset($_POST['sub'])){  
                        if ($_POST['ysf']=="+") echo "selected";} ?> value="+"> + </option>  
                    <option <?php if (isset($_POST['sub'])){  
                        if ($_POST['ysf']=="-") echo "selected";} ?> value="-"> - </option>  
                    <option <?php if (isset($_POST['sub'])){  
                        if ($_POST['ysf']=="*") echo "selected";} ?> value="*"> * </option>  
                    <option <?php if (isset($_POST['sub'])){  
                        if ($_POST['ysf']=="/") echo "selected";} ?> value="/"> / </option>  
                    <option <?php if (isset($_POST['sub'])){  
                        if ($_POST['ysf']=="%") echo "selected";} ?> value="%"> % </option>  
                </select>  
            </td>  
            <!--第二个运算元-->  
<!--            <td><input type="text" size="5" name="num2" value=""></td>-->  
            <td><input type="text" size="5" name="num2" value="<?php  
                if (isset($_POST['sub'])){echo $_POST['num2'];} ?>"></td>  
            <!--提交-->  
            <td><input type="submit" name="sub" value="等于"></td>  
        </tr>  
        <tr>  
            <td colspan="4">  
                <?php  
                    if (isset($_POST['sub'])){  
                        echo "计算结果：{$_POST['num1']}{$_POST['ysf']}{$_POST['num2']} = {$sum}";  
                    }  
                ?>  
            </td>  
        </tr>  
    </form>  
</table>  
</body>  
</html>  

