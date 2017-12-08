<html>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <body>
    <?php 
    echo "test";
?>
    <br>
        
    <br>
    <div id="ddd">
        <p id="ccc">hoge</p>
        <br>
        <form style="float: left; background: red;">
            <input type="text" id="aaa" name="name" style="margin: 30px;">
            <div style="margin: 30px;">
            <div style=clear:both;></div>
            <input onclick="btnback()" type="button" value="◀" style="width: 30px; margin:10px;">
                
            <div style=clear:both;></div>
            <input onclick="btn(1)" type="button" value="1" style="width: 30px; margin:10px;">
            <input onclick="btn(2)" type="button" value="2" style="width: 30px; margin:10px;">
            <input onclick="btn(3)" type="button" value="3" style="width: 30px; margin:10px;">
            <input onclick="btnkei(1)" type="button" value="÷" style="width: 30px; margin:10px;">
                
            <div style=clear:both;></div>
            <input onclick="btn(4)" type="button" value="4" style="width: 30px; margin:10px;">
            <input onclick="btn(5)" type="button" value="5" style="width: 30px; margin:10px;">
            <input onclick="btn(6)" type="button" value="6" style="width: 30px; margin:10px;">
            <input onclick="btnkei(2)" type="button" value="×" style="width: 30px; margin:10px;">
                
            <div style=clear:both;></div>
            <input onclick="btn(7)" type="button" value="7" style="width: 30px; margin:10px;">
            <input onclick="btn(8)" type="button" value="8" style="width: 30px; margin:10px;">
            <input onclick="btn(9)" type="button" value="9" style="width: 30px; margin:10px;">
            <input onclick="btnkei(3)" type="button" value="-" style="width: 30px; margin:10px;">
                
            <div style=clear:both;></div>
            <input onclick="btn0()" type="button" value="0" style="width: 30px; margin:10px;">
            <input onclick="btn00()" type="button" value="00" style="width: 30px; margin:10px;">
            <input onclick="btnkei()" type="button" value="=" style="width: 30px; margin:10px;">
            <input onclick="btnkei(4)" type="button" value="+" style="width: 30px; margin:10px;">
            </div>
            
            
        </form>
        </div>
 

        <script>
            var num1,num2,flg;
            function btn(kazu) {
                document.getElementById("aaa").value = document.getElementById("aaa").value + kazu;
                }
            function btn0() {
                document.getElementById("aaa").value = document.getElementById("aaa").value * 10;
                }
            function btn00() {
                document.getElementById("aaa").value = document.getElementById("aaa").value * 100;
                }
            function btnback() {
                document.getElementById("aaa").value = Math.floor(document.getElementById("aaa").value / 10);
                }
            function btnkei(kei) {
                if(flg == !null){
                    if(num2 == 1){
                        document.getElementById("aaa").value = num1 / document.getElementById("aaa").value;
                        flg = null;
                    }
                    if(num2 == 2){
                        document.getElementById("aaa").value = num1 * document.getElementById("aaa").value;
                        flg = null;
                    }
                    if(num2 == 3){
                        document.getElementById("aaa").value = num1 - document.getElementById("aaa").value;
                        flg = null;
                    }
                    if(num2 == 4){
                        document.getElementById("aaa").value = parseInt(num1) + parseInt(document.getElementById("aaa").value);
                        flg = null;
                    }
                }else{
                    num1 = document.getElementById("aaa").value;
                    num2 = kei;
                    document.getElementById("aaa").value = null;
                    flg = 1;
                }
                
                }
        </script>
    </body>
</html>
