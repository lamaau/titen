<template>
  <span
    class="rounded-md px-2 py-1 text-xs font-medium"
    :class="{ [`bg-${color}-200 text-${color}-700`]: true }"
    >{{ value }}</span
  >
</template>
<script>
export default {
  props: ["value", "color"],
};
</script>
