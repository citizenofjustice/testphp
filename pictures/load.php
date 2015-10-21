<?
function form_show() {
    require ('connect.php');
?>
<body>
    <img width="160" height="160" src="<?
        $result = mysql_query("SELECT file_name FROM pic_table WHERE id = '".$_GET['pic']."';", $link);
        $row = mysql_fetch_array($result);
        if (!empty($row['file_name']))
            echo '../pictures/'; echo $row['file_name'];
    ?>">
    <form action="" method="post" enctype="multipart/form-data">
        <table bgcolor="#d3d3d3">
            <tr>
                <td>
                    <input type="hidden" name="pic" value="<?=$_GET['pic'];?>" />
                    <input name="some_file" type="file" />
                    <input name="load" type="submit" value="Загрузить" />
                    <input name="delete" type="submit" value="Удалить" />
                </td>
            </tr>
        </table>
    </form>
</body>
<?
}

function del() {
    require ('connect.php');
    $result = mysql_query("SELECT * FROM pic_table WHERE id = '".$_POST['pic']."';", $link);
    $row = mysql_fetch_array($result);
    $pic_dir = '../pictures/';
    $file_name = $row['file_name'];
    $pic_path = "$pic_dir$file_name";
    if($row['id'])
        unlink($pic_path);
        $query = "UPDATE pic_table SET file_name = '' WHERE id = '".$_POST['pic']."';";
        //$query = "DELETE FROM pic_table WHERE id = '".$_POST['pic']."';";
    mysql_query($query, $link);
}

function show_pictures() {
    echo '
    <table cellspacing="1" cellpadding="2" bgcolor="#1F2760">
        <tr bgcolor="#d3d3d3">
            <td>
                <b>Заменить картинку</b>
            </td>
        </tr>
        <tr bgcolor="#ffffff">
            <td>
                <a href="?pic=1">1</a>
            </td>
        </tr>
        <tr bgcolor="#ffffff">
            <td>
                <a href="?pic=2">2</a>
            </td>
        </tr>
        <tr bgcolor="#ffffff">
            <td>
                <a href="?pic=3">3</a>
            </td>
        </tr>
    </table>';
}

function load_picture() {
    $apend = date('YmdHis').rand(100,1000).'.';
    $ext = substr($_FILES['some_file']['name'], 1 + strrpos($_FILES['some_file']['name'], "."));
    $filename = "$apend$ext";
    $pic_path = "../pictures/$filename";
    $valid_types = array("jpg", "png");
    require ('connect.php');
    if (isset($_FILES["some_file"]))
    {
        if(is_uploaded_file($_FILES["some_file"]["tmp_name"]))
        {
            if (!in_array($ext, $valid_types))
            {
                echo 'Неверный тип файла';
            }
            else
            {
                if (move_uploaded_file($_FILES["some_file"]["tmp_name"], $pic_path)) {
                    $result = mysql_query("SELECT * FROM pic_table WHERE id = '".$_POST['pic']."';", $link);
                    $row = mysql_fetch_array($result);
                    if (empty($row['id']))
                        $query = "INSERT INTO pic_table (file_name) VALUES ('$filename')";
                    else
                        $query = "UPDATE pic_table SET file_name = '$filename' WHERE id = '".$_POST['pic']."'";
                    mysql_query($query, $link);
                }
                else {
                    echo 'Ошибка: загрузка не удалась';
                }
            }
        }
    }
}

if($_POST['load']) load_picture();  //функция загрузки
if($_POST['delete']) del();    //функция удаления
if($_GET['pic']) form_show();   //показать форму
else show_pictures(); // показать таблицы
?>