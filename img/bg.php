<?php
header('Content-Type:image/svg+xml');
$color="#000";
if(isset($_GET['color'])){
$color='#'.$_GET['color'];
}

echo '<svg xmlns="http://www.w3.org/2000/svg" fill="'.$color.'" viewBox="0 0 14.3 281"><circle cx="3.3" cy="133.2" r="1.7"/><circle cx="3.3" cy="147.1" r="1.7"/><circle cx="3.3" cy="161.4" r="1.6"/><circle cx="3.3" cy="175.8" r="1.4"/><circle cx="3.3" cy="190.2" r="1.3"/><circle cx="3.3" cy="204.7" r="1.1"/><circle cx="3.3" cy="219" r="1"/><circle cx="3.3" cy="233.5" r=".8"/><circle cx="3.3" cy="247.9" r=".7"/><circle cx="3.3" cy="262.3" r=".7"/><circle cx="3.3" cy="276.6" r=".6"/><g><circle cx="3.3" cy="118.9" r="1.6"/><circle cx="3.3" cy="104.5" r="1.4"/><circle cx="3.3" cy="90.1" r="1.3"/><circle cx="3.3" cy="75.7" r="1.1"/><circle cx="3.3" cy="61.3" r="1"/><circle cx="3.3" cy="46.9" r=".8"/><circle cx="3.3" cy="32.5" r=".7"/><circle cx="3.3" cy="18" r=".7"/><circle cx="3.3" cy="3.7" r=".6"/></g><g><circle cx="10.7" cy="125.8" r="1.6"/><circle cx="10.7" cy="111.5" r="1.4"/><circle cx="10.7" cy="97" r="1.3"/><circle cx="10.7" cy="82.6" r="1.1"/><circle cx="10.7" cy="68.2" r="1"/><circle cx="10.7" cy="53.8" r=".8"/><circle cx="10.7" cy="39.4" r=".7"/><circle cx="10.7" cy="24.9" r=".7"/><circle cx="10.7" cy="10.6" r=".6"/></g><g><circle cx="10.7" cy="154.2" r="1.6"/><circle cx="10.7" cy="140.1" r="1.6"/><circle cx="10.7" cy="168.5" r="1.4"/><circle cx="10.7" cy="183" r="1.3"/><circle cx="10.7" cy="197.4" r="1.1"/><circle cx="10.7" cy="211.8" r="1"/><circle cx="10.7" cy="226.2" r=".8"/><circle cx="10.7" cy="240.6" r=".7"/><circle cx="10.7" cy="255.1" r=".7"/><circle cx="10.7" cy="269.4" r=".6"/></g></svg>';

?>