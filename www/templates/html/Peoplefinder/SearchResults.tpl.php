<?php


$start    = 0;
$num_rows = UNL_PF_DISPLAY_LIMIT;

if (($start+$num_rows)>count($context)) {
    $end = count($context);
} else {
    $end = $start+$num_rows;
}

echo "<div class='result_head'>Results ".($start+1)." - $end out of ".count($context).'</div>'.PHP_EOL;
echo '<ul class="pfResult">'.PHP_EOL; //I need to put a class for CSS, however when we switch to chuncked results (student, staff, faculty) this @todo will need revisted
for ($i = $start; $i<$end; $i++) {
    $even_odd = ($i % 2) ? '' : 'alt';
    if ($context[$i]->ou == 'org') {
        $class = 'org_Sresult';
    } else {
        $class = 'ppl_Sresult';
    }
    $class .= ' '.$context[$i]->eduPersonPrimaryAffiliation;
    echo '<li class="'.$class.' '.$even_odd.'">'.PHP_EOL;
    echo '    <div class="overflow">'.PHP_EOL;
    echo $savvy->render($context[$i], 'Peoplefinder/RecordInList.tpl.php');
    echo '    </div>'.PHP_EOL;
    echo '</li>'.PHP_EOL;
}
echo '</ul>'.PHP_EOL;

if (count($context) >= UNL_Peoplefinder::$resultLimit) {
    echo "<p>Your search could only return a subset of the results. ";
    if (isset($context->options['adv'])
        && $context->options['adv'] != 'y') {
        echo "Would you like to <a href='".UNL_Peoplefinder::getURL()."?adv=y' title='Click here to perform a detailed Peoplefinder search'>try a Detailed Search?</a>\n";
    } else {
        echo 'Try refining your search.';
    }
    echo '</p>';
}

?>