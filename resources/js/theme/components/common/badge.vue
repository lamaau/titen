<template>
  <span
    class="px-1 py-0.5 rounded-md text-[11.5px]"
    :class="colors[props.color]"
  >
    {{ props.value }}
  </span>
</template>
<script setup name="VBadge">
import { reactive } from "vue";

const props = defineProps({
  value: null,
  color: null,
});

const colors = reactive({
  red: "bg-red-500 text-red-200",
  green: "bg-green-500 text-green-200",
  yellow: "bg-yellow-400 text-yellow-200",
  orange: "bg-orange-500 text-orange-200",
  purple: "bg-purple-500 text-purple-200",
  blue: "bg-blue-500 text-blue-200",
  indigo: "bg-indigo-500 text-indigo-200",
});
</script>
