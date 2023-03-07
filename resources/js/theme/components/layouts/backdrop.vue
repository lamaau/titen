<script setup name="VBackdrop">
defineProps({
  state: Boolean,
});
</script>
<template>
  <div
    class="bg-gray-900 opacity-50 fixed inset-0 z-10"
    :class="{ hidden: !state }"
  ></div>
</template>
