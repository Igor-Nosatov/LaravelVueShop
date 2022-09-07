import axios from "axios";
import { defineStore } from "pinia";

export const favouriteStore = defineStore("favouriteStore", {
    actions: {
        async storeNewFavourite(data){
            await axios.post('/api/favourite', data)
        },
        async destroyByIdFavourite(id) {
            await axios.delete(`/api/favourite/${id}/destroy`);
        },
    },
});