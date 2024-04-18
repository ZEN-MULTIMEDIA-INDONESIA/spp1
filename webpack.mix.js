let mix = require("laravel-mix");

mix.copy(
    "node_modules/jquery/dist/jquery.min.js",
    "public/jquery/jquery.min.js"
)
    .copy(
        "node_modules/datatables.net-dt/js/dataTables.dataTables.min.js",
        "public/js/dataTables.dataTables.min.js"
    )
    .copy(
        "node_modules/datatables.net-dt/css/dataTables.dataTables.min.css",
        "public/css/dataTables.dataTables.min.css"
    )
    .copy(
        "node_modules/parsleyjs/dist/parsley.min.js",
        "public/js/parsley.min.js"
    )
    .copy(
        "node_modules/sweetalert2/dist/sweetalert2.min.js",
        "public/js/sweetalert2.min.js"
    )
    .copy(
        "node_modules/sweetalert2/dist/sweetalert2.all.js",
        "public/js/sweetalert2.all.js"
    );
