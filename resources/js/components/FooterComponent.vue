<template>
  <div class="row g-0 sign-up-block justify-content-center pt-5">
    <div class="col-2 pb-5"></div>
    <div class="col-12 col-md-8 pb-5">
      <div
        class="
          d-flex
          flex-row
          justify-content-center
          align-items-center
          flex-wrap
        "
      >
        <form @click="storeSignUp"> 
          <div class="row  g-0">
            <div class="input-group mb-3 d-flex row g-0 ">
              <div class="col-12 col-md-7 mt-2">
                <input type="email" width="100%" class="form-control rounded-0 sign_up_email  pt-3 pb-3 flex-fill" placeholder="News subscribe....." v-model="form.email" />
              </div>
              <div class="col-12 col-md-5 mt-2">
                <div
                class="btn btn-danger btn-lg btn-signup  rounded-0 flex-fill "
                  id="basic-addon1"
                  type="submit"
                >
               <span class="mt-4"> Sign Up</span>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="col-2 pb-5"></div>
  </div>
  <div class="row g-0 pt-5 pb-5">
    <div class="col-md-1"></div>
    <div class="col-md-10">
      <div class="row g-0">
        <div class="col-sm-6 col-md-2 pt-5">
          <h6 class="text-start fw-bold ps-5">Help</h6>
          <ul class="nav flex-column text-start">
            <li class="nav-item">
              <a class="nav-link text-dark nav-link-footer" href="#"
                >Contact Us</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link text-dark nav-link-footer" href="#">FAQ</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-dark nav-link-footer" href="#"
                >Size Guide</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link text-dark nav-link-footer" href="#"
                >Sale Exclusions</a
              >
            </li>
          </ul>
        </div>
        <div class="col-sm-6 col-md-2 pt-5">
          <h6 class="text-start fw-bold ps-5">Shop</h6>
          <ul class="nav flex-column text-start">
            <li class="nav-item">
              <a class="nav-link text-dark nav-link-footer" href="#"
                >Gift Cards</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link text-dark nav-link-footer" href="#"
                >Order Status</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link text-dark nav-link-footer" href="#"
                >Shipping Information</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link text-dark nav-link-footer" href="#"
                >Returns & Exchanges</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link text-dark nav-link-footer" href="#"
                >Custom Uniforms</a
              >
            </li>
          </ul>
        </div>
        <div class="col-sm-6 col-md-2 pt-5">
          <h6 class="text-start fw-bold ps-5">About us</h6>
          <ul class="nav flex-column text-start">
            <li class="nav-item">
              <a class="nav-link text-dark nav-link-footer" href="#">
                Inside NB</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link text-dark nav-link-footer" href="#"
                >Responsible Leadership</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link text-dark nav-link-footer" href="#"
                >Our Purpose</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link text-dark nav-link-footer" href="#"
                >The TRACK at New Balance</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link text-dark" href="#">Press Box</a>
            </li>
          </ul>
        </div>
        <div class="col-sm-6 col-md-2 pt-5">
          <h6 class="text-start fw-bold ps-5">For you</h6>
          <ul class="nav flex-column text-start">
            <li class="nav-item">
              <a class="nav-link text-dark nav-link-footer" href="#"
                >Student Discount</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link text-dark nav-link-footer" href="#"
                >Sign Up to Wear Test</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link text-dark nav-link-footer" href="#"
                >Idea Submission</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link text-dark nav-link-footer" href="#"
                >Affiliate Program</a
              >
            </li>
          </ul>
        </div>
        <div class="col-sm-6 col-md-3 ps-3">
          <div class="d-flex justify-content-start">
            <router-link :to="{ name: 'home' }" class="navbar-brand">
              <img
                src="../../../public/img/logo.png"
                alt="new balance logo"
                class="logo"
              />
            </router-link>
          </div>
          <p class="text-start">
            Independent since 1906, we empower people through sport and
            craftsmanship to create positive change in communities around the
            world.
          </p>
          <ul class="nav justify-content-center">
            <li class="nav-item">
              <a class="nav-link text-dark" href="#"
                ><i class="fa-brands fa-instagram fa-2x"></i
              ></a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-dark" href="#"
                ><i class="fa-brands fa-facebook-f fa-2x"></i
              ></a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-dark" href="#"
                ><i class="fa-brands fa-twitter fa-2x"></i
              ></a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-dark" href="#"
                ><i class="fa-brands fa-youtube fa-2x"></i
              ></a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-dark" href="#"
                ><i class="fa-brands fa-pinterest fa-2x"></i
              ></a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="col-md-1"></div>
  </div>
  <div class="row g-0 pb-4">
    <div class="col-md-2"></div>
    <div class="col-md-8">
      <div class="row g-0">
        <div class="col-md-2"></div>
        <div class="col-sm-12 col-md-8">
          <div class="d-flex flex-row justify-content-center flex-wrap">
            <div class="pt-2">
              <span class="">New Balance family of brands: </span>
            </div>
            <div class="p-1">
              <img
                src="../../../public/img/logo1.png"
                alt=""
                class="additional-logo"
              />
            </div>
            <div class="p-2">
              <img
                src="../../../public/img/logo2.png"
                alt=""
                class="additional-logo"
              />
            </div>
            <div class="p-2">
              <img
                src="../../../public/img/logo3.png"
                alt=""
                class="additional-logo1"
              />
            </div>
          </div>
        </div>
        <div class="col-md-2"></div>
      </div>
    </div>
    <div class="col-md-2"></div>
  </div>
  <div class="row g-0 pb-4">
    <div class="col-md-2"></div>
    <div class="col-sm-12 col-md-8">
      <div class="row g-0">
        <div class="col-md-12">
          <ul class="nav d-flex flex-row flex-wrap">
            <li class="nav-item">
              <a class="nav-link text-darkk text-small" href="#"
                ><i class="fa-solid fa-flag-usa"></i
              ></a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-dark text-small" href="#"
                >Privacy Policy</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link text-darkk text-small" href="#"
                >Website Terms & Conditions</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link text-darkk text-small" href="#"
                >CA Supply Chains Act (SB 657) and Modern Slavery Act
                Statement</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link text-darkk text-small" href="#"
                >Medical Plan Information</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link text-darkk text-small" href="#"
                >Do Not Sell My Personal Information</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link text-darkk text-small" href="#"
                >Copyright 2020, New Balance</a
              >
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="col-md-2"></div>
  </div>
