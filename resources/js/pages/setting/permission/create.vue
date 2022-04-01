<template>
  <form @submit.prevent="submit" class="flex flex-col space-y-4">
    <v-text :required="true" label="Permission Name" v-model="form.name" :error="form.errors.name" />
    <v-text label="Display Name" v-model="form.display_name" :error="form.errors.display_name" />
    <v-select :required="true" label="Guard" v-model="form.guard" :error="form.errors.guard">
      <option value="web">web</option>
      <option value="api">api</option>
    </v-select>
    <div class="flex flex-row items-center space-x-2 ml-auto">
      <button type="button" class="btn-purple">Cancel</button>
      <button type="submit" class="btn-purple">Save</button>
    </div>
  </form>
</template>
<script>
export default {
  data() {
    return {
      form: this.$inertia.form({
        name: null,
        guard: null,
        display_name: null,
      }),
    };
  },
  methods: {
    submit() {
      this.form.post("/setting/role/permission", {
        onSuccess: () => {
          this.$refs.create.closeModal();
          this.$toast.success("Successfully create new permission");
        },
      });
    },
  },
};
</script>