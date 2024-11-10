<?php
// Simple Router
$uri = rtrim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

if ($uri === '') {

    require_once 'app/views/main.php'; // Default main page

} elseif ($uri === '/Services') {

    require_once 'app/views/services.php';

}elseif ($uri === '/amenities') {

    require_once 'app/views/amenities.php';

} elseif ($uri === '/AboutUs') {

    require_once 'app/views/aboutus.php';

} elseif ($uri === '/promo') {

    require_once 'app/views/promo.php';

} elseif ($uri === '/signin') {

    require_once 'app/views/login.php';

}  elseif ($uri === '/signup') {

    require_once 'app/views/signup.php';

} elseif ($uri === '/adminInquiries') {

    require_once 'app/views/admin/adminInquiries.php';

} elseif ($uri === '/adminInquiries/Amacan') {

    require_once 'app/views/admin/adminamacan.php';

} elseif ($uri === '/adminInquiries/Vrhouse') {

    require_once 'app/views/admin/adminvrhouse.php';
    
} elseif ($uri === '/adminInquiries/AmacananVrhouse') {

    require_once 'app/views/admin/adminamacanvr.php';
    
} elseif ($uri === '/dashboard') {

    require_once(__DIR__ . '/app/views/admin/dashboard.php');
    
} elseif ($uri === '/AddAppointment') {

    require_once 'app/views/admin/adminaddappointment.php';

} elseif ($uri === '/AcceptedInquiries') {

    require_once 'app/views/admin/adminaccepted.php';

} elseif ($uri === '/DeclinedInquiries') {

    require_once 'app/views/admin/admindecline.php';

} elseif ($uri === '/logout') {

    require_once(__DIR__ . '/app/views/admin/logout.php');
    
} elseif ($uri === '/room') {

    require_once(__DIR__ . '/app/views/room.php');
    
}  elseif ($uri === '/amacan') {

    require_once(__DIR__ . '/app/views/amacanbook.php');
    
} elseif ($uri === '/amacanbooking') {

    require_once(__DIR__ . '/app/views/amacanprocessbooking.php');
    
} elseif ($uri === '/vrhouse') {

    require_once(__DIR__ . '/app/views/vrhousebook.php');
    
} elseif ($uri === '/vrhousebooking') {

    require_once(__DIR__ . '/app/views/vrhousenprocessbooking.php');
    
} elseif ($uri === '/confirm') {

    require_once(__DIR__ . '/app/views/confirm.php');
    
} else {
    http_response_code(404);
    echo "404 Not Found";
}
