<?php
if (!isset($_SESSION["logged_user"])){
    header("Location:/");
}
$user_id = $_SESSION["logged_user"]["id"];
require_once "header.php";
require_once "navigation.php";
?>
<form action="/playlist/create" method="post">
    <table>
        <tr>
            <td><label for="title"><b>Title:</b></label></td>
            <td><input type="text" id="title" name="title" required></td>
        </tr>
        <tr>
        <input type="hidden" name="owner_id" value="<?= $user_id; ?>"
        </tr>
        <tr>
            <td><input type="submit" name="create" value="Create"></td>
        </tr>
    </table>
</form>
