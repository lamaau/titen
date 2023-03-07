<script setup name="VGuestLayout" lang="ts">
defineProps<{
  title: string;
  flash: object;
}>();
</script>
<template>
  <v-app-head :title="title" />
  <div>
    <slot />
  </div>
</template>
