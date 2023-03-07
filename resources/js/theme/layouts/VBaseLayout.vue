<script setup name="VBaseLayout">
import { watch } from "vue";
import Toast from "../packages/toast/toast";

const props = defineProps({
  title: String,
  flash: Object,
});

watch(
  () => props.flash,
  (payload) => {
    if (payload) {
      if (payload.success) {
        if (typeof payload.success == "object") {
          Toast.success(payload.success);
        } else {
          Toast.success({ title: payload.success });
        }
      }

      if (payload.error) {
        if (typeof payload.error == "object") {
          Toast.error(payload.error);
        } else {
          Toast.error({ title: payload.error });
        }
      }
    }
  },
  { deep: true },
);
</script>
<template>
  <v-app-head :title="title" />
  <div>
    <v-toast-list />
    <slot />
  </div>
</template>
