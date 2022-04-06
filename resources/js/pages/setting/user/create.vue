<template>
  <v-form-container title="New user">
    <v-multi-select
      label="Select Role"
      v-model="form.role"
      :error="form.errors.role"
      :required="true"
      url="api/v1/role"
    />
  </v-form-container>
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
