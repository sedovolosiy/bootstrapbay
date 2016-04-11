<div class="form-group">
    <div class="row">
        <?php foreach ($models as $model): ?>
            <?php $images = $model->getImages(); ?>
            <?php foreach ($images as $img): ?>
                <p><img src="<?= $img->getUrl('x100') ?>" alt=""></p>

            <?php endforeach ?>

        <?php endforeach ?>
    </div>
</div>