<html>
<head>
<title>Upload Form</title>
</head>
<body>

<?php echo $error;?>

<?php echo form_open_multipart('acao/do_upload');?>

<input type="file" name="imagem" size="20" />

<br /><br />

<input type="submit" value="upload" />

</form>

</body>
</html>