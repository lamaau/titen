<script setup name="VStoreLayout">
import { watch } from "vue";
import Toast from "../packages/toast";

const props = defineProps({
  auth: Object,
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
  <v-app-head>
    <title>{{ title }}</title>
  </v-app-head>

  <!-- toast -->
  <v-toast-list />

  <div class="px-3 md:px-0">
    <div class="mx-auto mb-6 max-w-6xl">
      <h1
        class="font-primary text-palette-primary mt-4 py-2 text-center text-4xl font-extrabold leading-relaxed sm:py-4"
      >
        Get your template!
      </h1>
      <p class="mx-auto max-w-xl px-2 text-center text-base text-gray-600">
        Tersedia template gratis dan premium, silahkan dipilih!
      </p>
    </div>

    <slot />
  </div>
</template>
