<script setup name="VPageContainer">
const props = defineProps({
  title: String,
  summary: {
    type: String,
    default: null,
  },
});
</script>
<template>
  <div class="flex items-center flex-col sm:flex-row sm:justify-between">
    <slot name="left">
      <div>
        <h1 class="font-bold text-xl text-slate-700">{{ title }}</h1>
        <p v-show="summary" class="text-sm text-gray-500 mt-2.5">
          {{ summary }}
        </p>
      </div>
    </slot>

    <slot name="right" />
  </div>
  <div :class="$attrs.class">
    <slot />
  </div>
</template>
