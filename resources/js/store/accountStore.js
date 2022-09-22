import axios from "axios";
import { defineStore } from "pinia";

export const accountStore = defineStore("accountStore", {
    state: () => {
        return {
            accountData:{},
            cartData:[],
            favouriteData:[]
        }; 
    },
    actions: {
        async fetchAccountData() { 
            this.accountData = await axios
                .get("/api/account")
                .then((response) => response.data.data.user);
        },
        async fetchCartData() { 
            this.cartData = await axios
                .get("/api/cart/account-data")
                .then((response) => response.data.data);
        },
        async fetchFavouriteData() { 
            this.favouriteData = await axios
                .get("/api/favourite")
                .then((response) => response.data.data);
        },
        async destroyByIdFavourite(id)
        {
            await axios.post(`/api/favourite/${id}/destroy`);
        }
    },
});

