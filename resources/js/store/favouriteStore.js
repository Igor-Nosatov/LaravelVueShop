import axios from "axios";
import { defineStore } from "pinia";

export const favouriteStore = defineStore("favouriteStore", {
    state: () => {
        return {
            getFavouriteCount:null,
        };
    },
    actions: {
        async storeNewFavourite(data){
            await axios.post('/api/favourite', data)
        },
        async destroyByIdFavourite( id) {
            await axios.delete(`/api/favourite/${id}/destroy`);
        },

        async fetchGetFavouriteCount() {
            this. getFavouriteCount = await axios
                .get('/api/favourite/data-count')
                .then((response) => response.data.data.total); 
        },
    },
});