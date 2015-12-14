<?php
exec("/var/www/www/tuhaotest.hustonline.net/update.sh", $output,$result);
echo "<meta charset='utf-8'>";
echo "更新";
print_r($output);
print_r($result);
?>