<h1 style="text-align: center;"> Hoc lap trinh laravel</h1>
<?php
if (env('APP_ENV') == 'production') {
    echo "Call api live";
} else {
    echo "Call api sanbox";
}
?>