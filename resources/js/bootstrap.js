/**
 * This bootstrap file is used for both frontend and core
 */
import _ from "lodash";
import axios from "axios";
import Swal from "sweetalert2";
import $ from "jquery";
import "popper.js"; // Required for BS4
import "bootstrap";

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */
window.$ = window.jQuery = $;
window.Swal = Swal;
window._ = _;   // lodash

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";
if (document.querySelector('meta[name="csrf-token"]')) {
    window.axios.defaults.headers.common["X-CSRF-TOKEN"] = document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content");
}
