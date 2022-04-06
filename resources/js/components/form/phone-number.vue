<template>
  <div :class="$attrs.class">
    <label class="form-label mb-2 text-sm capitalize" :for="id">{{
      label
    }}</label>
    <div class="relative mt-1 text-gray-700">
      <div
        class="pointer-events-none absolute inset-y-0 left-0 flex items-center rounded-tl-md rounded-bl-md bg-gray-200 px-3"
        :class="{ ' border border-r-0 border-indigo-400': isFocus }"
      >
        <span class="text-gray-600 dark:text-cool-gray-200"> +62 </span>
      </div>
      <input
        :id="id"
        type="text"
        :value="modelValue"
        @focus="isFocus = true"
        @blur="isFocus = false"
        @keypress="handleKeyPressed"
        @input="$emit('update:modelValue', $event.target.value)"
        :class="[error ? 'border-red-500' : ' border-gray-300']"
        class="block w-full rounded border bg-white pl-[60px] pr-12 font-sans leading-normal text-gray-700 outline-none focus:border-indigo-400 focus:ring-0 dark:border-cool-gray-500 dark:bg-cool-gray-700 dark:text-cool-gray-300"
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
  data: () => ({
    isFocus: false,
  }),
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
  },
};
</script>
