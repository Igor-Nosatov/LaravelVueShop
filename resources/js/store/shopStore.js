import axios from "axios";
import { defineStore } from "pinia";

export const shopStore = defineStore("shopStore", {
  state: () => {
    return {
      shoesData: [],
      optionsData: [],
      shoesById: {},
    };
  },
  actions: {
    async fetchShoesData(params) {
      if (params) {
        this.shoesData = await axios
        .get(`/api/shop?${params}`)
        .then((response) => response.data.data);
        console.log(params);
      } else {
        this.shoesData = await axios
          .get("/api/shop")
          .then((response) => response.data.data);
      }
     
    },
    async fetchOptionsData() {
      this.optionsData = await axios
        .get("/api/options")
        .then((response) => response.data.data);
    },
    async getShoesById(id) {
      this.shoesById = await axios
        .get(`/api/shop/${id}`)
        .then((response) => response.data.data);
    },
  },
});
