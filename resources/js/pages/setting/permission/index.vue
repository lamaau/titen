<template>
  <v-inertable :allow-filter="false" :filters="inertable.filters" :data="inertable.data" :columns="inertable.columns">
    <template #attributes>
      <button @click.prevent="$refs.create.openModal()" type="button" class="btn-purple focus:ring-2 focus:ring-purple-600 focus:ring-offset-2">New Permission</button>
    </template>
    <template #role="{ item }">
      <span class="rounded-md bg-purple-200 px-2 py-1 text-xs font-medium text-purple-700">{{ item.role }}</span>
    </template>
    <template #last_logged_in_at="{ item: { last_logged_in_at } }">
      <not-available :value="$helper.shortTimestamp(last_logged_in_at)" />
    </template>
    <template #created_at="{ item: { created_at } }">
      <span>{{ $helper.formatDate(created_at) }}</span>
    </template>
    <template #action>
      <div class="flex space-x-2">
        <button class="rounded-md bg-yellow-400 p-2 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:ring-offset-2">
          <v-icon name="PencilIcon" type="solid" class="h-3 w-3 text-white" />
        </button>
        <button type="button" class="rounded-md bg-red-500 p-2 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
          <v-icon name="TrashIcon" type="solid" class="h-3 w-3 text-white" />
        </button>
      </div>
    </template>
  </v-inertable>
  <v-modal ref="create">
    <template #content>
      <div class="p-4">
        <create />
      </div>
    </template>
  </v-modal>
</template>
<script>
import create from "./create.vue";
import notAvailable from "~/components/table/not-available.vue";

export default {
  components: {
    create,
    notAvailable,
  },
  props: {
    inertable: Object,
  },
};
</script>