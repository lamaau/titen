<template>
  <div :class="$attrs.class">
    <label
      v-if="label"
      class="form-label mb-1 text-sm capitalize dark:text-cool-gray-200"
      :for="id"
    >
      {{ label }} <span v-if="required" class="text-xs text-red-500">*</span>
    </label>

    <textarea
      :id="id"
      ref="textarea"
      :value="modelValue"
      :class="{ error: error }"
      v-bind="{ ...$attrs, class: null }"
      @input="$emit('update:modelValue', $event.target.value)"
      class="form-input dark:border-cool-gray-500 dark:bg-cool-gray-700 dark:text-cool-gray-300"
    />
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
    required: {
      type: Boolean,
      default: () => false,
    },
    modelValue: String,
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
