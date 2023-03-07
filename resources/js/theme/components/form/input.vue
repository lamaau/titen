<template>
  <div :class="$attrs.class">
    <label
      v-if="label"
      class="text-sm font-medium text-slate-700 block mb-1"
      :for="id"
    >
      {{ label }}
      <span v-show="required" class="text-red-500">*</span>
    </label>
    <input
      :id="id"
      ref="input"
      :type="type"
      @input="handleInput"
      @keypress="handleKeyPressed"
      v-bind="{
        ...$attrs,
        class: null,
        value: type !== 'file' ? modelValue : null,
      }"
      :class="{
        'border-red-500 border focus:border-red-500 focus:outline-none focus:ring-0':
          error,
      }"
      class="p-2.5 block w-full rounded sm:text-sm bg-gray-50 text-gray-900 border border-gray-300 focus:ring-gray-600 focus:border-gray-600 disabled:cursor-not-allowed disabled:bg-gray-200"
    />
    <div v-if="error" class="text-red-500 text-sm mt-1">{{ error }}</div>
  </div>
</template>

<script>
import { v4 as uuid } from "uuid";

export default {
  name: "VInput",
  inheritAttrs: false,
  props: {
    id: {
      type: String,
      default() {
        return `text-input-${uuid()}`;
      },
    },
    type: {
      type: String,
      default: "text",
    },
    error: String,
    label: String,
    number: {
      type: Boolean,
      default: false,
    },
    required: {
      type: Boolean,
      default: false,
    },
    modelValue: [String, Number, Date, Boolean],
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
    handleKeyPressed(evt) {
      if (this.number) {
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
      }
    },
    handleInput(event) {
      if (this.type === "file") {
        this.$emit("update:modelValue", event);
      } else {
        if (this.number) {
          this.$emit("update:modelValue", this.formating(event.target.value));
        } else {
          this.$emit("update:modelValue", event.target.value);
        }
      }
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
