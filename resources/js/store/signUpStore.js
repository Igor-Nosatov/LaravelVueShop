import axios from "axios";
import { defineStore } from "pinia";

export const signUpStore = defineStore("signUpStore", {
    actions: {
        async storeSignUpUser(data){
            await axios.post('/api/sign-up', data)
        },
    },
});
