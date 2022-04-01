<template>
  <div class="flex flex-col">
    <v-multi-select label="Select Role" v-model="form.role" :error="form.errors.role" :required="true" url="api/v1/role" />
  </div>
</template>
<script>
export default {
  data() {
    return {
      form: this.$inertia.form({
        role: null,
      }),
    };
  },
};
</script>