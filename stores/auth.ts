import { ref, computed } from "vue";
import { defineStore } from "pinia";

export const useAuthStore = defineStore("auth", () => {
    const token = useCookie("token");
    const tokenRefresh = useCookie("tokenRefresh");
    const user = useCookie("user");

    const isAuthenticated = computed(() => token.value);

    const logout = () => {
        token.value = "";
        tokenRefresh.value = "";
        user.value = "";
    };

    return {
        token,
        tokenRefresh,
        user,
        isAuthenticated,
        logout,
    };
});
