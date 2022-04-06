<template>
  <div class="flex flex-col space-y-4 p-4">
    <input type="file" @input="handleFileSelected" />
    <button @click.prevent="upload" class="btn-purple">Upload</button>
  </div>
</template>
<script>
export default {
  data() {
    return {
      form: this.$inertia.form({
        file: null,
      }),
    };
  },
  methods: {
    handleFileSelected(event) {
      this.form.file = event.target.files[0];
    },
    upload() {
      this.form.post("/setting/module/upload");
    },
  },
};
</script>
