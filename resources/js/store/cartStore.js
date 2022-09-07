import axios from 'axios';
import { defineStore } from 'pinia';

export const shopStore = defineStore('shopStore',{
    state: () => {
        return {
            menShoesData: [],
        }
    },
    actions: {
        async fetchMenShoesData() {
            this.menShoesData = await axios
            .get('/api/home')
            .then((response) => response.data.data.men_shoes);
          },
    }
});