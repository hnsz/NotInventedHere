<?php

return <<<EOT
<div class='blogPost'>
<h3>{$blogPost['title']} <span class='date'>{$blogPost['date']->format ('Y-m-d H:i:s')}</span>
<p>{$blogPost['story']}</p>
</div>
EOT;
