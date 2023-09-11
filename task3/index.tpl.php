<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="public/assets/css/style.css">
    <title>Комментарии</title>
</head>
<body>
<section class="comments">
    <div class="container">
        <?php foreach ($comments AS $comment): ?>
            <div class="comments__block">
                <div class="comments__title">
                    <div class="comments__name"><?=h($comment['name'])?></div>
                    <div class="comments__date""><?=$comment['date']?></div>
                </div>
                <div class="comments__text"><?=h($comment['message'])?></div>
            </div>
        <?php endforeach; ?>

        <form class="comments__form border border-dark" method="post" error-atr="<?= isset($errors) ?? null ?>">
            <div class="mb-3">
                <label for="name" class="form-label">Напишите комментарий</label>
                <input name="name" type="text" class="form-control" id="name" value="<?=old('name') ?>" placeholder="Введите имя">
                <?php if(isset($errors['name'])):?>
                    <div class="invalid-feedback d-block" >
                        <?= $errors['name'] ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="mb-3">
                <textarea name="message" class="form-control" id="message" rows="3" placeholder="Введите текст"><?=old('message') ?></textarea>
            </div>
            <?php if(isset($errors['message'])):?>
                <div class="invalid-feedback d-block mb-2" >
                    <?= $errors['message'] ?>
                </div>
            <?php endif; ?>
            <button type="submit" class="btn btn-secondary mt-0 comments__btn">Отправить</button>
        </form>
    </div>
</section>
</body>
</html>