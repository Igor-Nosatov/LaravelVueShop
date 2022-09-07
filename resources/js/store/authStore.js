import axios from "axios";
import { defineStore } from "pinia";

export const authStore = defineStore("authStore", {
    actions: {
        async registerNewUser(data){
            await axios.post('/api/register', data)
        },
        async loginCurrentUser(data){
            await axios.post('/api/login', data)
        },
    },
});