<form id="form-logout" style="display:none" method="POST" action="../login/processa_login.php">
    <input type="hidden" name="acao" value="logout" />
</form>
<script>
    document.querySelector("#form-logout").submit();
</script>