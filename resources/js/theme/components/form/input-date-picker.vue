<script setup name="VInputDatePicker">
import { ref, watch } from "vue";
import { formatDate } from "../../utils/helpers";

const props = defineProps({
  label: {
    type: String,
    default: null,
  },
  required: {
    type: Boolean,
    default: false,
  },
  error: String,
  disabled: {
    type: Boolean,
    default: false,
  },
  modelValue: [String, Object],
  closeButtonClasses: {
    type: String,
  },
});

const emit = defineEmits(["update:modelValue"]);

const selected = ref(null);

watch(
  () => selected.value,
  (value) => {
    emit("update:modelValue", value);
  },
);
</script>
<template>
  <div class="relative" :class="$attrs.class">
    <button
      v-show="selected"
      @click.prevent="selected = null"
      class="absolute right-2 rounded focus:bg-gray-100"
      :class="[
        closeButtonClasses
          ? closeButtonClasses
          : 'absolute right-2 top-9 rounded focus:bg-gray-100',
      ]"
    >
      <v-icon name="XMarkIcon" class="h-6 w-6" />
    </button>
    <v-date-picker
      v-model="selected"
      v-bind="{ ...$attrs, class: null }"
      :disabled="disabled"
    >
      <template #trigger>
        <div>
          <label
            v-if="label"
            class="mb-1 block text-sm font-medium text-slate-700"
          >
            {{ label }}
            <span v-show="required" class="text-red-500">*</span>
          </label>
          <button
            :disabled="disabled"
            :class="{ 'border border-red-500': error }"
            class="flex w-full flex-row items-center rounded border border-gray-300 bg-gray-50 p-2.5 text-gray-900 focus:border-gray-600 focus:ring-1 focus:ring-gray-600 disabled:cursor-not-allowed disabled:bg-gray-200 sm:text-sm"
          >
            <v-icon name="CalendarIcon" class="mr-2 h-5 w-5" type="outline" />
            <span class="mt-1">{{ modelValue ? modelValue : null }}</span>
          </button>
          <span v-if="error" class="mt-1 text-sm text-red-500">{{
            error
          }}</span>
        </div>
      </template>
    </v-date-picker>
  </div>
</template>
