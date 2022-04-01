<template>
  <nav class="hidden flex-1 overflow-y-auto bg-purple-600 py-6 dark:bg-cool-gray-700 md:block">
    <ul class="space-y-2 px-6" v-for="(baseNav, index) in JSON.parse(navigator)" :key="index">
      <p v-if="baseNav.subItems.length" class="text-xs font-bold uppercase tracking-wider text-gray-50">
        {{ baseNav.name }}
      </p>

      <template v-if="baseNav.subItems">
        <li v-for="(nav, i) in baseNav.subItems" :key="i">
          <v-app-link
            :href="nav.url"
            :class="{ 'bg-purple-700 dark:bg-cool-gray-800': isUrl(nav.url.slice(1)) }"
            class="flex items-center gap-2 rounded-lg py-2 px-2 font-medium text-white transition hover:bg-purple-700 focus:bg-purple-700 focus:outline-none dark:text-cool-gray-200 dark:hover:bg-cool-gray-800 dark:focus:bg-cool-gray-800"
          >
            <v-icon :name="nav.heroicon" :type="nav.icon" class="h-4 w-4" />
            <span class="text-sm"> {{ nav.name }} </span>
          </v-app-link>
        </li>
      </template>
      <template v-if="baseNav && baseNav.subItems">
        <li v-if="baseNav.heroicon || baseNav.icon">
          <v-app-link
            :href="baseNav.url"
            :class="{ 'bg-purple-700 dark:bg-cool-gray-800': isUrl(nav.url.slice(1)) }"
            class="my-3 flex items-center gap-2 rounded-lg py-2 px-2 font-medium text-white transition hover:bg-purple-700 focus:bg-purple-700 focus:outline-none dark:text-cool-gray-200 dark:hover:bg-cool-gray-800 dark:focus:bg-cool-gray-800"
          >
            <v-icon :name="baseNav.heroicon" :type="baseNav.icon" class="h-4 w-4" />
            <span class="text-sm"> {{ baseNav.name }} </span>
          </v-app-link>
        </li>
      </template>

      <li class="pt-3 pb-6" v-if="baseNav.subItems.length && index != navigator.length - 1">
        <hr class="border-purple-700 dark:border-cool-gray-800" />
      </li>
    </ul>
  </nav>
</template>

<script>
export default {
  props: {
    navigator: String,
  },
  methods: {
    isUrl(...urls) {
      let currentUrl = this.$page.url.substr(1);
      if (urls[0] === "") {
        return currentUrl === "";
      }

      return urls.filter((url) => currentUrl.startsWith(url)).length;
    },
  },
};
</script>
