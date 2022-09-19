<div class="row g-0">
    <div class="col-md-6 p-1">
      <div class="summary-block">
        <h6 class="text-start text-dark ps-3 pt-3">
          Personal & Account Details
        </h6>
      </div>
      <div class="summary-block-desc">
        <p class="text-start"><small>First Name:</small> {{allAccountData.user.first_name }}</p>
        <p class="text-start"><small>Last Name: </small> {{allAccountData.user.last_name }}</p>
        <p class="text-start">
          <i class="fa-solid fa-envelope"></i> {{allAccountData.user.email }}
        </p>
      </div>

      <div class="summary-block">
        <h6 class="text-start text-dark ps-3 pt-3">My Wish List</h6>
      </div>
      <div class="summary-block-desc">

        <div class="row g-0 product-cart p-2"  v-for="item in allAccountData.favourites"
        :key="item.index">
          <div class="col-md-4 d-flex justify-content-start">
            <img
            :src="item.image_url"
            class="cart-product-image"
            :alt="item.title"
          />
          </div>
          <div class="col-md-8 text-start">
            <div class="row g-0">
              <div class="col-md-7">
                <h6 class="cart-product-title text-start fw-bold p-1">
                 {{ item.title }}
                </h6>
                <small class="p-1"> {{ item.category }}</small>
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
    </div>
    <div class="col-md-6 p-1">
      <div class="summary-block">
        <h6 class="text-start text-dark ps-3 pt-3">Order History</h6>
      </div>
      <div class="summary-block-desc">
        <div class="row g-0 product-cart p-2"  v-for="item in allAccountData.cart"
        :key="item.index">
          <div class="col-md-4 d-flex justify-content-start">
            <img
            :src="item.image_url"
            class="cart-product-image"
            :alt="item.title"
          />
          </div>
          <div class="col-md-8 text-start">
            <div class="row g-0">
              <div class="col-md-7">
                <h6 class="cart-product-title text-start fw-bold p-1">
                 {{ item.title }}
                </h6>
                <small class="p-1"> {{ item.category }}</small>
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