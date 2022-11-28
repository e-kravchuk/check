<?php require 'include/header.php' ?>

<?php if (empty($this->oArticle)): ?>
    <p class="error">The article can't be found!</p>
<?php else: ?>

    <article>
        <time datetime="<?=$this->oArticle->addDate?>" pubdate="pubdate"></time>

        <h1><?=htmlspecialchars($this->oArticle->title)?></h1>
        <p><?=nl2br(htmlspecialchars($this->oArticle->text))?></p>
        <p>Posted on <?=$this->oArticle->addDate?></p>
        <p>Added by <?=$this->oArticle->authorId?></p>
    </article>

<?php endif ?>

<?php require 'include/footer.php' ?>