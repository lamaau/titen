<template>
  <div v-if="links.length > 3">
    <div class="-mb-1 flex flex-wrap">
      <template v-for="(link, key) in links">
        <div
          v-if="link.url === null"
          :key="key"
          class="dark:border-cool-gray-400 mb-1 mr-1 rounded border px-4 py-3 text-sm leading-4 text-gray-400"
          v-html="link.label"
        />
        <v-app-link
          v-else
          :key="`link-${key}`"
          class="dark:border-cool-gray-400 dark:hover:bg-cool-gray-500 dark:hover:text-cool-gray-50 mb-1 mr-1 rounded border px-4 py-3 text-sm leading-4 text-gray-700 hover:bg-white focus:border-purple-500 focus:text-purple-500 dark:text-white"
          :class="{
            'dark:bg-cool-gray-400 border-purple-500 dark:text-white':
              link.active,
          }"
          :href="link.url"
          v-html="link.label"
        />
      </template>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    links: Array,
  },
};
</script>
