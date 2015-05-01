<html>
    <?php if(!$_SESSION['user']){?>
    <form method="post" action="/registr/enter">
        <h3>Войти</h3>
        Логин:
        </p><input type="text" name="login" value=""></input></p>
        Пароль:
        </p><input type="text" name="password" value=""></input></p>
        <button>войти</button>
    </form>
       <?php if($data["error"]){
           echo "<p class='has-error'>".$data["error"]."</p>";
       } ?>
   <?php }
           else { ?>
               <h3 class="has-success">Приветствую Вас! Перейдите по ссылке для выхода <a href="/registr/exit">ссылка</a></h3>
           <?php } ?>

</html>

