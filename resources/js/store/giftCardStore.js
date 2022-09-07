import axios from "axios";
import { defineStore } from "pinia";

export const giftCardStore = defineStore("giftCardStore", {
    actions: {
        async storeGiftCard(data){
            await axios.post('/api/gift-card', data)
        },
    },
});