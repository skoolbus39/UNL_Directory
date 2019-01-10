<form method="get" id="peoplefinder" action="<?php echo UNL_Peoplefinder::getURL(); ?>" class="directory-search dcf-d-flex dcf-jc-center">
    <?php if (isset($context->options['chooser'])): ?>
        <input type="hidden" name="chooser" value="true" />
    <?php endif; ?>

    <?php
    $default = '';
    if (isset($context->options['q']) && !($context->options['q'] instanceof ArrayAccess)) {
        $default = htmlentities((string)$context->options['q'], ENT_QUOTES);
    }
    ?>
    <div class="dcf-input-group dcf-measure">
        <input class="dcf-input-text" tabindex="0" type="text" autofocus placeholder="Herbie Husker" value="<?php echo $default; ?>" id="q" name="q" aria-label="Enter a name to begin your search" />
        <button name="submitbutton" type="submit" value="Search" class="button dcf-btn dcf-btn-primary"><span class="wdn-icon-search" aria-hidden="true"></span><span class="dcf-sr-only">Search</span></button>
    </div>
</form>

<?php echo $savvy->render((object) [
    'id' => 'noticeTemplate',
    'template' => 'Search/NoticeTemplate.tpl.php',
], 'jsrender.tpl.php') ?>

<?php echo $savvy->render((object) [
    'id' => 'genericErrorTemplate',
    'template' => 'Search/GenericErrorTemplate.tpl.php',
], 'jsrender.tpl.php') ?>

<?php echo $savvy->render((object) [
    'id' => 'queryLengthTemplate',
    'template' => 'Search/QueryLengthTemplate.tpl.php',
], 'jsrender.tpl.php') ?>
