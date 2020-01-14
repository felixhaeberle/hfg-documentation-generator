<?php
    if(!isset($subchapters)) $subchapters = $pages->children()->listed();
    $nested = isset($nested) && $nested == true;
?>

<?php foreach($subchapters as $subchapter): ?>
    <section id="<?= str::slug($subchapter->id()) ?>" class="<?= $nested ? "row m-0 w-100" : "row"?>">
        <div class="col offset-md-1 offset-lg-2  offset-xl-2 mt-4">
            <h5><?= $subchapter->title()->html() ?></h5>
        </div>
        <div class="d-none d-lg-block col-lg-1 col-xl-3"><!-- PLACEHOLDER COLUMN --></div>
        <div class="w-100"><!-- PLACEHOLDER COLUMN --></div>
        <?= $subchapter->text()->kirbytext()->columnify() ?>
        <?php snippet("subchapters", array("subchapters" => $subchapter->children()->listed(), "nested" => true)) ?>
    </section>
<?php endforeach ?>