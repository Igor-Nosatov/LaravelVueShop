<template>
  <div class="row g-0 pt-5 pb-5">
    <div class="col-md-2"></div>
    <div class="col-12 col-md-4 p-1">
      <h6 class="fw-bold text-start">Log in</h6>
      <p class="text-danger text-start">*Denotes a required field</p>

      <form @submit.prevent="loginUser">
        <div class="mb-3 text-start">
          <label for="inputEmail1" class="form-label text-start"
            ><span class="required-input">*</span> Email address</label
          >
          <input
            type="email "
            class="form-control no-border" 
            id="inputEmail1"
            v-model="form.email"
          required/>
        </div>
        <div class="mb-3 text-start">
          <label for="inputPassword1" class="form-label text-start"
            ><span class="required-input">*</span> Password</label
          >
          <input
            type="password"
            class="form-control no-border"
            id="inputPassword1"
            v-model="form.password"
          required/>
        </div>
        <p class="text-start">
          By logging into my account, I agree to New Balance's
          <a href="" class="text-dark">Terms &</a>
        </p>
        <p class="text-start">
          <a href="" class="text-dark">Conditions</a> and
          <a href="" class="text-dark">Privacy Policy</a>
        </p>
        <button
          type="submit"
          class="btn btn-danger btn-lg d-flex flex-start no-border"
        >
          Login
        </button>
        <p class="text-start mt-2">
          Don't have an account?
          <router-link :to="{ name: 'register' }" class="text-dark">
            Create now</router-link
          >
        </p>
      </form>
    </div>
    <div class="col-md-6"></div>
  </div>
</template>

<script>
import { reactive } from "vue";
import { authStore } from "../../store/authStore";
import { useRouter } from "vue-router";

export default {
  setup() {
    const router = useRouter();

    const { loginCurrentUser } = authStore();

    const form = reactive({
      email: "",
      password: "",
    });

    const loginUser = async () => {
      await loginCurrentUser({ ...form });
      await router.push({ name: "home" });
      window.location.reload();
    };


    return {
      form,
      loginUser,
    };
  },
};
</script>

<style scoped>
.no-border {
  border-radius: 0px;
}
</style>