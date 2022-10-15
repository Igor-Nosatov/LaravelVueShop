<template>
  <div class="row g-0 pt-5 pb-5">
    <div class="col-md-2"></div>
    <div class="col-md-8">
      <h4 class="text-start text-dark pt-2 pb-2">Welcome back, Igor</h4>
      <div class="row g-0">
        <div class="col-12 col-sm-12 col-md-6 p-1">
          <div class="summary-block">
            <h6 class="text-start text-dark ps-3 pt-3">
              Personal & Account Details
            </h6>
          </div>
          <div class="summary-block-desc">
            <p class="text-start"><small>First Name:</small> {{ accountData.first_name }}</p>
            <p class="text-start"><small>Last Name: </small> {{ accountData.last_name }}</p>
            <p class="text-start">
              <i class="fa-solid fa-envelope"></i> {{accountData.email}}
            </p>
          </div>
          <div class="summary-block">
            <h6 class="text-start text-dark ps-3 pt-3">My Wish List</h6>
          </div>
          <div class="summary-block-desc">
    
            <div class="row g-0 product-cart p-2"  v-for="item in favouriteData"
            :key="item.index">
              <div class="col-12 col-sm-12  col-md-12 col-lg-6 col-xs-6 text-start">
                <img
                :src="item.image_url"
                class="cart-product-image"
                :alt="item.title"
              />
              </div>
              <div class="col-12 col-sm-12  col-md-12 col-lg-6 col-xs-6 text-start">
                <div class="row g-0">
                  <div class="col-md-7"> 
                    <router-link
                    :to="{ name: 'product', params: { id: item.id } }"
                     class="cart-product-title text-start fw-bold p-1"
                  >
                  Name: {{ item.title }}
                  </router-link>
                  </div>
                </div>
                <div class="d-flex flex-row justify-content-start pt-2">
                  <div class="cart-fs-text ps-1">Color:</div>
                  <div class="cart-fs-text ps-3"> {{ item.color }}</div>
                </div>
                <div class="d-flex flex-row justify-content-start pt-2">
                  <div class="cart-fs-text ps-1">Type:</div>
                  <div class="cart-fs-text ps-3">{{ item.type }}</div>
                </div>
                <div class="d-flex flex-row justify-content-start pt-2">
                  <div class="cart-fs-text ps-1">Price:</div>
                  <div class="cart-fs-text ps-3">${{ item.price }}</div>
                </div>
                <div class="d-flex flex-row justify-content-start pt-2">
                  <button type="button" class="btn btn-outline-danger rounded-0" @click="deleteFromFavourite(item.favourite_id)">Delete From Wishlist</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      
        <div class="col-12  col-sm-12  col-md-6 p-1">
          <div class="summary-block">
            <h6 class="text-start text-dark ps-3 pt-3">Order History</h6>
          </div>
          <div class="summary-block-desc">
            <div class="row g-0 product-cart p-2"  v-for="item in cartData"
            :key="item.index">
              <div class="col-12  col-sm-12   col-md-12 col-lg-6 col-xs-6 d-flex justify-content-start">
                <img
                :src="item.image_url"
                class="cart-product-image"
                :alt="item.title"
              />
              </div>
              <div class="col-12 col-sm-12  col-md-12 col-lg-6 col-xs-6 text-start">
                <div class="row g-0">
                  <div class="col-md-7">
                 
                    <router-link
                    :to="{ name: 'product', params: { id: item.id } }"
                    class="cart-product-title text-start fw-bold p-1"
                  >
                  Name: {{ item.title }}
                  </router-link>

                  </div>
                </div>
                <div class="d-flex flex-row justify-content-start pt-2">
                  <div class="cart-fs-text ps-1">Color:</div>
                  <div class="cart-fs-text ps-3"> {{ item.color }}</div>
                </div>
                <div class="d-flex flex-row justify-content-start pt-2">
                  <div class="cart-fs-text ps-1">Type:</div>
                  <div class="cart-fs-text ps-3">{{ item.type }}</div>
                </div>
                <div class="d-flex flex-row justify-content-start pt-2">
                  <div class="cart-fs-text ps-1">Price:</div>
                  <div class="cart-fs-text ps-3">${{ item.price }}</div>
                </div>
              </div>
            </div>
          </div>
          <div class="summary-block">
            <h6 class="text-start text-dark ps-3 pt-3">Address Book</h6>
          </div>
          <div class="summary-block-desc">
            <p class="text-start">
              Add one or multiple addresses to your profile to help make your
              checkout process faster.
            </p>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-2"></div>
  </div>
</template>

<script>
import { onMounted } from "vue";
import { storeToRefs } from "pinia";
import { accountStore } from "../../store/accountStore";

export default {
  setup() {

    const store = accountStore();
    const { accountData, cartData,  favouriteData} = storeToRefs(store);
    
    const { fetchAccountData,fetchCartData,fetchFavouriteData, destroyByIdFavourite } = accountStore();

    const deleteFromFavourite = async (id) => {
      await destroyByIdFavourite(id);
      await fetchFavouriteData();
    };

    onMounted(() => {
      fetchAccountData(), fetchCartData(), fetchFavouriteData();
    });
 
    return {
      accountData,
      cartData,
      favouriteData,
      deleteFromFavourite,
    };
  }
}

</script>

<style scoped>
.cart-product-image {
  height: 200px;
}

.summary-block {
  background-color: #e0e2e2;
  height: 50px;
  margin: 10px 0px;
}
.summary-block-desc {
  min-height: 200px;
}
</style>