<?php
session_start();
if (!isset($_SESSION["user_id"])||!isset($_SESSION["name"]))
{
    echo "<script>
    var url_last = 'http://'+window.location.host+'/library/view/log_in.php';
    window.location.href = url_last;
</script>";
}
else{
    if ($_SESSION["type"]!=1)
    {
        echo "<script>
    alert('你不是管理员');
    var url_last = 'http://'+window.location.host+'/library/view/home_panel.php';
    window.location.href = url_last;
</script>";
    }
}
?>
<?php
define('IN_CB', true);
include('include/header.php');

registerImageKey('code', 'BCGisbn');

$characters = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
?>

<div id="validCharacters">
    <h3>Valid Characters</h3>
    <?php foreach ($characters as $character) {
    echo getButton($character);
} ?>
</div>

<div id="explanation">
    <h3>Explanation</h3>
    <ul>
        <li>ISBN stands for International Standard Book Number.</li>
        <li>ISBN type is based on EAN-13.</li>
        <li>Previously, all ISBN were in EAN-10 format. EAN-13 uses the same encoding but may contain different data in the ISBN number.</li>
        <li>Composed by a GS1 prefix (for ISBN-13), a group identifier, a publisher code, an item number and a check digit.</li>
    </ul>
</div>

<?php
include('include/footer.php');
?>