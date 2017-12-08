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
        <form style="float: left">
            <input type="text" id="aaa" name="name" style="margin: 30px;">
            <input onclick="hoge()" type="button" value="送信">
        </form>
        <form>
            <input type="text" id="bbb" name="name" style="margin: 30px;">
            <input onclick="xxx()" type="button" value="送信">
        </form>
        </div>
 
<script>
    function xxx() {
        document.getElementById("aaa").value = document.getElementById("bbb").value;
    
    }
    function hoge() {
        var sampleNode=document.getElementById("ccc");
        sampleNode.innerHTML="ぷぎゃー";
        
        var divNode = document.getElementById("ddd");
        var greet = document.createElement('p'),
                text = document.createTextNode('Hello world');
        greet.appendChild(text);
        divNode.insertBefore(greet,sampleNode);
            //var em = document.body.appendChild(greet).appendChild(text);
        
         var testNode=document.getElementById("ddd");
        testNode.style.backgroundColor="#ff0000";
        
        if (document.getElementById('aaa').value == "" )
                alert('JavaScriptのアラート');
}
</script>
        
    </body>
</html>

