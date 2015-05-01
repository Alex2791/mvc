<style>
    table, th, td {
        border: 1px solid black;
        font-size: 12px;

    }
</style>
<html>
<form action="/admin/actform/" method="POST">
    <?php echo $data['table']?>
    <input type="submit" name="act" value="Delete" />
    <input type="submit" name="act" value="Edit" />
    <input type="submit" name="act" value="Create" />

    <?php if(isset($_POST["act"]) and ($_POST["act"]=="Create") ) { ?>

        </p>title:	 <input type="text" name="title" value=""></input>
        </p>content:</p> <textarea rows="10" cols="45" name="content"></textarea>

        </p><input type="submit" name="create" value="apply"/>

    <?php } ?>

    <?php if(isset($_POST["act"]) and ($_POST["act"]=="Edit") ) { echo($data['fields']);}?>

</form>
<a href="/news/">Посмотреть все новости</a>
</html>
