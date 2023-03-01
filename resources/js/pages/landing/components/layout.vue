<script lang="ts" setup>
import { Head } from "@inertiajs/inertia-vue3";
import Header from "./header.vue";
import Footer from "./footer.vue";

defineProps<{
  title: string;
}>();
</script>

<template>
  <Head :title="title" />

  <div class="min-h-screen bg-white dark:bg-gray-900">
    <Header />
    <slot />
    <Footer />
  </div>
</template>
