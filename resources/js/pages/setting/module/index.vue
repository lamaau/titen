<template>
  <div class="flex flex-row space-x-2">
    <button @click.prevent="install" class="btn-purple">Install Module</button>
    <button @click.prevent="upload" class="btn-purple">Upload Module</button>
  </div>
  <div class="mt-10">
    <div v-for="(module, index) in modules" :key="index">
      <span>{{ module }}</span>
    </div>
  </div>
</template>
<script>
export default {
  props: {
    modules: Object,
  },
  methods: {
    upload() {
      this.$modal.open({
        title: "Upload module",
        component: require("./upload.vue").default,
      });
    },
    install() {
      this.$modal.open({
        title: "Install module",
        component: require("./install.vue").default,
      });
    },
  },
};
</script>
