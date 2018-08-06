<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 31.07.2018
 * Time: 11:05
 */

?>

<?php
require_once "Task.php";
    $task = new Task();
?>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="edit.js"></script>
<?php
//$task = new Task();
    $alltasks = $task->showtask();
    //Используя цикл, выведите в браузер все сообщения
    if(count ($alltasks)>0){
    foreach($alltasks as $row){
    $id=$row['id'];
    $header=$row['header'];
    $body=$row['body'];
    $status = $row['status'];
    $users = $row['username'];
    @$dt=date("d-m-Y H:i:s", $row['tim']*1);
    ?>

    <div class="blok" id="list">
        <p class="user"><?php echo $users ?></p> <p class="data"><?php echo @$dt ?></p>
        <div class="quote-icon">
            <div class="icon-img" style="background-color: #ff3333"></div>
        </div>
        <div class="quote-content">
            <p class="droid"><strong id="head"><?php echo $header ?></strong><br> <strong id="body"><?php echo $body ?></strong></p>
            <br>
            <?php if($status == 1){?>
                <input class="btn" type="button" id="1" value=New>
                <?php
            }
            ?>
            <?php if($status == 2){?>
                <input  class="btn" type="button" id="2" value=Active>
                <?php
            }
            ?>
            <?php if($status == 3){?>
                <input s class="btn" type="button" id="3" value=Done>
                <?php
            }
            ?>
        </div>


        <i id=del name="<?php echo $id ?>" class="material-icons">delete</i> <i id=upd name="<?php echo $id ?>" class="material-icons">edit</i>


    </div>
    <div class="clear"></div>
        <?php
    }
}
?>

