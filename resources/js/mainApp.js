import "./bootstrap";
import "./plugins";
import Vue from "vue";
import vuexI18n from "vuex-i18n";
import moment from "moment";


window.moment = moment;
window.Vue = Vue;

// for working with subfolder
window.axios.defaults.baseURL = window.localStorage.getItem('base_url') !=="" ? window.localStorage.getItem('base_url') : window.location.origin;


window.axios.interceptors.response.use(
    function(response) {
        return response;
    },
    function(error) {
        const code = error.response.status;
        if (401 === code) {
            swal(error.response, code === 401);
        }
        // if (403 === code) {
        //     app.$toastr.e(error.response.data.message);
        //   }
        if (419 === code) {
            app.$toastr.e(error.response.data.message);
        }
        if (424 === code) {
            app.$toastr.e(error.response.data.message);
        }
        if (code > 499) {
            app.$toastr.e(error.response.data.message);
        } else {
            return Promise.reject(error);
        }
    }
);

function swal(response, showConfirm = true) {
    Swal.fire({
        title: "Error!!",
        text: response.data.message,
        showCancelButton: true,
        showConfirmButton: showConfirm,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Login",
        imageWidth: 100,
        imageHeight: 70,
        imageAlt: "Error",
    }).then(function(response) {
        if (!response.dismiss) {
            window.location.replace(window.location.origin + "/admin/users/login");
        }
    });
}

