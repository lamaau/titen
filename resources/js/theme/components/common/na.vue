<template>
  <span
    :class="{
      'text-gray-400': value == 'N/A' || value == null || value == '',
    }"
  >
    {{ value == null || value == "" ? "N/A" : value }}
  </span>
</template>
<script setup name="VNa">
const props = defineProps({
  value: [String, Number],
});
</script>