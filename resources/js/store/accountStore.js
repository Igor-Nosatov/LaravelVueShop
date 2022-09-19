import axios from "axios";
import { defineStore } from "pinia";

export const accountStore = defineStore("accountStore", {
    state: () => {
        return {
            accountData:{},
            favouriteData:[],
            cartData: []
        };
    },
    actions: {
        async fetchAccountData() { 
            this.accountData = await axios
                .get("/api/account")
                .then((response) => response.data.data.user);
        },

        async fetchFavouriteData() { 
                this.favouriteData = await axios
                .get("/api/account")
                .then((response) => response.data.data.favourites);
        },

        async fetchCartData() { 
            this.accountData = await axios
                this.cartData = await axios
                .get("/api/account")
                .then((response) => response.data.data.cart);
        },
    },
});