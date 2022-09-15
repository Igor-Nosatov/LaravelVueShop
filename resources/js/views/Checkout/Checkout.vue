<template>
  <div class="row g-0 pt-5 pb-5">
    <div class="col-md-2"></div>
    <div class="col-md-8">
      <div class="row g-0">
        <div class="col-md-7">
          <p class="fw-bold text-start text-dark">
            <a href="" class="text-dark">Back to shopping cart</a>
          </p>
          <div class="block-shipping-address ms-1 me-1">
            <h6 class="fw-bold text-start text-white ps-3 pt-3">
              Shipping Address
            </h6>
          </div>
          <form class="pt-4 pb-4 text-start" @submit.prevent="makeCheckout">
            <div class="row g-0">
              <div class="col-md-6 p-1">
                <div class="mb-3 text-start">
                  <input
                    type="text"
                    class="form-control form-control-checkout"
                    placeholder="First Name"
                    v-model="form.first_name"
                  required/>
                </div>
              </div>

              <div class="col-md-6 p-1">
                <div class="mb-3 text-start">
                  <input
                    type="text"
                    class="form-control form-control-checkout"
                    placeholder="Last Name"
                    v-model="form.last_name"
                    required/>
                </div>
              </div>
            </div>
            <div class="row g-0">
              <div class="col-md-6 p-1">
                <div class="mb-3 text-start">
                  <input
                    type="text"
                    class="form-control form-control-checkout"
                    placeholder="Street Address"
                    v-model="form.street"
                    required/>
                </div>
              </div>

              <div class="col-md-6 p-1">
                <div class="mb-3 text-start">
                  <input
                    type="text"
                    class="form-control form-control-checkout"
                    placeholder="Apartment, suit, etc.(Optional)"
                  />
                </div>
              </div>
            </div>
            <div class="row g-0">
              <div class="col-md-4 p-1">
                <input
                  type="text"
                  class="form-control form-control-checkout"
                  placeholder="City"
                  v-model="form.city"
                  required
                />
              </div>
              <div class="col-md-4 p-1">
                <select class="form-select form-control-checkout"  v-model="form.state">
                  <option selected>Choose state</option>
                  <option  :value="{ state: 1 }"> Alaska</option>
                  <option  :value="{ state: 2 }"> Idaho</option>
                  <option  :value="{ state: 3 }"> Hawai</option>
                </select>
              </div>
              <div class="col-md-4 p-1">
                <input
                  type="text"
                  class="form-control form-control-checkout"
                  placeholder="Zip code"
                  v-model="form.zip_code"
               required />
              </div>
            </div>

            <div class="row g-0">
              <div class="col-md-6 p-1">
                <p class="text-start pt-2 ps-1">
                  <small> Required for shipping related questions</small>
                </p>
                <input
                  type="text"
                  class="form-control form-control-checkout"
                  placeholder="Phone Number"
                />
                <div class="mb-3 form-check text-start pt-4">
                  <input
                    type="checkbox"
                    class="form-check-input no-border"
                    id="address-account"
                  />
                  <label
                    class="form-check-label text-start "
                    for="address-account"
                    >Save address to my account</label
                  >
                </div>
                <div class="mb-3 text-start pt-4">
                  <input
                    type="email"
                    class="form-control form-control-checkout"
                    placeholder="Email"
                    v-model="form.email"
                  required/>
                </div>
              </div>
            </div>
            <div class="mb-3 form-check text-start pt-4  ms-1">
              <input
                type="checkbox"
                class="form-check-input no-border"
                id="exclusive-offers"
              />
              <label class="form-check-label text-start" for="exclusive-offers"
                >Sign up for email to hear about product launches, exclusive
                offers and athlete news</label
              >
            </div>
            <div class="row g-0 pt-4">
              <div class="col-md-12  ms-1">
                <h6 class="text-start fw-bold">Shipping Options</h6>
                <div class="form-check">
                  <input
                    class="form-check-input pt-3"
                    type="radio"
                    name="ship-options"
                    id="ship-options"
                    checked
                  />
                  <label class="form-check-label" for="ship-options">
                    USPS - $11.95
                  </label>
                </div>
              </div>
            </div>
            <button
              type="submit"
              class="btn btn-danger payment-btn fw-bold mt-5 ms-1"
            >
              Continue to payment
            </button>
          </form>
        </div>
        <div class="col-md-5 ps-2 pe-2">
          <div class="row g-0">
            <div class="col-md-12">
              <div class="highlight-summary">
                <h6 class="fw-bold text-start ps-2 pt-2">Order Summary</h6>
              </div>
              <div class="summary-desc">
                <div class="d-flex flex-row justify-content-between pt-5">
                  <p class="ps-4">Sub Total</p>
                  <p class="pe-4">$164.98</p>
                </div>
                <div class="d-flex flex-row justify-content-between">
                  <p class="ps-4">Shipping: UPS Ground (2-5 days)</p>
                  <p class="pe-4">FREE</p>
                </div>
                <div class="d-flex flex-row justify-content-between">
                  <p class="ps-4">Sales tax</p>
                  <p class="pe-4">Calculated at checkout</p>
                </div>
                <div class="d-flex flex-row justify-content-between pb-5">
                  <p class="ps-4 fw-bold">Order Total</p>
                  <p class="pe-4 fw-bold">$164.98</p>
                </div>
              </div>
            </div>
          </div>
          <div class="row g-0">
            <div class="col-md-12">
              <div class="highlight-shipping">
                <h6 class="fw-bold text-start ps-2 pt-2">
                  Shipping (2) <small>- 2-7 business days once shipped</small>
                </h6>
              </div>
              <div class="shipping-desc">
                <div class="row g-0 product-cart pt-2 pb-2">
                  <div class="col-md-5 d-flex justify-content-start  p-2">
                    <img
                      src="../../../../public/img/cartProduct1.webp"
                      alt=""
                      class="cart-product-image"
                    />
                  </div>
                  <div class="col-md-7 text-start  p-2">
                    <div class="row g-0">
                      <div class="col-md-7">
                        <h6 class="cart-product-title text-start fw-bold p-1">
                          NB Numeric Jamie Foy 306 Laceless
                        </h6>
                        <small class="p-1">Unisex</small>
                      </div>
                      <div class="col-md-5">
                        <p class="cart-product-price text-end fw-bold p-1">
                          $79.99
                        </p>
                      </div>
                    </div>
                    <div class="d-flex flex-row justify-content-start pt-2">
                      <div class="cart-fs-text ps-1">Color:</div>
                      <div class="cart-fs-text ps-3">Navy with White</div>
                    </div>
                    <div class="d-flex flex-row justify-content-start pt-2">
                      <div class="cart-fs-text ps-1">Size:</div>
                      <div class="cart-fs-text ps-3">M13 / W14.5</div>
                    </div>
                    <div class="d-flex flex-row justify-content-start pt-2">
                      <div class="cart-fs-text ps-1">Width:</div>
                      <div class="cart-fs-text ps-3">Standard</div>
                    </div>
                  </div>
                </div>
                <div class="row g-0 product-cart  pt-2 pb-2">
                  <div class="col-md-5 d-flex justify-content-start p-2">
                    <img
                      src="../../../../public/img/cartProduct2.webp"
                      alt=""
                      class="cart-product-image"
                    />
                  </div>
                  <div class="col-md-7 text-start  p-2">
                    <div class="row g-0">
                      <div class="col-md-7">
                        <h6 class="cart-product-title text-start fw-bold p-1">
                          NB Numeric Jamie Foy 306 Laceless
                        </h6>
                        <small class="p-1">Unisex</small>
                      </div>
                      <div class="col-md-5">
                        <p class="cart-product-price text-end fw-bold p-1">
                          $79.99
                        </p>
                      </div>
                    </div>
                    <div class="d-flex flex-row justify-content-start pt-2">
                      <div class="cart-fs-text ps-1">Color:</div>
                      <div class="cart-fs-text ps-3">Navy with White</div>
                    </div>
                    <div class="d-flex flex-row justify-content-start pt-2">
                      <div class="cart-fs-text ps-1">Size:</div>
                      <div class="cart-fs-text ps-3">M13 / W14.5</div>
                    </div>
                    <div class="d-flex flex-row justify-content-start pt-2">
                      <div class="cart-fs-text ps-1">Width:</div>
                      <div class="cart-fs-text ps-3">Standard</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-2"></div>
  </div>
</template>


<script>
import { reactive } from "vue";
import { checkoutStore } from "../../store/checkoutStore";

export default {
  setup() {
    const { storeCheckoutData } = checkoutStore();

    const form = reactive({
      first_name: "",
      last_name: "",
      street: "",
      state: "",
      zip_code: "",
      phone: "",
      email: "",
      cart_id: ""
    });

    const makeCheckout = async () => {
      let user_id = JSON.parse(localStorage.getItem("userId"));
      await storeCheckoutData({ ...form, user_id });
    };

    return {
      form,
      makeCheckout,
    };
  },
};
</script>

<style scoped>
.block-shipping-address {
  height: 50px;
  color: #fff;
  background-color: #000;
}

.payment-btn {
  color: #fff;
  width: 300px;
  border-radius: 0px !important;
  font-size: 13px;
  height: 60px;
}

.form-control-checkout {
  border-radius: 0px !important;
  height: 60px;
  font-size: 13px;
}

.highlight-summary,
.highlight-shipping {
  height: 60px;
  background-color: #f0eaea;
}

.summary-desc,
.shipping-desc {
  border: 1px solid #f0eaea;
}

.cart-product-image {
  height: 200px;
}

.no-border{
  border-radius:0px;
}
</style>