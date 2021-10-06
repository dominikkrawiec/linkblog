
<?php foreach($this->data as $key => $post){ ?>
    <h1>
        <a href="<?php echo $post->link; ?>">
            <?php echo $post->title; ?>
        </a>

        <a href="<?php echo $post->uri; ?>">*</a>
    </h1>
        <p><?php echo $post->content; ?></p>
<?php } ?>