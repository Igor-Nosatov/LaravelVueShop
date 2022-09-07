import axios from "axios";
import { defineStore } from 'pinia';

export const homeStore = defineStore('homeStore', {
  state: () => {
    return {
      menShoesData: [],
      womenShoesData: [],
      kidShoesData: [],
      genderCategoryData: [],
    };
  },
  actions: {
    async fetchMenShoesData() {
      this.menShoesData = await axios
      .get('/api/home')
      .then((response) => response.data.data.men_shoes);
    },
    async fetchWomenShoesData() {
      this.womenShoesData = await axios  
      .get('/api/home')
      .then((response) => response.data.data.women_shoes);
    },
    async fetchKidShoesData() {
      this.kidShoesData = await axios  
      .get('/api/home')
      .then((response) => response.data.data.kid_shoes);
    },
    async fetchGenderCategoryData() {
      this.genderCategoryData = await axios  
      .get('/api/home')
      .then((response) => response.data.data.gender);
    },
  },
});
