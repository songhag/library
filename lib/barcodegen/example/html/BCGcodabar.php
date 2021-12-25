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

registerImageKey('code', 'BCGcodabar');

$characters = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '-', '$', ':', '/', '.', '+', 'A', 'B', 'C', 'D');
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
        <li>Known also as Ames Code, NW-7, Monarch, 2 of 7, Rationalized Codabar.</li>
        <li>Codabar was developed in 1972 by Pitney Bowes, Inc.</li>
        <li>This symbology is useful to encode digital information. It is a self-checking code, there is no check digit.</li>
        <li>Codabar is used by blood bank, photo labs, library, FedEx...</li>
        <li>Coding can be with an unspecified length composed by numbers, plus and minus sign, colon, slash, dot, dollar.</li>
    </ul>
</div>

<?php
include('include/footer.php');
?>