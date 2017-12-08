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
            
                
            <div style=clear:both;></div>
            <input onclick="btn(4)" type="button" value="4" style="width: 30px; margin:10px;">
            <input onclick="btn(5)" type="button" value="5" style="width: 30px; margin:10px;">
            <input onclick="btn(6)" type="button" value="6" style="width: 30px; margin:10px;">
            
                
            <div style=clear:both;></div>
            <input onclick="btn(7)" type="button" value="7" style="width: 30px; margin:10px;">
            <input onclick="btn(8)" type="button" value="8" style="width: 30px; margin:10px;">
            <input onclick="btn(9)" type="button" value="9" style="width: 30px; margin:10px;">
            
                
            <div style=clear:both;></div>
            
            <input onclick="btn(0)" type="button" value="0" style="width: 30px; margin:10px;">
            <div style=clear:both;></div>
            <input onclick="al()" type="button" value="ダイヤル" style="width: 100px; margin:10px;">
            </div>
        </form>
        </div>
        <script>
            function btn(num){
                document.getElementById("aaa").value = document.getElementById("aaa").value + String(num);
            }
            function al(){
                var tx = document.getElementById("aaa").value;
                alert(tx + 'へ繋げます');
            }
        </script>
    </body>
</html>