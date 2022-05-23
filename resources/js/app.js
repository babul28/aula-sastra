import Alpine from "alpinejs";
import adminLayout from "./data/admin-layout.js";

window.Alpine = Alpine;

Alpine.data("adminLayout", adminLayout);

Alpine.start();
