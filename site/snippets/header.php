<!doctype html>
<html lang="<?= site()->language() ? site()->language()->code() : "en" ?>">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title><?= $pages->parent()->title() ?> | <?= $pages->title()?></title>
    <meta name="description" content="<?= $site->description() ?>">

    <!-- CSS -->
    <!-- highlight.js -->
    <?= css("assets/vendor/highlightjs/styles/monokai-sublime.css") ?>
    <!-- Custom template css and index.css -->
    <?= css("assets/css/index.css") ?>

</head>
<body>

    <header role="banner">
        <?php snippet("navbar") ?>
    </header>
