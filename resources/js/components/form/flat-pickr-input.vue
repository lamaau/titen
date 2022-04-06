<template>
  <div>
    <label v-if="label" class="form-label mb-2 text-sm capitalize">{{
      label
    }}</label>
    <VueFlatpickr
      :config="config"
      v-bind="{ ...$attrs, class: null }"
      :class="{ 'border-red-500': error }"
      class="form-input dark:border-cool-gray-500 dark:bg-cool-gray-700 dark:text-cool-gray-300"
    />
    <div v-if="error" class="form-error">{{ error }}</div>
  </div>
</template>
<script>
import { format } from "date-fns";
import VueFlatpickr from "vue-flatpickr-component";
import "flatpickr/dist/flatpickr.css";
import { Indonesian } from "flatpickr/dist/l10n/id.js";

export default {
  inheritAttrs: false,
  components: {
    VueFlatpickr,
  },
  props: {
    label: {
      type: String,
      default: null,
    },
    // modelValue: [String, Date],
    error: String,
  },
  // emits: ["update:modelValue"],
  data: () => ({
    config: {
      wrap: true,
      dateFormat: "d F Y",
      locale: Indonesian,
    },
  }),
};
</script>
