<?php

require_once('url.php');
require_once('chara.php');
require_once('sink.php');
require_once('escape.php');
require_once('measurament.php');

$contents = file('index.php');
$strings = implode('', $contents);
$tokens = token_get_all($strings);

echo '<pre>';
foreach ($tokens as $token) {
    if ($token[0] === T_INLINE_HTML) {
        $strings = $token[1];
        for ($i = 0; $i < strlen($strings); $i++) {
            if ($strings[$i] === '<') {
                if (strpos($strings, '<script>', $i) === $i) {
                    $begin = strpos($strings, '<script>', $i);
                    $end = strpos($strings, '</script>', $i);
                    $raw_script = substr($strings, $begin, $end-$begin + strlen('</script>'));
                    $script = trim(substr($raw_script, strlen('<script>'), strlen($raw_script) - strlen('</script>')));

                    for ($i = 0; $i < strlen($script); $i++) {
                    	var_dump($script[$i]);
                    }
                }
            }
        }

    }
}
echo '</pre>';