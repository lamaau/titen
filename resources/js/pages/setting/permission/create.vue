<template>
  <form @submit.prevent="submit" class="flex flex-col space-y-4 p-4">
    <v-text
      :required="true"
      label="Permission Name"
      v-model="form.name"
      :error="form.errors.name"
    />
    <v-select
      :required="true"
      label="Guard"
      v-model="form.guard"
      :error="form.errors.guard"
    >
      <option value="web">web</option>
      <option value="api">api</option>
    </v-select>
    <v-textarea
      label="Description"
      v-model="form.description"
      :error="form.errors.description"
    />
    <div class="ml-auto flex flex-row items-center space-x-2">
      <button @click.prevent="$modal.close()" type="button" class="btn-purple">
        Cancel
      </button>
      <v-loading-button :loading="form.processing" class="btn-purple"
        >Save</v-loading-button
      >
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
        description: null,
      }),
    };
  },
  methods: {
    submit() {
      this.form.post("/setting/role/permission", {
        onSuccess: () => {
          this.$modal.close();
          this.$toast.success("Successfully create new permission");
        },
      });
    },
  },
};
</script>
