<?php $errors=array();?>

<?php if(count($errors) > 0) : ?>
    <div class="error">
        <?php foreach($server as $errors): ?>
            <p><?php echo $error ?></p>
        <?php endforeach?>
    </div>

<?php endif ?>