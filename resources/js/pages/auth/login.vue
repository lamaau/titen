<template>
  <v-app-head title="Login" />

  <div class="relative bg-gray-200">
    <div class="flex min-h-screen items-center justify-center">
      <div class="w-full max-w-md rounded-md bg-white shadow-md">
        <form class="mt-8 overflow-hidden rounded-lg shadow-xl" @submit.prevent="login">
          <div class="flex flex-col items-center justify-center">
            <v-icon name="LockClosedIcon" type="outline" class="h-12 w-12" />
            <h1 class="mt-4 text-xl font-bold">Login Ke Akun Anda</h1>
          </div>
          <div class="px-10 pb-4">
            <div class="mx-auto mt-6 w-24 border-b-4 border-b-purple-500" />
            <v-text v-model="form.email" :error="form.errors.email" class="mt-10" label="Email" type="email" autofocus autocapitalize="off" />
            <v-text v-model="form.password" :error="form.errors.password" class="mt-6" label="Password" type="password" />
            <label class="mt-6 flex select-none items-center" for="remember">
              <input id="remember" v-model="form.remember" class="form-input-checkbox form-checkbox" type="checkbox" />
              <span class="ml-2 mt-1 text-sm">Ingat saya?</span>
            </label>
          </div>
          <div class="flex border-t border-gray-100 bg-gray-100 px-10 py-4">
            <v-loading-button :loading="form.processing" class="btn-purple ml-auto" type="submit">Login</v-loading-button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      form: this.$inertia.form({
        email: "admin@mail.com",
        password: "secret123",
        remember: false,
      }),
    };
  },
  methods: {
    login() {
      this.form.post("/auth/login");
    },
  },
};
</script>
