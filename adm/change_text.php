<?
function show_form(){
    require 'config.php';
    $result = mysql_query("SELECT * FROM pages WHERE id = '".$_GET['id']."';", $link);
    $row = mysql_fetch_array($result);
    ?>
    <head>
        <title>�������</title>
    </head>
    <body>
    <form action="" method="post">
        <table cellspacing="1" cellpadding="2" bgcolor="#d3d3d3">
            <tr bgcolor="#d3d3d3">
                <td><p>����� �����</p></td>
            </tr>
            <tr bgcolor="#d3d3d3">
                <td>
            <textarea name="body" rows="20" cols="59" class="enter">
                <?=stripslashes($row['body']);?>
            </textarea>
            <tr>
                <td bgcolor="#d3d3d3" align="right">
                    <input type="hidden" name="id" value="<?=$_GET['id'];?>">
                    <input type="submit" value="���������" name="edit">
                    <input type="submit" value="��������" name="clear">
                </td>
            </tr>
        </table>
    </form>
    </body>
    <?php
}

function clear() {
    require 'config.php';
    $result = mysql_query("SELECT * FROM pages WHERE id = '".$_POST['id']."';", $link);
    $row = mysql_fetch_array($result);
    if(($row['id']))
        $query = "UPDATE pages SET body = '' WHERE id = '".$_POST['id']."';";
    mysql_query($query, $link);
    echo '<h3>���� ������</h3>';
}

function complete(){
    require 'config.php';
    $result = mysql_query("SELECT * FROM pages WHERE id = '".$_POST['id']."';", $link);
    $row = mysql_fetch_array($result);
    if(($row['id']))
        $query = "UPDATE pages SET body = '".mysql_real_escape_string($_POST['body'])."' WHERE id = '".$_POST['id']."';";
    mysql_query($query, $link);
    echo '<h3>����� ��������</h3>';
}
function show_pages() {
    require 'config.php';
    echo '
<table cellspacing="1" cellpadding="2" bgcolor="#1F2760">
<tr bgcolor="#d3d3d3">
  <td>
     <b>����� �����</b>
  </td>
</tr>
<tr bgcolor="#ffffff">
  <td>
     <a href="?id=1">1</a>
  </td>
</tr>
<tr bgcolor="#ffffff">
  <td>
     <a href="?id=2">2</a>
  </td>
</tr>
<tr bgcolor="#ffffff">
  <td>
     <a href="?id=3">3</a>
  </td>
</tr>
<tr bgcolor="#ffffff">
  <td>
     <a href="?id=4">4</a>
  </td>
</tr>
</table>';
}

if($_POST['clear']) clear();    //�������� ��������� ����
if($_POST['edit']) complete();  //��������� ��������� ����
if($_GET['id']) show_form();    //�������� ����� ��������������
else show_pages();  //�������� �������
?>