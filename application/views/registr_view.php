<html>
<?php
if(!$data["success"])
{?>
    <form method="post" action="/registr/reg">
        <h3>Для того войти зарегистрируйтесь</h3>
        ФИО:
        </p><input type="text" name="fio" value=""></input></p>
        Логин:
        </p><input type="text" name="login" value=""></input></p>
        Пароль:
        </p><input type="text" name="password" value=""></input></p>
        <button>ok</button>
    </form>
    <?php if($data["error"]){
        echo "<p class='has-error'>".$data["error"]."</p>";
        }
    ?>
    <h3>Если вы уже зарегистрированы перейдите по ссылке <a href="/registr/enter">ссылка</a></h3>
<?php
}
else { ?>
    <h3 class="has-success">Вы успешно зарегистрировались! Перейдите по ссылке для входа <a href="/registr/enter">ссылка</a></h3>
<?php } ?>

</html>
