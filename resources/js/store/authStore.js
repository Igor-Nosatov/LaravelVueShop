import axios from "axios";
import { defineStore } from "pinia";

export const authStore = defineStore("authStore", {
  actions: {
    async resetHeaders() {
      localStorage.removeItem("token");
      axios.defaults.headers.common = { Authorization: "" };
    },

    async setTokenAndUserData(accessToken) {
      const token = accessToken;
      localStorage.setItem("token", accessToken);
      axios.defaults.headers.common = { Authorization: `Bearer ${token}` };
    },

    async registerNewUser(data) {
      const response = await axios.post("/api/auth/register", data);
      this.setTokenAndUserData(
        response.data.data.access_token
      );
    },

    async loginCurrentUser(data) {
      const response = await axios.post("/api/auth/login", data);
      this.setTokenAndUserData(
        response.data.data.access_token
      );
    },

    async logout() {
      return await axios
        .get(`${window.location.origin}/api/logout`)
        .then((res) => {
          return this.resetHeaders();
        })
        .catch((err) => {
          return this.resetHeaders();
        });
    },
  },
});
