<html>
    <script>
        let fontSize=1;
        function zoomIn(){
            fontSize += 0.1;
            document.body.style.fontSize=fontSize+ "em";
        }
        function zoomOut(){
            fontSize -= 0.1;
            document.body.style.fontSize=fontSize+ "em";
        }
    </script>
    <center>
        <input type="button" value="++" onClick="zoomIn()"/>
        <input type="button" value="--" onClick="zoomOut()"/>
    </center>
</html>