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

$default_value['checksum'] = '0';
$checksum = isset($_POST['checksum']) ? $_POST['checksum'] : $default_value['checksum'];
registerImageKey('checksum', $checksum);
registerImageKey('code', 'BCGmsi');

$characters = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
?>

<ul id="specificOptions">
    <li class="option">
        <div class="title">
            <label for="checksum">Checksum</label>
        </div>
        <div class="value">
            <?php echo getInputTextHtml('checksum', $checksum, array('type' => 'number', 'min' => 0, 'max' => 2)); ?>
        </div>
    </li>
</ul>

<div id="validCharacters">
    <h3>Valid Characters</h3>
    <?php foreach ($characters as $character) {
    echo getButton($character);
} ?>
</div>

<div id="explanation">
    <h3>Explanation</h3>
    <ul>
        <li>Developed by the MSI Data Corporation.</li>
        <li>Used primarily to mark retail shelves for inventory control.</li>
    </ul>
</div>

<?php
include('include/footer.php');
?>