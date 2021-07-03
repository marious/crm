<template>
    <nav
        class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row"
    >
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
            <a href class="align-self-center d-lg-none pl-0 navbar-brand">
                <img
                    :src="`${configData ? configData : '/images/core.png'}`"
                    alt="logo"
                />
            </a>
            <button
                class="navbar-toggler align-self-center d-none d-lg-block pl-0"
                type="button"
            >
        <span
            v-if="leftMenuType === 'normal'"
            :key="'align-left'"
            @click.prevent="togglingLeftMenu('active-icon-only-menu')"
        >
          <app-icon :name="'align-left'" />
        </span>
                <span
                    v-else-if="leftMenuType === 'icon-only'"
                    :key="'align-center'"
                    @click.prevent="togglingLeftMenu('active-floating-menu')"
                >
          <app-icon :name="'align-center'" />
        </span>
                <span
                    v-else-if="leftMenuType === 'floating'"
                    :key="'align-justify'"
                    @click.prevent="togglingLeftMenu('active-normal-menu')"
                >
          <app-icon :name="'align-justify'" />
        </span>
            </button>
            <button
                class="navbar-toggler align-self-center d-lg-none pl-0"
                type="button"
                data-toggle="offcanvas"
                @click="sidebarOffcanvas"
            >
                <app-icon :name="'align-left'" />
            </button>

            <ul class="navbar-nav navbar-nav-right ml-auto">
                <li class="nav-item">
                    <button
                        class="navbar-toggler align-self-center pl-0"
                        type="button"
                        @click.prevent="toggleDarkMode"
                    >
            <span v-if="darkMode" :key="'sun'">
              <app-icon :name="'sun'" />
            </span>
                        <span v-else :key="'moon'">
              <app-icon :name="'moon'" />
            </span>
                    </button>
                </li>
                <li class="nav-item d-none d-lg-block">
                    <a class="d-flex align-items-center nav-link" @click="fullscreen">
                        <app-icon id="fullscreen-button" :name="'maximize'" />
                    </a>
                </li>

                <app-navbar-language-dropdown
                    selected-language="EN"
                    :data="languageData"
                    data-noti
                />

<!--                <app-navbar-notification-dropdown-->
<!--                    :allNotificationUrl="urlGenerator(`/crm/notifications/list`)"-->
<!--                    :data="notifications"-->
<!--                    @clicked="selectedNotification"-->
<!--                />-->

                <span class="topbar-divider d-none d-sm-block" />
                <app-navbar-profile-dropdown :user="user" :data="profileData" />
            </ul>
        </div>
    </nav>
</template>

<script>
import CoreLibrary from "../../../../core/helpers/CoreLibrary";
import TopBarMixin from "./Mixins/TopBarMixin";
import { mapGetters } from 'vuex';
import {urlGenerator} from  "@app/Helpers/helpers";

export default {
    name: "Navbar",
    mixins: [TopBarMixin],
    extends: CoreLibrary,
    props: ["configData"],
    data() {
        return {
            urlGenerator,
            leftMenuType: "normal",
            darkMode: false,
            user: {},
            languageData: [
                {
                    img:
                        "https://upload.wikimedia.org/wikipedia/commons/thumb/f/f2/Flag_of_Great_Britain_%281707%E2%80%931800%29.svg/1024px-Flag_of_Great_Britain_%281707%E2%80%931800%29.svg.png",
                    title: "English",
                    url: "",
                },
            ],
            profileData: [
                {
                    optionName: this.$t("my_profile"),
                    optionIcon: "user",
                    url: urlGenerator("secure_dashboard/my-profile"),
                },
                {
                    optionName: this.$t("notifications"),
                    optionIcon: "bell",
                    url: urlGenerator("/crm/notifications/list"),
                },
                {
                    optionName: this.$t("settings"),
                    optionIcon: "settings",
                    url: urlGenerator("/crm/settings/page"),
                },
                {
                    optionName: this.$t("log_out"),
                    optionIcon: "log-out",
                    url: urlGenerator("secure_dashboard/log-out"),
                },
            ],
        }
    },

    methods: {
      setUser() {
          this.user = {
              full_name: window.user.full_name,
              img: window.user.profile_picture
                  ? urlGenerator(window.user.profile_picture.path)
                  : urlGenerator("/images/profile.png"),
              status: this.$t("online"),
              role: this.$t(window.user.roles[0].name),
          };
      },
     selectedNotification(notification) {
         // notification url is build in vuex store,
         // so no need use urlGenerator

         // window.location.replace(urlGenerator(notification.url));

         // window.location.replace(notification.url);
        }
    },

    mounted() {
        this.setUser();
        // this.$store.dispatch("getAllNotification");
    }
}
</script>
