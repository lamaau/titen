<template>
  <div>
    <v-form-container
      title="New Category"
      @onCancel="$modal.close()"
      @onSubmit="save"
    >
      <div class="flex flex-col space-y-4">
        <v-text
          v-model="form.name"
          :error="form.errors.name"
          label="Category Name"
          :required="true"
        />
        <v-textarea
          v-model="form.description"
          :error="form.errors.description"
          label="Description"
        />
      </div>
    </v-form-container>
  </div>
</template>
<script>
export default {
  data() {
    return {
      form: this.$inertia.form({
        name: null,
        description: null,
      }),
    };
  },
  methods: {
    save() {
      this.form.post(`category`, {
        onSuccess: () => {
          this.form.reset();
          this.$modal.close();
        },
      });
    },
  },
};
</script>
