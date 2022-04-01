<template>
  <div>
    <input :id="id" :type="type" class="form-input-checkbox form-checkbox mt-0" @input="$emit('update:modelValue', $event.target.value)" />
    <label v-if="label" class="ml-2 cursor-pointer capitalize" :for="id">{{ label }}</label>
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
        return `checkbox-radio-input-${uuid()}`;
      },
    },
    type: {
      type: String,
      default: "checkbox",
    },
    error: String,
    label: String,
    modelValue: [String, Boolean, Number],
  },
  emits: ["update:modelValue"],
};
</script>
