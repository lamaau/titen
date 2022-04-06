<template>
  <div>
    <v-form-container
      :title="title"
      @onCancel="$modal.close()"
      @onSubmit="update"
      submit-text="Update"
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
  props: {
    title: String,
    category: Object,
  },
  data() {        
    return {
      form: this.$inertia.form({
        name: this.category.name,
        description: this.category.description,
      }),
    };
  },
  methods: {
    update() {
      this.form.put(`category/${this.category.id}`, {
        onSuccess: () => {
          this.$modal.close();
        },
      });
    },
  },
};
</script>
