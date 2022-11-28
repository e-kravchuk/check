<?php require 'include/header.php' ?>

<?php if (empty($this->oArticles)): ?>
    <p>There is no Articles.</p>
<?php else: ?>

    <?php foreach ($this->oArticles as $oArticle): ?>
        <h1><a href="<?=ROOT_URL?>?p=blog&amp;a=article&amp;id=<?=$oArticle->id?>"><?=htmlspecialchars($oArticle->title)?></a></h1>

        <p><?=nl2br(htmlspecialchars(mb_strimwidth($oArticle->text, 0, 100, '...')))?></p>
        <p><a href="<?=ROOT_URL?>?p=blog&amp;a=article&amp;id=<?=$oArticle->id?>">Want to see more?</a></p>
        <p>Posted on <?=$oArticle->addDate?></p>
        <p>Added by <?=$this->oArticle->authorId?></p>

        <hr class="clear" /><br />
    <?php endforeach ?>

<?php endif ?>

<?php require 'include/footer.php' ?>