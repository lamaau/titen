<template>
 <div :class="$attrs.class">
  <label v-if="label" class="text-sm font-medium text-slate-700 block mb-1" :for="id">
   {{ label }}
   <span v-show="required" class="text-red-500">*</span>
  </label>
  <textarea
   :id="id"
   ref="textarea"
   :value="modelValue"
   v-bind="{ ...$attrs, class: null }"
   @input="$emit('update:modelValue', $event.target.value)"
   :class="{ 'border-red-500 dark:border-red-500': error }"
   class="p-2.5 block w-full sm:text-sm rounded bg-gray-50 text-gray-900 border border-gray-300 focus:ring-gray-600 focus:border-gray-600 disabled:cursor-not-allowed disabled:bg-gray-200"
  />
  <div v-if="error" class="text-red-500 text-sm mt-1">{{ error }}</div>
 </div>
</template>

<script>
import { v4 as uuid } from "uuid";

export default {
 name: "VTextarea",
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
  modelValue: String,
  required: {
   type: Boolean,
   default: false,
  },
 },
 emits: ["update:modelValue"],
 methods: {
  focus() {
   this.$refs.input.focus();
  },
  select() {
   this.$refs.input.select();
  },
  setSelectionRange(start, end) {
   this.$refs.input.setSelectionRange(start, end);
  },
 },
};
</script>
