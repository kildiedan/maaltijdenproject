<template>
  <div class="row">
    <form @submit.prevent="submit">
      <div class="mb-3 row">
        <label for="inputFirstName" class="col-sm-2 col-form-label"
          >username</label
        >
        <div class="col-sm-10">
          <input
            id="inputFirstName"
            v-model="auth.name"
            type="text"
            class="form-control"
          />
        </div>
      </div>
      <div class="mb-3 row">
        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
          <input
            id="inputEmail"
            v-model="auth.email"
            type="text"
            class="form-control"
          />
        </div>
      </div>
      <div class="mb-3 row">
        <label for="inputPassword" class="col-sm-2 col-form-label"
          >Password</label
        >
        <div class="col-sm-10">
          <input
            id="inputPassword"
            v-model="auth.password"
            type="password"
            class="form-control"
          />
        </div>
      </div>
      <div class="mb-3 row">
        <label for="inputPasswordConfirmation" class="col-sm-2 col-form-label"
          >Password</label
        >
        <div class="col-sm-10">
          <input
            id="inputPasswordConfirmation"
            v-model="auth.password_confirmation"
            type="password"
            class="form-control"
          />
        </div>
      </div>
      <button type="button" class="btn btn-primary" @click="register">
        Register
      </button>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      auth: {
        name: "",
        email: "",
        password: "",
        password_confirmation: "",
      },
    };
  },
  methods: {
    register() {
      this.$store.dispatch("account/register", this.auth);
      this.$router.push("/");
    },
  },
};
</script>
