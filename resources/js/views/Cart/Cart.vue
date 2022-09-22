<template>
  <div class="row g-0 pt-5 pb-5">
    <div class="col-md-2"></div>
    <div class="col-md-8 p-1">
      <div class="row g-0">
        <div class="col-md-8">
          <h5 class="text-start fw-bold pb-3">My Cart</h5>

          <div class="row g-0 product-cart"  v-for="item in getCartData.shoes_data"
          :key="item.index">
            <div class="col-md-3 d-flex justify-content-start">
              <img
                :src="item.image_url"
                class="cart-product-image"
                :alt="item.title"
              />
            </div>
            <div class="col-md-5 text-start">
              <div class="row g-0">
                <div class="col-md-7">
                  <h6 class="cart-product-title text-start fw-bold p-1">
                 {{ item.title }}
                  </h6>
                  <small class="p-1">{{ item.category }}</small>
                </div>
                <div class="col-md-5">
                  <p class="cart-product-price text-end fw-bold p-1">${{ item.price }}</p>
                </div>
              </div>
              <div class="d-flex flex-row justify-content-start pt-2">
                <div class="cart-fs-text ps-1">Color:</div>
                <div class="cart-fs-text ps-3">{{ item.color }}</div>
              </div>
              <div class="d-flex flex-row justify-content-start pt-2">
                <div class="cart-fs-text ps-1">Size:</div>
                <div class="cart-fs-text ps-3">{{ item.size }}</div>
              </div>
              <div class="d-flex flex-row justify-content-start pt-2">
                <div class="cart-fs-text ps-1">Width:</div>
                <div class="cart-fs-text ps-3">{{ item.width }}</div>
              </div>
              <div class="d-flex flex-row justify-content-start pt-2">
                <button type="button" class="btn btn-outline-danger" @click="deleteFromCart(item.cart_id)">Delete From Cart</button>
              </div>
            </div>
            <div class="col-md-3">
              <div class="info-block">
                <p class="text-start fw-bold p-1">UPS Ground {{ item.shipped_days }} days</p>
                <p class="text-start p-1 ship-info-text">
                  <i class="fa-solid fa-box"></i>  {{ item.shipped_days }}  business days once shipped
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="order-summary-block">
            <h5 class="ps-4 text-start fw-bold pb-4 pt-4">Order Summary</h5>
            <div class="d-flex flex-row justify-content-between">
              <p class="ps-4">Sub Total</p>
              <p class="pe-4">${{ getCartData.sub_total }}</p>
            </div>
            <div class="d-flex flex-row justify-content-between">
              <p class="ps-4">Shipping: UPS Ground</p>
              <p class="pe-4">FREE</p>
            </div>
            <div class="d-flex flex-row justify-content-between">
              <p class="ps-4">Sales tax</p>
              <p class="pe-4">Calculated at checkout</p>
            </div>
            <div class="d-flex flex-row justify-content-between">
              <p class="ps-4 fw-bold">Order Total</p>
              <p class="pe-4 fw-bold">${{ getCartData.sub_total }}</p>
            </div>
            <div class="d-grid gap-2 pe-2 ps-2">
              <button class="btn btn-danger no-border">Checkout</button>
            </div>
            <div class="d-flex flex-row justify-content-end pt-2 pb-2 pe-2">
              <button class="btn btn-primary no-border">Paypal checkout</button>
            </div>
          </div>
        </div>
      </div>

      <div class="row g-0 pt-5">
        <div class="col-md-12 d-none d-sm-none d-md-none d-lg-block">
          <h3 class="text-start fw-bold pt-2 pb-2">You May Also Like</h3>
          <div
            id="carouselCartControls"
            class="carousel slide"
            data-bs-ride="carousel"
          >
            <div class="carousel-inner">
              <div class="carousel-item active">
                <div class="row g-0">
                  <div
                  class="col-md-3 p-1"
                  v-for="item in menShoesData"
                  :key="item.index"
                >
                  <div class="card" style="width: 100%">
                    <img :src="item.image_url" class="card-img-top" />
                    <div class="card-body">
                      <p class="card-text">
                        <span class="product-title text-start">
                          {{ item.title }}
                        </span>
                        <span class="product-price text-end"
                          >$ {{ item.price }}</span
                        >
                      </p>
                      <small class="product-category">{{
                        item.gender
                      }}</small>
                    </div>
                  </div>
                </div>
                </div>
              </div>
              <div class="carousel-item">
                <div class="row g-0">
                  <div
                  class="col-md-3 p-1"
                  v-for="item in womenShoesData"
                  :key="item.index"
                >
                  <div class="card" style="width: 100%">
                    <img :src="item.image_url" class="card-img-top" />
                    <div class="card-body">
                      <p class="card-text">
                        <span class="product-title text-start">
                          {{ item.title }}
                        </span>
                        <span class="product-price text-end"
                          >$ {{ item.price }}</span
                        >
                      </p>
                      <small class="product-category">{{
                        item.gender
                      }}</small>
                    </div>
                  </div>
                </div>
                </div>
              </div>
            </div>
            <button
              class="carousel-control-prev"
              type="button"
              data-bs-target="#carouselCartControls"
              data-bs-slide="prev"
            >
              <span
                class="carousel-control-prev-icon"
                aria-hidden="true"
              ></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button
              class="carousel-control-next"
              type="button"
              data-bs-target="#carouselCartControls"
              data-bs-slide="next"
            >
              <span
                class="carousel-control-next-icon"
                aria-hidden="true"
              ></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
      </div>


      {{ menShoesData }}
    </div>
    <div class="col-md-2"></div>
  </div>
</template>

<script>
import { onMounted } from "vue";
import { storeToRefs } from "pinia";
import { cartStore } from "../../store/cartStore";
import { homeStore } from "../../store/homeStore";
import { useRouter } from "vue-router";

export default {
  setup() {
    const router = useRouter();
    const store = cartStore();
    const storeHome = homeStore();
    const { getCartData } = storeToRefs(store);
    const { menShoesData, womenShoesData, } = storeToRefs(storeHome);

    const { fetchGetCartData, destroyByIdItemFromCart,} = cartStore();

    const deleteFromCart = async (id) => {
      await destroyByIdItemFromCart(id);
      await router.push({ name: "store" });
      await fetchGetCartData();
    };
    
    const { fetchMenShoesData, fetchWomenShoesData } = homeStore();

    onMounted(() => {
      fetchGetCartData(), fetchWomenShoesData(), fetchMenShoesData();
    });

    return {
      getCartData,
      deleteFromCart,
      menShoesData,
      womenShoesData,
    };
  },
};
</script>

<style scoped>
.cart-product-image {
  height: 200px;
}

.info-block {
  background-color: #e0e2e2;
  height: 80px;
}
.ship-info-text {
  font-size: 11px;
  position: relative;
  top: -20px;
}
.cart-fs-text {
  font-size: 11px;
}
.form-select {
  height: 40px !important;
}
.remove-btn {
  margin-top: 40px;
}

.order-summary-block {
  background-color: #e0e2e2;
}

.no-border {
  border-radius: 0px;
}
</style>