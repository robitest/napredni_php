<?php

use Core\Database;

if (isset($_GET['id'])) {
    $db = Database::get();
    
    $sql = 'SELECT * from posudba WHERE id = :id';
    
    $rental = $db->query($sql, [
        'id' => $_GET['id']
        ])->find();
        
    if (empty($rental)) {
        abort();
    }
    // dd($rental);
    require base_path('views/rentals/show.view.php');
} else {
    abort();
}


// $sql = "SELECT p.*,
//             CASE 
//                 WHEN p.datum_povrata IS NULL THEN DATEDIFF(NOW(), p.datum_posudbe)
//                 ELSE ......
//             END AS total_days,
//             .....
//             .....
//             .....
//             ROUND(cj. zakasnina_po_danu * m.koeficijent, 2) AS late_fee
//         from posudba p 
//             JOIN .....
//         WHERE p.id = :pid AND k.id = :kid";


// $rental['late_days'] = $rental['total_days'] <= 0 ? 0 : $rental['total_days'] - 1;
// $rental['late_fee_total'] = ...
// $rental['late_fee_formatted'] = ...
// $rental['total_price'] = formatPrice($rental['price'] + $rental['late_fee_total']);
// $rental['price'] = ...
// $rental['late_fee'] = ...