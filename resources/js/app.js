import "./bootstrap";
import "../scss/app.scss";
import Alpine from "alpinejs";
window.Alpine = Alpine;
Alpine.start();

import { createApp } from "vue";
import LikeButton from "./components/LikeButton.vue";

function mountLikes() {
    document.querySelectorAll(".like-button-root").forEach((el) => {
        if (el.__mounted) return;
        el.__mounted = true;
        const initial = Number(el.dataset.initial || 0);
        const id = String(el.dataset.id || "");
        const variant = String(el.dataset.variant || "button");
        createApp(LikeButton, { initial, id, variant }).mount(el);
    });
}

document.addEventListener("DOMContentLoaded", () => {
    mountLikes();
    new MutationObserver(mountLikes).observe(document.body, {
        childList: true,
        subtree: true,
    });
});
