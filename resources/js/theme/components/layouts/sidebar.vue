<script setup name="VSidebar">
defineProps({
  user: Object,
  state: Boolean,
  navigators: String,
});
</script>
<template>
  <div class="relative">
    <aside
      id="sidebar"
      class="w-60 z-20 fixed left-0 h-full lg:flex duration-75 transition-width flex-shrink-0 flex-col"
      :class="{ flex: state, hidden: !state }"
    >
      <div class="flex-1 flex flex-col pb-4 overflow-y-auto scrollbar">
        <div class="flex-1 px-3 bg-white border-r pt-4 divide-y space-y-1">
          <div class="flex flex-col md:relative h-full overflow-auto mb-20">
            <v-navigator :user="user" :navigators="navigators" />
          </div>
        </div>
      </div>
    </aside>

    <v-backdrop :state="state" />
  </div>
</template>
