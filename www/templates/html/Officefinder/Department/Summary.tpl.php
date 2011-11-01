<?php
$userCanEdit = false;
if ($context->options['view'] != 'alphalisting') {
    $userCanEdit = $context->userCanEdit(UNL_Officefinder::getUser());
}
?>
<div class="departmentInfo">
    <?php
    $image_url = 'http://maps.unl.edu/images/building/icon_md.png';
    if (!empty($context->building)) {
        $bldgs = new UNL_Common_Building();
        if ($bldgs->buildingExists($context->building)) {
            $image_url = 'http://maps.unl.edu/building/'.urlencode($context->building).'/image/1/md';
        }
    }
    ?>
    <div class="vcard office">
        <?php 
        	if (!empty($context->org_unit)) {
                echo ' <span class="unl-hr-org-unit-number"><span>Org. Unit Number</span>'.$context->org_unit.'</span>';
            }
        ?>
        <img alt="Building Image" src="<?php echo $image_url; ?>" width="100" height="100" class="frame photo">
        <h4 class="fn org">
            <?php
            	echo $context->name;
            ?>
            <a class="permalink" href="<?php echo $context->getURL();?>">link</a>
        </h4>
        <div class="vcardInfo">
            <div class="adr label">
                <span class="type">Address</span>
                <span class="room"><?php echo $context->room.' <a class="location mapurl" href="http://maps.unl.edu/#'.$context->building.'" onclick="WDN.jQuery.colorbox({href:\'http://maps.unl.edu/'.$context->building.'?format=staticgooglemapsv2&size=400x400&zoom=17\', width:\'460px\', height:\'490px\'});return false;">'.$context->building.'</a>'; ?></span>
                <?php
                if (!empty($context->address)) {
                    echo "<span class='street-address'>" . $context->address . "</span>";
                }
                if (!empty($context->city)) {
                    echo "<span class='locality'>" . $context->city . "</span>";
                }
                if (!empty($context->state)) {
                    echo "<span class='region'>" . $context->state . "</span>";
                }
                if (!empty($context->postal_code)) {
                    echo "<span class='postal-code'>" . $context->postal_code . "</span>";
                }
                ?>
                <span class='country-name'>USA</span>
            </div>
            
            <?php if (isset($context->phone)): ?>
            <div class="tel">
                <span class="voice">Phone:
                    <?php
                    echo $savvy->render($context->phone, 'Peoplefinder/Record/TelephoneNumber.tpl.php');
                    ?>
                </span>
            </div>
            <?php endif; ?>
            <?php if (isset($context->fax)): ?>
            <div class="tel">
                <span class="fax">Fax:
                    <?php
                    echo $savvy->render($context->fax, 'Peoplefinder/Record/TelephoneNumber.tpl.php');
                    ?>
                </span>
            </div>
            <?php endif; ?>
            
            
            <?php if (isset($context->email)): ?>
            <div class="email">
                <span class="email">
                   <a class="email" href="mailto:<?php echo $context->email; ?>"><?php echo $context->email; ?></a>
                </span>
            </div>
            <?php endif; ?>
            <?php if (isset($context->website)): ?>
            <div class="url">
                <span class="url">
                   <a class="url" href="<?php echo $context->website; ?>"><?php echo $context->website; ?></a>
                </span>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>