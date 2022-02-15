require("./bootstrap");

import { createApp } from "vue";
import { library } from "@fortawesome/fontawesome-svg-core";
import { faPencil, faTrash, faCircleXmark } from "@fortawesome/free-solid-svg-icons";
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";
// import router from "./vue/router";

library.add(faPencil, faTrash, faCircleXmark);

import App from "./vue/App.vue";



createApp(App)    
    .component("FontAwesomeIcon", FontAwesomeIcon)
    .mount("#app");
    // .use(router)
