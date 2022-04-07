<template>
  <div>
    <v-form-container
      title="New Post"
      @onCancel="$inertia.visit('/post')"
      @onSubmit="update"
      cancel-text="Back"
      submit-text="Update"
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
  props: {
    post: Object,
  },
  data() {
    return {
      form: this.$inertia.form({
        title: this.post.title,
        slug: this.post.slug,
        content: this.post.content,
      }),
    };
  },
  methods: {
    update() {
      this.form.put(`/post/${this.post.id}`, {
        //
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
