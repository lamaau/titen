<script setup name="VClickInput">
import { ref, watch } from "vue";

const props = defineProps({
  value: [String, Number],
  key: [String],
  inputType: {
    default: "text",
  },
});

const showInput = ref(false);
const inputElement = ref(null);
const inputValue = ref(props.value);

watch(
  () => props.value,
  (newValue) => {
    inputValue.value = newValue;
  },
);

const emit = defineEmits(["changed"]);

function handleClick() {
  showInput.value = true;
  setTimeout(() => {
    inputElement.value.focus();
  }, 200);
}

function handleBlur() {
  showInput.value = false;
  emit("changed", { key: props.key, value: inputValue.value });
}
</script>
<template>
  <div class="hover:cursor-text" @click="handleClick">
    <div :class="{ hidden: showInput }">
      <slot />
    </div>

    <input :type="inputType" ref="inputElement" @blur="handleBlur" v-model="inputValue" @keypress.enter="handleBlur" class="border w-max border-gray focus:ring focus:outline-none focus:ring-gray-500" :class="`${showInput ? 'block' : 'hidden'}`" />
  </div>
</template>
