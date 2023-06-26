import './bootstrap';
import * as bootstrap from 'bootstrap';
window.bootstrap = bootstrap;

// importing core styling file for fontawesome
import "/vendor/fontawesome/scss/fontawesome.scss";

import "/vendor/fontawesome/scss/solid.scss";
import "/vendor/fontawesome/scss/brands.scss";

// vapor for connecting to s3
window.Vapor = require('laravel-vapor');