<?php if($_SESSION['user']['role']==2){?>
<p><a class="btn btn-danger" href='/admin/viewtable'>Редактировать</a></p>
<?php } ?>
<h1>Новости</h1>
<p>
Все совпадения новостей с реальными событиями случайны.
<br />

<?php
echo $data;
?>
</p>
