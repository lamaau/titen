<template>
  <v-inertable
    :allow-filter="false"
    :filters="inertable.filters"
    :data="inertable.data"
    :columns="inertable.columns"
  >
    <template #attributes>
      <v-app-link
        href="/setting/user/create"
        class="btn-purple focus:ring-2 focus:ring-purple-600 focus:ring-offset-2"
      >
        New User
      </v-app-link>
    </template>
    <template #role="{ item }">
      <span
        class="rounded-md bg-purple-200 px-2 py-1 text-xs font-medium text-purple-700"
        >{{ item.role }}</span
      >
    </template>
    <template #last_logged_in_at="{ item: { last_logged_in_at } }">
      <v-nullable :value="$helper.shortTimestamp(last_logged_in_at)" />
    </template>
    <template #created_at="{ item: { created_at } }">
      <span>{{ $helper.formatDate(created_at) }}</span>
    </template>
    <template #action>
      <div class="flex space-x-2">
        <button
          class="rounded-md bg-yellow-400 p-2 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:ring-offset-2"
        >
          <v-icon name="PencilIcon" type="solid" class="h-3 w-3 text-white" />
        </button>
        <button
          type="button"
          class="rounded-md bg-red-500 p-2 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2"
        >
          <v-icon name="TrashIcon" type="solid" class="h-3 w-3 text-white" />
        </button>
      </div>
    </template>
  </v-inertable>
</template>
<script>
export default {
  props: {
    inertable: Object,
  },
};
</script>
