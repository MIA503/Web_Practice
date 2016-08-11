</div>
<script>
window.addEventListener('load',function(){
    window.setTimeout(function(){
        window.clearTimeout(this.timeoutID);
        delete this.timeoutID;
        location.href='timeout.php';
    },2*60*1000);
},false);
</script>
</body>
</html>
