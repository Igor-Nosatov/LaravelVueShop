import axios from "axios";
import { defineStore } from "pinia";

export const authStore = defineStore("authStore", {
    actions: {
        async registerNewUser(data){
            console.log(data);
            await axios.post('/api/auth/register', data)
        },
        async loginCurrentUser(data){
            await axios.post('/api/auth/login', data)
        },
    },
});