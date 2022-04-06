<template>
  <div>
    <label v-if="label" class="form-label mb-1 text-sm capitalize">
      {{ label }} <span v-if="required" class="text-xs text-red-500">*</span>
    </label>

    <Multiselect
      ref="selectInput"
      v-bind="{ ...$attrs }"
      :object="true"
      @open="handleOpen"
      @close="handleClose"
      :options="options"
      :searchable="true"
      v-model="modelValue"
      :filter-results="false"
      @select="handleSelect"
      @search-change="handleSearch"
      no-options-text="Tidak ada piilhan"
      :class="[
        error ? 'border-red-500' : 'border-gray-300 dark:border-cool-gray-500',
      ]"
      :classes="{
        container:
          'relative p-2 leading-normal mt-2 focus:ring-0 outline-none block w-full border text-gray-500 bg-white font-sans rounded text-left appearance-none relative focus:border-indigo-400',
        containerActive: 'ring-0',
        search:
          'w-full absolute inset-0 appearance-none text-base font-sans bg-white rounded pl-3.5 border-none ring-0 dark:bg-cool-gray-700 dark:border-cool-gray-500 dark:text-cool-gray-300',
        clear: 'absolute right-3 top-[12px] cursor-pointer',
        optionSelected: 'text-white bg-purple-500',
        optionDisabled: 'text-gray-300 cursor-not-allowed',
        optionSelectedPointed: 'text-white bg-purple-500',
        optionSelectedDisabled:
          'text-purple-100 bg-purple-500 bg-opacity-50 cursor-not-allowed',
        noOptions: 'py-2 px-3 text-gray-600 bg-white text-left',
        noResults: 'py-2 px-3 text-gray-600 bg-white text-left',
        singleLabelText:
          'overflow-ellipsis overflow-hidden block text-gray-700 whitespace-nowrap max-w-full dark:text-cool-gray-300',
      }"
    >
      <template #clear>
        <span
          class="absolute right-3 top-[12px] cursor-pointer"
          @click.prevent="handleClear"
        >
          <v-icon name="XIcon" type="solid" class="h-4 w-4" />
        </span>
      </template>

      <template #singlelabel="{ value }">
        <slot name="singlelabel" :value="value" />
      </template>

      <template #option="{ option }">
        <slot name="option" :option="option" />
      </template>
    </Multiselect>
    <div v-if="error" class="form-error">
      {{ error }}
    </div>
  </div>
</template>
<style>
/* option list display between */
.multiselect-option {
  align-items: unset !important;
  justify-content: space-between !important;
}
</style>
<script>
import axios from "axios";
import { throttle } from "lodash";
import Multiselect from "@vueform/multiselect";

export default {
  components: {
    Multiselect,
  },
  props: {
    error: {
      type: String,
      required: false,
      default: null,
    },
    label: {
      type: String,
      required: false,
      default: null,
    },
    url: {
      type: String,
      required: true,
    },
    required: {
      type: Boolean,
      default: () => false,
    },
    modelValue: {
      type: Object,
    },
  },
  emits: ["update:modelValue", "clear"],
  data() {
    return {
      options: [],
      selected: this.modelValue,
    };
  },
  methods: {
    handleOpen() {
      if (this.modelValue) {
        this.$emit("update:modelValue", this.modelValue);
      } else {
        this.$emit("update:modelValue", null);
      }
    },
    handleClose() {
      if (this.selected) {
        this.$emit("update:modelValue", this.selected);
      }
    },
    handleSelect(value) {
      this.$refs.selectInput.close();

      const input = this.$refs.selectInput.$el.getElementsByTagName("input")[0];
      input && input.focus();

      let selected = this.options.find(
        (v) => v.label.toLowerCase() == value.label.toLowerCase(),
      );
      this.selected = selected == undefined ? value : selected;
    },
    handleClear() {
      this.selected = null;
      this.$emit("update:modelValue", null);

      this.$emit("clear");
      this.$refs.selectInput.close();
    },
    handleSearch: throttle(async function (value) {
      if (!this.$refs.selectInput.open()) {
        this.$refs.selectInput.open();
      }

      if (value.length >= 1) {
        if (this.modelValue) {
          this.$emit("update:modelValue", null);
        }

        const { data } = await axios.get(
          `/${this.url}?search=${encodeURIComponent(value)}`,
        );

        this.options = data;
      }
    }, 500),
  },
};
</script>
