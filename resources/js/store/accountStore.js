import axios from "axios";
import { defineStore } from "pinia";

export const accountStore = defineStore("accountStore", {
    state: () => {
        return {
            allAccountData:[],
        };
    },
    actions: {
        async fetchAllAccountData() { 
            this.allAccountData = await axios
                .get("/api/account")
                .then((response) => response.data.data);
        },
    },
});