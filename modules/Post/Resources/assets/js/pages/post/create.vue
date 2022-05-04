<template>
  <div>
    <v-form-container
      title="New Post"
      @onCancel="$inertia.visit('/post')"
      @onSubmit="save"
      cancel-text="Back"
    >
      <div class="flex flex-col space-y-4">
        <v-text
          label="Title"
          :required="true"
          v-model="form.title"
          :error="form.errors.title"
        />
        <v-text
          label="Slug"
          :required="true"
          v-model="form.slug"
          :error="form.errors.slug"
        />
        <v-multi-select
          label="Category"
          :required="true"
          :create-option="true"
          url="select/category"
          v-model="form.category"
          :error="form.errors.category"
        />
        <v-textarea
          label="Content"
          :required="true"
          v-model="form.content"
          :error="form.errors.content"
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
        title: null,
        slug: null,
        category: null,
        content: null,
      }),
    };
  },
  methods: {
    save() {
      this.form.post(`/post`, {
        onSuccess: () => this.form.reset(),
      });
    },
  },
  watch: {
    "form.title": {
      handler: function (value) {
        if (value) {
          this.form.slug = this.$helper.convertToSlug(value);
        }
      },
    },
  },
};
</script>
