<template>
  <v-form-container title="New role" @onSubmit="submit">
    <form @submit.prevent="submit" class="flex flex-col space-y-4">
      <v-text :required="true" label="Role Name" v-model="form.name" :error="form.errors.name" />
      <v-select :required="true" label="Guard" v-model="form.guard" :error="form.errors.guard">
        <option value="web">web</option>
        <option value="api">api</option>
      </v-select>
    </form>
  </v-form-container>
</template>
<script>
export default {
  data() {
    return {
      form: this.$inertia.form({
        name: null,
        guard: null,
      }),
    };
  },
  methods: {
    submit() {
      this.form.post("/setting/role", {
        onSuccess: () => {
          this.$refs.create.closeModal();
          this.$toast.success("Successfully create new role");
        },
      });
    },
  },
};
</script>