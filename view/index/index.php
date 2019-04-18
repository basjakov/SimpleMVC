<?php
/**
 * Created by PhpStorm.
 * User: arman.antonyan
 * Date: 12/04/2019
 * Time: 16:45
 */
?>
<h1>Home page </h1>

<?php foreach ($news as $new):?>
        <h3><?php echo $new['title'];?></h3>
        <p><?php echo $new['text'];?></p>
        </hr>
<?php endforeach; ?>