</template>

<script>
import { reactive } from "vue";
import { signStore } from "./../store/signStore";

export default {
  setup() {
    const { storeSignUpUser } = signStore();

    const form = reactive({
      email: "",
    });

    const storeSignUp = async () => {
      let user_id = JSON.parse(localStorage.getItem("userId"));
      await storeSignUpUser({ ...form, user_id });
     target.reset();
    };

    return {
      form,
      storeSignUp,
    };
  },
};
</script>

<style scoped>
.sign-up-block {
  background-color: #000;
}
.btn-signup {
  border-radius: 0px !important;
  height: 58px;
  width: 100%;
  font-size: 14px;
  float: left;
  font-weight: bold;
  font-size:19px;
  padding-top: 15px;
}

@media screen and (max-width: 800px) {
  .btn-signup {
    border-radius: 0px !important;
    height: 58px;
    width: 100%;
    font-size: 14px;
    float: left;
    font-weight: bold;
    font-size:19px;
    padding-top: 15px;
  }
}


.logo {
  height: 80px;
  width: 100%;
}

.additional-logo {
  height: 30px;
  width: auto;
}

.additional-logo1 {
  height: 20px;
  width: auto;
}

.text-small {
  font-size: 10px;
  color: #000 !important;
}

.nav-link-footer {
  font-size: 14px;
}
.sign_up_email{
  width:600px;
}


@media screen and (max-width: 978px) {
  .sign_up_email{
    width:500px;
  }
}

@media screen and (max-width: 800px) {
  .sign_up_email{
    width:100%;
  }
}

@media screen and (max-width: 570px) {
  .sign_up_email{
    width:100%;
  }
}

</style>

