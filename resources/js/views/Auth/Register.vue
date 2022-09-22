<template>
  <div class="row g-0 pt-5 pb-5">
    <div class="col-md-2"></div>
    <div class="col-md-4 p-1">
      <h6 class="fw-bold text-start">Create account</h6>
      <p class="text-danger text-start">*Denotes a required field</p>

      <form @submit.prevent="registerUser">
        <div class="mb-3 text-start">
          <label for="inputFirstName" class="form-label text-start">
            <span class="required-input">*</span> First Name</label
          >
          <input
            type="text"
            class="form-control no-border"
            id="inputFirstName"
            v-model="form.first_name"
            required
          />
        </div>

        <div class="mb-3 text-start">
          <label for="inputLastName" class="form-label text-start"
            ><span class="required-input">*</span> Last Name</label
          >
          <input
            type="text"
            class="form-control no-border"
            id="inputLastName"
            v-model="form.last_name"
            required
          />
        </div>

        <div class="mb-3 text-start">
          <label for="inputEmail1" class="form-label text-start"
            ><span class="required-input">*</span> Email address</label
          >
          <input
            type="email"
            class="form-control no-border"
            id="inputEmail1"
            v-model="form.email"
            required
          />
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
            required
          />
        </div>
        <div class="d-flex title-password-requirements text-start">
          <small class="title-password-requirements text-start"
            >Password requirements:</small
          >
        </div>

        <ul class="password-requirements text-start">
          <li>Minimum 8 characters</li>
          <li>At least one capital letter</li>
          <li>At least one number</li>
          <li>At least one special character (! @ # $ % &)</li>
        </ul>

        <button
          type="submit"
          class="btn btn-danger btn-lg d-flex flex-start no-border"
        >
          Create Account
        </button>
        <p class="text-start mt-2">
          Already have an account?<router-link
            :to="{ name: 'login' }"
            class="text-dark"
          >
            Log in</router-link
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
    const { registerNewUser } = authStore();

    const form = reactive({
      first_name: "",
      last_name: "",
      email: "",
      password: "",
    });

    const registerUser = async () => {
      await registerNewUser({ ...form });
      await router.push({ name: "home" });
      window.location.reload();
    };

    return {
      form,
      registerUser,
    };
  },
};
</script>

<style scoped>
.title-password-requirements {
  font-size: 14px !important;
  text-align: start;
}
.password-requirements {
  list-style-type: square;
  font-size: 10px;
}

.no-border {
  border-radius: 0px;
}
</style>
