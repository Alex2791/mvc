<h1>Новости</h1>
<p>
Ты хотел новостей, их есть у меня.
<br />
<br />
<br />

<?php

$article=$data->fetch_assoc();
echo '<h1>'.$article['name'].'</h1>';
echo $article['content'];
?>

</p>

