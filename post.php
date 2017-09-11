<?php
while (list($n,$v) = each($_POST)) {
    $$n=$v;
}
?>