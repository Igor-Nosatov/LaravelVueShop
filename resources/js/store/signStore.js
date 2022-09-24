import axios from "axios";
import { defineStore } from "pinia";

export const signStore = defineStore("signStore", {
    actions: {
        async storeSignUpUser(data){
            await axios.post('/api/sign-up', data)
        },
    },
});
