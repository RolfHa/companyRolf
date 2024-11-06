<!--JavaScript at end of body for optimized loading-->
<!--<script type="text/javascript" src="js/materialize.min.js"></script>-->
<script>
    console.log(document.querySelector('.message').innerHTML);
    if(document.querySelector('.message').innerHTML !== ''){
        document.querySelector('.message').style.visibility="visible";
    } else {
        document.querySelector('.message').style.visibility="hidden";
    }
</script>
</body>
</html>