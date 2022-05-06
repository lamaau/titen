<template>
  <div :class="$attrs.class">
    <label class="form-label mb-2 text-sm capitalize" :for="id">{{
      label
    }}</label>
    <div class="relative mt-1 text-gray-700">
      <div
        class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3"
      >
        <span class="dark:text-cool-gray-200 text-gray-600"> Rp </span>
      </div>
      <input
        :id="id"
        type="text"
        :value="modelValue"
        @input="handleInput"
        @keypress="handleKeyPressed"
        :class="[error ? 'border-red-500' : ' border-gray-300']"
        class="dark:border-cool-gray-500 dark:bg-cool-gray-700 dark:text-cool-gray-300 block w-full rounded border bg-white p-2 pl-9 pr-12 font-sans leading-normal text-gray-700 outline-none focus:border-indigo-400 focus:ring-0"
      />
    </div>
    <div v-if="error" class="form-error">{{ error }}</div>
  </div>
</template>

<script>
import { v4 as uuid } from "uuid";

export default {
  inheritAttrs: false,
  props: {
    id: {
      type: String,
      default() {
        return `text-input-${uuid()}`;
      },
    },
    error: String,
    label: String,
    modelValue: [String, Number],
  },
  emits: ["update:modelValue"],
  mounted() {
    if (this.modelValue) {
      this.$emit("update:modelValue", this.formating(this.modelValue));
    }
  },
  methods: {
    handleKeyPressed(evt) {
      evt = evt ? evt : window.event;
      var charCode = evt.which ? evt.which : evt.keyCode;
      if (
        charCode > 31 &&
        (charCode < 48 || charCode > 57) &&
        charCode !== 46
      ) {
        evt.preventDefault();
      } else {
        return true;
      }
    },
    handleInput(event) {
      this.$emit("update:modelValue", this.formating(event.target.value));
    },
    formating(value) {
      return value
        .toString()
        .replace(/\D/g, "")
        .replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    },
  },
};
</script>
