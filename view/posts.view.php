
<?php for($i = 0; $i < sizeof($this->data); $i++){ ?>
        <h1><?php echo $this->data[$i]->title; ?></h1>
        <p><?php echo $this->data[$i]->content; ?></p>
    <?php }

?>