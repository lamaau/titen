<script setup name="VBreadcrumbs">
defineProps({
  lists: Object,
});
</script>
<template>
  <nav class="flex mb-5" aria-label="Breadcrumb">
    <ol class="inline-flex items-center">
      <li class="inline-flex items-center">
        <a href="#" class="text-gray-700 hover:text-gray-900 inline-flex items-center">
          <v-icon name="HomeIcon" type="outline" class="w-5 h-5" />
          <svg
            class="w-4 h-4 text-gray-400 mx-2"
            fill="currentColor"
            viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              fill-rule="evenodd"
              d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
              clip-rule="evenodd"
            ></path>
          </svg>
        </a>
        <a href="#" class="text-sm font-medium text-gray-700 hover:text-gray-900"> Beranda </a>
      </li>
      <li v-for="(list, index) in lists" :key="index">
        <div class="flex items-center">
          <svg
            class="w-4 h-4 text-gray-400 mx-2"
            fill="currentColor"
            viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              fill-rule="evenodd"
              d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
              clip-rule="evenodd"
            ></path>
          </svg>
          <a href="#" class="text-sm font-medium text-gray-700 hover:text-gray-900">
            {{ list.title }}
          </a>
        </div>
      </li>
    </ol>
  </nav>
</template>