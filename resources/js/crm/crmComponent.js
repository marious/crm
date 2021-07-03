import Vue from "vue";

Vue.component("app-auth-login", require("./Component/Views/Auth/Login").default);

Vue.component(
    "app-submit-button-loader",
    require("./Component/Helpers/SubmitButtonLoader/Loader").default
);

Vue.component(
    "app-top-navbar",
    require("./Component/Views/Includes/TopNavbar").default
);
